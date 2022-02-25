<?php
require_once "../includes/config.php";
$id=$_GET["id"];

$sql="UPDATE product SET valid=0 WHERE id=$id";
// $result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    header("location:productList.php");
}else {
    echo "刪除資料失敗: " . $conn->error;
}

?>