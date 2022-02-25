<?php
require_once ("../includes/config.php");
$id=$_POST["id"];
$sql="SELECT * FROM category WHERE id=$id";
$stmt=$db_host->prepare($sql);
$stmt->execute();

try{
    $category=$stmt->fetch();
        echo json_encode($category);
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
}

?>