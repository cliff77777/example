<?php 
require_once("../includes/config.php");

if(!isset($_GET["category"]) || empty($_GET["category"])){
    $category="category";
}else{
    $category=$_GET["category"];
};

if(!isset($_GET["search"]) || empty($_GET["search"])){
    $search="";
}else{
    $search=$_GET["search"];
};
if(!isset($_GET["min"]) || empty($_GET["min"])){
    $min=0;
}else{
    $min=$_GET["min"];
};

if(!isset($_GET["max"]) || empty($_GET["max"])){
    $max=9999999;
}else{
    $max=$_GET["max"];
};

$sql="SELECT * FROM product WHERE product_name LIKE'%$search%' AND price<$max AND price>$min AND category=$category AND valid=1";
$stmt=$db_host->prepare($sql);
$stmt->execute();


try{
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($row);    
}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Error: ".$e->getMessage(). "<br>";
    exit;
}

?>