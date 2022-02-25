<?php
require_once ("../includes/config.php");
$id=$_POST["id"];

$sql="SELECT * FROM users WHERE id=$id";
$stmt=$db_host->prepare($sql);
$stmt->execute();

try{
    $row=$stmt->fetch();
    echo json_encode($row);
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
}
?>