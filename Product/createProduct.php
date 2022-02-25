<?php
require_once "../includes/config.php";
$sql="SELECT * FROM brand_list ";
$stmt=$db_host->prepare($sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>createProduct</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once("../includes/adminRole.php");?>
  <div class="container my-5">
  <?php require("../includes/header.php"); ?>
      <h2>新增商品</h2>
  <form action="create_product.php" method="post" id="form" class="py-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_name">商品名稱:</label>
            <input type="text"  id="product_name" name="product_name" class="form form-control">
        </div>
        <div class="form-group">
            <label for="brand">廠牌:</label>
            <select type="selete" id="brand"  name="brand" class="form form-control">
                <option selected>請選擇廠牌</option>
                <?php 
                try{
                    $stmt->execute();
                    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){?>
                    <option value=<?=$row["brand_name"]?>><?=$row["brand_name"]?></option>

                <?php
                };}catch(PDOExecption $e){
                echo "error .<br>";
                echo "讀取廠牌錯誤:".$e->getMessage()."<br>";
                };
                ?>
            </select>
        </div>    
        <div class="form-group">
            <span class="">總類:</span>
            <div class="form-check form-check-inline">
                <label for="car" class="form-check-label ml-2">汽車</label>
                <input type="radio" id="car" name="category" value="2" class="form-check-input">
            </div>
            <div class="form-check form-check-inline">
                <label for="moto" class="form-check-label">機車</label>
                <input type="radio" id="moto" name="category" value="1" class="form-check-input">
            </div>    
        <div class="form-group mt-3">
            <label for="price">價格:</label>
            <input type="number" id="price" name="price" class="form form-control">
        </div>      
        <div class="form-group">
            <label for="count">數量:</label>
            <input type="number" id="count" name="count"  class="form form-control">
        </div>        
        <div class="form-group">
            <label for="order_count">訂單數量:</label>
            <input type="number" id="order_count" name="order_count" value=0 class="form form-control">
        </div>
        <div class="picture">
            <label for="file">上傳圖片:</label>
            <input 
            type="file"   
            name="file">
        </div>
        <div class="form-group">
            <label for="descript">介紹:</label>
            <textarea rows="10" cols="5"  id="descript"  name="descript" class="form form-control"></textarea>
        </div>
        <div class="justify-content-center d-flex">
        <a role="button" type="submit" class="btn btn-primary mr-2 text-white" id="createBtn">新增</a>        
        <a role="button" type="button" class="btn btn-primary" href="productList.php">返回</a>    
        </div>      
    </form>
  </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
<script>
    $("#createBtn").click(function(){
        form.submit();
    })
</script>

</html>