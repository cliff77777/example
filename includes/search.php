<?php
$search=$_GET["search"];
$max=$_GET["max"];
$min=$_GET["min"];

if(empty($_GET["search"])){
    $search="*";
};
if(empty($max)){
    $max=9999999;
};

if(empty($min)){
    $min=0;
};

//card資料來源
$search=$_GET["search"];
$sql="SELECT * FROM product WHERE product_name LIKE'%$search%' AND price<$max AND price>$min AND valid=1";
$stmt=$db_host->prepare($sql);
$stmt->execute();

//card分類
$categorysql="SELECT * FROM category";
$stmtCategory=$db_host->prepare($categorysql);
$stmtCategory->execute();
$category=array();
while($rowCategory=$stmtCategory->fetch()){
  $category[$rowCategory["id"]]=$rowCategory["category"];
  };

// $result=$conn->query($sql);

// // 顯示分類join
// $sql="SELECT product.*,category.kindof FROM product JOIN category 
// ON product.category=category.id WHERE product.product_name LIKE'%$search%' AND product.price<$max AND product.price>$min";

// 顯示分類
$categorysql="SELECT * FROM category";
$stmtCategory=$db_host->prepare($categorysql);
$categoryList=array();
while($rowCategory=$stmtCategory->fetch()){
    $categoryList[$rowCategory["id"]]=$category["category"];
};


?>