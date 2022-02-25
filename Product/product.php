<?php
require_once ("../includes/config.php");
$id=$_GET["id"];
$sql="SELECT * FROM product WHERE id=$id";
$stmt=$db_host->prepare($sql);
$stmt->execute();

$sqlbrand="SELECT * FROM brand_list ";
$stmtbrand=$db_host->prepare($sqlbrand);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once("../includes/adminRole.php");?>
<div class="container mt-5">
<?php require("../includes/header.php"); ?>
    <h2 class="py-2">商品修改</h2>
    <form action="update_product.php" method="post" id="form">
    <?php
        try{
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                
    ?>
        <input type="text" hidden value="<?=$row["id"]?>" name="id">
        <div class="form-group">
            <label for="product_name">商品名稱:</label>
            <input type="text" value="<?=$row["product_name"]?>" id="product_name" name="product_name" class="form form-control">
        </div>
        <div class="form-group">
            <label for="brand">廠牌:</label>
            <select type="selete" id="brand"  name="brand" class="form form-control">
                <option selected id="defult">請選擇廠牌</option>
                <?php 
                try{
                    $stmtbrand->execute();
                    $rowsbrand=$stmtbrand->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rowsbrand as $brand){
                    ?>
                    <option class="<?=$brand["brand_name"]?> optionbrand" value=<?=$brand["brand_name"]?>><?=$brand["brand_name"]?></option>
                <?php
                };}catch(PDOExecption $e){
                echo "error .<br>";
                echo "讀取廠牌錯誤:".$e->getMessage()."<br>";
                };
                ?>
            </select>
        </div>    
        <div class="form-group">
            <label for="price">價格:</label>
            <input type="number" id="price" name="price"value="<?=$row["price"]?>" class="form form-control">
        </div>      
        <div class="form-group">
            <label for="count">數量:</label>
            <input type="number" id="count" name="count" value="<?=$row["count"]?>" class="form form-control">
        </div>        
        <div class="form-group">
            <label for="order_count">訂單數量:</label>
            <input type="number" id="order_count" name="order_count" value="<?=$row["order_count"]?>" class="form form-control">
        </div>
        <div class="picture">
            <label for="product_name">圖片:</label>
            <input type="text" id="picture" name="picture" value="<?=$row["picture"]?>" class="form form-control">
        </div>
        <div class="form-group">
            <label for="descript">介紹:</label>
            <textarea rows="10" cols="5"  id="descript"  name="descript" class="form form-control"><?=$row["descript"]?></textarea>
        </div>
        <div class="justify-content-center d-flex">
        <a role="button" type="submit" class="btn btn-primary mr-2 text-white" id="updataBtn">修改</a>        
        <a role="button" type="button" class="btn btn-primary" href="productList.php">返回</a>    
        </div>      
    </form>
    <?php 
        };}catch(PDOException $e){
        echo "新增資料失敗<br>";
        echo "Error: ".$e->getMessage()."<br>";
        };?>
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script>
      $("#updataBtn").click(function(){
          $("#form").submit();
      });


      switch(`<?=$row["brand"]?>`){
        case"HONDA":
        $(".HONDA").prop("selected",true);
        $("#defult").prop("selected",false);
        break;
        case"YAMAHA":
        $(".YAMAHA").prop("selected",true);
        $("#defult").prop("selected",false);
        break;
        case"Kawasaki":
        $(".Kawasaki").prop("selected",true);
        $("#defult").prop("selected",false);
        break;
        case"BMW":
        $(".BMW").prop("selected",true);
        $("#defult").prop("selected",false);
        break;
        case"Suzuki":
        $(".Suzuki").prop("selected",true);
        $("#defult").prop("selected",false);
        break;
      };
      

      $brandcount=$(".optionbrand").length;
      let brandarray=[];
      for(i=0;i<=$brandcount;i++){
        $brandname=$(".optionbrand").val();
        brandarray.push($brandname)
      }
      
      console.log(brandarray);

  </script>
</html>