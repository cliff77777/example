<?php

require_once("../includes/config.php");
if(!isset($_POST["checkpassword"])){
    header("location:/example/dashboard.php");
    exit;
}else if(empty($_POST["id"])){
    header("location:/example/dashboard.php");
    exit;
};

$id=$_POST["id"];

$sql="DELETE FROM user_order WHERE id=$id";
$stmt=$db_host->prepare($sql);

$sqlDetail="DELETE FROM user_order_detail WHERE order_id=$id";
$stmtDetail=$db_host->prepare($sqlDetail);


try{
    $stmt->execute();
    $stmtDetail->execute();

    echo "<script>alert('刪除訂單成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}catch(PDOExpection $e){
    echo "error</br>";
    echo "ERROR: ".$e->getMessage()."<br>";
}

?>