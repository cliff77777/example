<?php
require_once ("../includes/config.php");
$sql="SELECT * FROM category";
$stmt=$db_host->prepare($sql);
$stmt->execute();

try{
    $category=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($category);
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
}

?>