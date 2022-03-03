<?php
require_once ("../includes/config.php");
if($_SESSION["user"]["role"]!==2){
    exit;
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
    }elseif($_SESSION["dataError"]["time"] > 2){
            $dataError=array(
                "message"=>"輸入錯誤已達上限，請於1分鐘後嘗試登入，鎖定期間嘗試登入將重置鎖定時間",
                "time"=>3,
                "stillTime"=>60,
                "beginTime"=>time()
            );
            $_SESSION["dataError"]=$dataError;
            echo json_encode($dataError);
            exit();
    }
}
try{
    $stmt->execute([$account]);
    if(isset($_SESSION["dataError"])){
        $times=$_SESSION["dataError"]["time"]+1;
    }else{
        $times=1;
    };

    $accountResult=$stmt->rowCount();
    if($accountResult<1){
        $dataError=array(
            "message"=>"帳號密碼錯誤",
            "time"=>$times,
            "stillTime"=>60,
            "beginTime"=>time(),
            "status"=>2
        );
        $_SESSION["dataError"]=$dataError;
        echo json_encode($dataError);
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
            echo json_encode($userData);
            unset($_SESSION["dataError"]);
              }else {
                $dataError=array(
                    "message"=>"帳號密碼錯誤",
                    "time"=>$times,
                    "stillTime"=>60,
                    "beginTime"=>time(),
                    "status"=>3
                );
                $_SESSION["dataError"]=$dataError;
                echo json_encode($dataError);
            };
        };
    };
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Error: ".$e->getMessage(). "<br>";
    exit;
};




?>