<?php
require_once ("../includes/config.php");

$sql="SELECT id,name,account,email,role FROM users WHERE valid=1";
$stmt=$db_host->prepare($sql);
$stmt->execute();

try{
    $userCount=$stmt->rowCount();
    $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);    
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
}
?>