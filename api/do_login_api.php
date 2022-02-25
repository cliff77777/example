<?php
require_once ("../includes/config.php");
if($_SESSION["user"]["role"]!==2){
    exit;
}
$account=$_POST["account"];
$password=$_POST["password"];
$sql="SELECT * FROM users WHERE account=?";
$stmt=$db_host->prepare($sql);

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
            "expireTime"=>600,
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
                "expireTime"=>3600,
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
                    "expireTime"=>600,
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
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
};




?>