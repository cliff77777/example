<?php
require_once ("../includes/config.php");
if(!isset($_GET["p"])){
  $p=1;
}else{
  $p=$_GET["p"];
};

//   種類分類
$ct=$_GET["ct"];
$sqlCt="SELECT * FROM product WHERE category=$ct AND valid=1";
$stmtCt=$db_host->prepare($sqlCt);

//當前頁資訊
$pageinfo=array(
  "location"=>basename(__FILE__),
  "ct"=>"ct",
  "category"=>$ct
);
$_SESSION["pageinfo"]=$pageinfo;

// 每頁顯示內容
//5、4
//10、4
$page_display=4;
$star=($p-1)*$page_display;
$sql="SELECT * FROM product WHERE category=$ct AND valid=1  LIMIT $star,$page_display";
$stmt=$db_host->prepare($sql);
$stmt->execute();
$productCount=$stmt->rowCount();

//分頁數量
$totalSql="SELECT * FROM product WHERE valid=1 AND category=$ct";
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class="container mt-5">
    <?php require("../includes/header.php"); ?>
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
              $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach($rows as $row){
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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
          // let prepage=$(".prepage").data("prepage");
          // let nextpage=$(".prepage").data("nextpage");
          // console.log(prepage)

          // if(prepage==<?=$p?>){
          //   $(".prePage").addClass("disabled");
          // }
    </script>
  </body>
</html>