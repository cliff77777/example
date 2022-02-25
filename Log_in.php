<?php
require_once ("includes/config.php");

if(!isset($_POST["account"])){
    header("location:javascript://history.go(-1)");
    exit();
}elseif($_SESSION["dataError"]["time"]===3 && $_SESSION["dataError"]["beginTime"]<time()-$_SESSION["dataError"]["expireTime"])
{unset($_SESSION["dataError"]);
}elseif($_SESSION["dataError"]["time"]===3){
    $dataError=array(
        "message"=>"輸入錯誤已達上限，請於10分鐘後嘗試登入，鎖定期間嘗試登入將重置鎖定時間",
        "time"=>3,
        "expireTime"=>600,
        "beginTime"=>time()
    );
    $_SESSION["dataError"]=$dataError;
    header("location:javascript://history.go(-1)");
    exit();
};
$account=$_POST["account"];
$password=$_POST["password"];

$sql="SELECT * FROM users WHERE account=?";
$stmt=$db_host->prepare("SELECT * FROM users WHERE valid=1 AND account = ?");

try{
    $stmt->execute([$account]);
    if(isset($_SESSION["dataError"])){
        $times=$_SESSION["dataError"]["time"]+1;
    }else{
        $times=1;
    }

    $accountResult=$stmt->rowCount();
    if($accountResult<1){
        $dataError=array(
            "message"=>"帳號密碼錯誤",
            "time"=>$times,
            "expireTime"=>10,
            "beginTime"=>time()
        );
        $_SESSION["dataError"]=$dataError;
        header("location:javascript://history.go(-1)");
    }else{
        while($row=$stmt->fetch()){
            $hash=$row["password"];   
            if (password_verify($password, $hash)) {
            $userData=array(
                "name"=>$row["name"],
                "account"=>$row["account"],
                "email"=>$row["email"],
                "phone"=>$row["phone"],
                "id"=>$row["id"],
                "expireTime"=>3600
            );
            $_SESSION["user"]=$userData;
            echo "登入成功";
            unset($_SESSION["dataError"]);
            header("location:javascript://history.go(-1)");
              }
              else {
                header("location:javascript://history.go(-1)");
            };
        };
    };
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
};
//ms1=請依正常方式登入
//ms2=登入資訊錯誤，請檢查密碼
//ms3=登入資訊錯誤，請檢查帳號



?>