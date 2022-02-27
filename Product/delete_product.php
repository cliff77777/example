<?php
require_once "../includes/config.php";
$id=$_GET["id"];

$sql="UPDATE product SET valid=0 WHERE id=$id";
$stmt=$db_host->prepare($sql);



try{
    $stmt->execute();
    echo "刪除商品成功";

}catch(PDOExecption $e){
    echo "error .<br>";
    echo "刪除商品錯誤:".$e->getMessage()."<br>";
}
$db_host=NULL;

header("location:productList.php");

?>