<?php
require_once("../includes/config.php");

if(!isset($_POST["id"])){
    echo "執行錯誤";
    exit;
}else{
    $id=$_POST["id"];
}

//user_order
$sql="SELECT * FROM user_order WHERE user_id=$id";
$stmt=$db_host->prepare($sql);

//user_order_detail
$detailSql="SELECT * FROM user_order_detail WHERE order_id=?";
$detailStmt=$db_host->prepare($detailSql);

//product
$productSql="SELECT * FROM product WHERE id=?";
$productStmt=$db_host->prepare($productSql);

try{
    $stmt->execute();
    $order=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $n=0;
    foreach($order as $orderRow){
        $orderID=$orderRow["id"];
        $detailStmt->execute([$orderID]);
        $detail=$detailStmt->fetchAll(PDO::FETCH_ASSOC);
        $orderList=array();
        foreach($detail as $detailRow){
            $productID=$detailRow["product_id"];
        }
        $productStmt->execute([$productID]);
            while($productRow=$productStmt->fetch()){
                    $orderDetail=array(
                    "orderid"=>$detailRow["order_id"],
                    "productName"=>$productRow["product_name"],
                    "productPrice"=>$productRow["price"],
                    "amount"=>$detailRow["amount"],
                    "orderTime"=>$orderRow["order_time"],
                    "orderNumber"=>$orderRow["orderNumber"],
                    );          
            }
        $order[$n]= $orderDetail;
        $n++;
    }
    echo json_encode($order);
}catch(PDOException $e){
    echo "error</br>";
    echo "ERROR:".$e->getMessage()."</br>";
}

?>