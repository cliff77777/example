<?php
require_once("../includes/config.php");
require_once("../includes/cdn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
</head>
<body>
<?php require_once ("../includes/header.php")?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 mt-5 pt-5">
                <h1 class="text-center mb-5">購物車</h1>
            <table class="table  table-sm ">
                <thead>
                <?php 
                    if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"])): ?><div class="h1 text-center">沒有商品</div><?php
                        else:?>
                    <tr>
                        <td>商品</td>
                        <td class="text-right">單價</td>
                        <td class="text-center">數量</td>
                        <td class="text-right">小計</td>
                        <td class="text-center">操作</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total=0;
                    foreach($_SESSION["cart"] as $product){?>
                        <tr>
                            <?php foreach($product as $key=>$value){
                                $sql="SELECT * FROM product WHERE id=$key";
                                $stmt=$db_host->prepare($sql);
                                $stmt->execute();
                                $row=$stmt->fetch();
                                $subtotal=$row["price"]*$value;
                                $total+=$subtotal
                                ?>
                                <td><?=$row["product_name"]?></td>
                                <td class="text-right"><?=$row["price"]?></td>
                                <td class="text-center"><?=$value?></td>
                                <td class="text-right"><?=$subtotal?></td>
                                <td class="text-center border-bottom"><a class="deleteBtn btn" data-id=<?=$row["id"]?>><i class="fas fa-trash-alt"></i></a></td>
                            <?php ;}?>
                        </tr>
                    <?php ;}?>
                    <tfoot>
                        <tr> 
                            <td class="text-right" colspan="4">
                                總價:<?=$total?>
                            </td>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
            <div class="justify-content-between d-flex">
            <a href="javascript:history.back()" class="btn btn-info">返回</a>
            <a href="pay.php" role="button" class="btn btn-primary" id="payBtn">結帳</a>
            <?php endif; ?>           
        </div>
    </div>
</div>

<?php require_once ("../includes/script.php")?>
<script>
$("#payBtn").click(function(){
    if(<?=$_SESSION["user"]["role"]?>===2){
        alert("請先登入會員後再進行結帳");
    }
})

$("tbody").on("click","a",function(){
    let deleteID=$(this).data("id")
    console.log(deleteID);
    axios.get("../api/delete-cart_api.php",{
        params:{
            id:deleteID
        }
    }).then(function(response){
        let result=response.data;
        if(result.status===0){
            alert("商品刪除成功");
            location.reload();
        }

    })
})

</script>

</body>
</html>