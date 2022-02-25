<?php
require_once("../includes/config.php");

if(isset($_POST["id"])){
    $id=$_POST["id"];
}else{
    $id="id";
};


//user_order
$sql="SELECT * FROM user_order WHERE id=$id";
$stmt=$db_host->prepare($sql);
$stmt->execute();

//user_order_detail
$detailSql="SELECT * FROM user_order_detail WHERE order_id=?";
$detailStmt=$db_host->prepare($detailSql);

//product
$productSql="SELECT * FROM product WHERE id=?";
$productStmt=$db_host->prepare($productSql);

//users
$userSql="SELECT * FROM users WHERE id=?";
$userStmt=$db_host->prepare($userSql);



try{
    $order=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $n=0;
    foreach($order as $orderRow){
        $orderID=$orderRow["id"];
        $userID=$orderRow["user_id"];
        $detailStmt->execute([$orderID]);
        $detail=$detailStmt->fetchAll(PDO::FETCH_ASSOC);
        $i=1;
        $orderList=array();
        foreach($detail as $detailRow){
            $userStmt->execute([$userID]);
            $productID=$detailRow["product_id"];
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
            while($userRow=$userStmt->fetch()){
                $orderDetail["userName"]=$userRow["name"];
            };
            

            $orderList[$i]=$orderDetail;
            $i++;
        }
        $order[$n]= $orderList;
        $n++;
    }
    echo json_encode($order);

}catch(PDOException $e){
    echo "資料庫連結失敗<br>";
    echo "Eroor: ".$e->getMessage(). "<br>";
    exit;
}


















// try{
//     $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
//     $time=1;
//     foreach($data as $order){
//         $orderID=$order["id"];
//         $detailStmt->execute([$orderID]);
//         $detail=$detailStmt->fetchAll(PDO::FETCH_ASSOC);
//         $n=1;
//         $orderList=array();
//         foreach($detail as $detailRow){
//             $productID=$detailRow["product_id"];
//             $productStmt->execute([$productID]);
//             for($i=1;$i<=$productStmt->rowCount();$i++){
//             while($productRow=$productStmt->fetch()){
//                 $productDetail=array(
//                     "orderid"=>$detailRow["order_id"],
//                     "productName"=>$productRow["product_name"],
//                     "productPrice"=>$productRow["price"],
//                     "amount"=>$detailRow["amount"],
//                     "orderDime"=>$order["order_time"],
//                     "orderNumber"=>$order["orderNumber"],
//                 );                
//             }
//             $orderList[$n]=$productDetail;
//             $n++;
//         }
//     }
//     $response=array(
//         $time=>$orderList
//     );
//     $time++;
//         $object=json_encode($response);
//         $object1=json_decode($object);
//         echo ($object1);

//     }
// }catch(PDOException $e){
//     echo "資料庫連結失敗<br>";
//     echo "Eroor: ".$e->getMessage(). "<br>";
//     exit;
// }




?>



