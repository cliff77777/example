<?php
require_once ("../includes/config.php");

if(!isset($_POST["id"])){
exit;
}else{
    $id=$_POST["id"];
    $password=$_POST["oldPass"];
}

$sql="SELECT password FROM users WHERE id=$id";

$stmt=$db_host->prepare($sql);

try{
    $stmt->execute();
    while($row=$stmt->fetch()){
        $hash=$row["password"];
        if (password_verify($password,$hash)){
            $passwordMsg=array(
                "status"=>2,
                "msg"=>"密碼正確"
            );
            $_SESSION["chabgePassword"]=$passwordMsg;
            echo json_encode($passwordMsg);
        }else{
            $passwordMsg=array(
                "status"=>3,
                "msg"=>"密碼錯誤"
            );
            $_SESSION["chabgePassword"]=$passwordMsg;
            echo json_encode($passwordMsg);
        };};
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
};


?>