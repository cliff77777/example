<?php
require_once ("includes/config.php");

if(!isset($_POST["account"])){
    header("location:Login.php");
    exit();
}
$account=$_POST["account"];
$password=$_POST["password"];

$sql="SELECT * FROM users WHERE account=? AND valid=1";
$stmt=$db_host->prepare($sql);

if(isset($_SESSION["dataError"])){
    $stillTime=$_SESSION["dataError"]["stillTime"];
    $now=intval(time());
    $expireTime=$now-intval($stillTime);
    $beginTime=intval($_SESSION["dataError"]["beginTime"]);
    if($_SESSION["dataError"]["time"] >= 3 && $beginTime < $expireTime){
        unset($_SESSION["dataError"]);
    }elseif($_SESSION["dataError"]["time"] >= 3){
            $dataError=array(
                "message"=>"輸入錯誤已達上限，請於1分鐘後嘗試登入，鎖定期間嘗試登入將重置鎖定時間",
                "time"=>3,
                "stillTime"=>60,
                "beginTime"=>time()
            );
            $_SESSION["dataError"]=$dataError;
            header("location:Login.php");
            exit();
    }
}

try{
    $stmt->execute([$account]);
    if(!isset($_SESSION["dataError"]["time"])){
        $errorTimes=1;
    }else{
        $errorTimes=$_SESSION["dataError"]["time"]+1;
    };



    $accountResult=$stmt->rowCount();
    if($accountResult<1){
        $dataError=array(
            "message"=>"帳號密碼錯誤",
            "time"=>$errorTimes,
            "stillTime"=>60,
            "beginTime"=>time(),
            "status"=>2
        );
        $_SESSION["dataError"]=$dataError;
        header("location:Login.php");
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
                "role"=>$row["role"],
                "status"=>0
            );
            $_SESSION["user"]=$userData;
            unset($_SESSION["dataError"]);
            echo "<script>alert('登入成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
              }else {
                $dataError=array(
                    "message"=>"帳號密碼錯誤",
                    "time"=>$errorTimes,
                    "stillTime"=>60,
                    "beginTime"=>time(),
                    "status"=>3
                );
                $_SESSION["dataError"]=$dataError;
                header("location:Login.php");
            };
        };
    };
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Error: ".$e->getMessage(). "<br>";
    exit;
};
//ms1=請依正常方式登入
//ms2=登入資訊錯誤，請檢查密碼
//ms3=登入資訊錯誤，請檢查帳號



?>