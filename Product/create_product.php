<?php
require_once "../includes/config.php";

if(isset($_POST["product_name"])){
    $product_name=$_POST["product_name"];
}else{
    echo"請依正常管道新增";
    exit;
}
    // 圖片上傳
if($_FILES["file"]["error"]==0){
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../img/product/".$_FILES["file"]["name"])){
        echo "uploaded successful";
    }else{ 
    echo"uploaded fail";};
}else{echo"ERROR:檔案上傳錯誤";};

$product_name=$_POST["product_name"];
$brand=$_POST["brand"];
$price=$_POST["price"];
$count=$_POST["count"];
$order_count=$_POST["order_count"];
$picture=$_FILES["file"]["name"];
$descript=$_POST["descript"];
$vaild=1;
$category=$_POST["category"];


//寫入商品資料庫
$sql="INSERT INTO product (product_name, brand, price, count, order_count,picture,descript,valid,category)
VALUES(?,?,?,?,?,?,?,?,?)";
$stmt=$db_host->prepare($sql);
try{
    $stmt->execute([$product_name,$brand,$price,$count,$order_count,$picture,$descript,$vaild,$category]);
    $last_id=$db_host->lastInsertId();
    echo "$last_id";
    echo "新增商品成功";
}catch(PDOExecption $e){
    echo "error .<br>";
    echo "新增商品錯誤:".$e->getMessage()."<br>";
};


//將圖片寫入圖片資料庫
$sqlPhotoList="INSERT INTO product_picture_list (picture,product_id,valid)
VALUES(?,?,?)";
$stmtPhotoList=$db_host->prepare($sqlPhotoList);
try{
    $stmtPhotoList->execute([$picture,$last_id,1]);
    echo "成功新增到圖片資料庫";
}catch(PDOExecption $e){
    echo "error .<br>";
    echo "新增圖片資料庫錯誤:".$e->getMessage()."<br>";
};

hander("location:productList.php")

$db_host=null;



?>