<?php 
require_once("../includes/config.php");

$sql="SELECT * FROM product WHERE valid=1";
$stmt=$db_host->prepare($sql);
$stmt->execute();


try{
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($row);    

}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
}

?>