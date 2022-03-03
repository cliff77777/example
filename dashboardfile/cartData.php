<div class="col-9 d-none" id="cartData" >
    <h3 class="text-center mt-5 py-3">購物車</h3>
    <div class="row justify-content-center">
        <?php 
            if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"])): ?><div class="h1 text-center my-5">沒有商品</div><?php
                else:?>
            <table class="table  table-sm ">
                <thead>
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
            <a href="pay.php" role="button" class="btn btn-primary" id="payBtn">結帳</a>
            </div>
        <?php ;endif?>
        </div>
    </div>
</div>

</div>
