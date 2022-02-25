<?php
require_once ("../includes/config.php");
$product_name=$_POST["product_name"];
$brand=$_POST["brand"];
$price=$_POST["price"];
$count=$_POST["count"];
$order_count=$_POST["order_count"];
$picture=$_POST["picture"];
$descript=$_POST["descript"];
$id=$_POST["id"];

$sql="UPDATE product SET product_name='$product_name',brand='$brand',price='$price',count='$count',order_count='$order_count',picture='$picture',descript='$descript'  WHERE id='$id'";

$stmt=$db_host->prepare($sql);

try{
    $stmt->execute();
    header("location:productList.php");
}catch(PDOException $e){
    echo "修改資料失敗<br>";
    echo "Error: ".$e->getMessage()."<br>";
    };

?>

