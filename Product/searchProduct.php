<?php
require_once ("../includes/config.php");
require_once ("../includes/search.php");

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
  <?php require_once("../includes/adminRole.php");?>
    <div class="container mt-5">
    <?php require("../includes/header.php"); ?>
    <div class="d-flex justify-content-between py-3">
            <div class="">共有<?=$stmt->rowCount()?>筆資料</div>
            <?php if(!empty($_GET["search"])):?>
            <span>
              收尋關鍵字: "<?=$search?>"<?php else:endif;?>
            </span>
            <a href="createProduct.php" type="button" class="btn btn-info">新增商品</a>
        </div>
      <div class="row">
        <aside class="col-lg-3">
        <?php require ("../includes/aside.php") ?>
          </form>
        </aside>
        <div class="col-lg-9">
          <div class="row">
            <?php 
                 try{
                   $stmt->execute();
                   $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   foreach($rows as $row){
                 
              ?>
              <?php require("productCard.php")?>
            <?php
                 };}catch(PDOExecption $e){
                   echo "收尋失敗<br>";
                    echo "ERROR: ".$e->getMessage()."<br>";
                 };?>
          </div>
      </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

    </script>
  </body>
</html>