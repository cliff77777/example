<?php
require_once ("../includes/config.php");
if(!isset($_GET["p"])){
  $p=1;
}else{
  $p=$_GET["p"];
}
//每頁顯示
$page_display=6;
$star=($p-1)*2;
$sql="SELECT * FROM product WHERE valid=1 LIMIT $star,$page_display";
$stmt=$db_host->prepare($sql);
$stmt->execute();
$productCount=$stmt->rowCount();

//分頁數量
$totalSql="SELECT * FROM product WHERE valid=1";
$stmtTotal=$db_host->prepare($totalSql);
$stmtTotal->execute();
$totalCount=$stmtTotal->rowCount();
$pages=ceil($totalCount/$page_display);


//card分類
$categorysql="SELECT * FROM category";
$stmtCategory=$db_host->prepare($categorysql);
$stmtCategory->execute();
$category=array();
while($rowCategory=$stmtCategory->fetch()){
$category[$rowCategory["id"]]=$rowCategory["category"];
};

?>
<!doctype html>
<html lang="en">
  <head>
    <title>ProductList</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
  <?php require_once("../includes/adminRole.php");?>
    <div class="container mt-5">
    <?php require_once("../includes/header.php");?>
      <div class="d-flex justify-content-between py-3">
        <div class="">共有<?=$productCount?>筆資料</div>
          <a href="createProduct.php" type="button" class="btn btn-info">新增商品</a>
      </div>
      <div class="row">
        <aside class="col-lg-3">
          <?php require ("../includes/aside.php")?>
        </aside>
        <div class="col-lg-9">
          <div class="row">
          <?php try{
              $stmt->execute();
              $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach($products as $row){
            ?>
            <?php require("productCard.php")?>
            <?php };}catch(PDOExecption $e){
                  echo"資料鏈結錯誤<br>";
                  echo "Error: ".$e->getMessage()."<br>";
                  exit;
            };?>
          </div>
        <?php require("pagebar.php")?>
      </div>
    </div>
        <?php require_once ("../includes/script.php"); ?>

      </div>
    </div>

    
      
    <script>

    </script>
  </body>
</html>