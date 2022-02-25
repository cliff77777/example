<div class="col-lg-3 my-3">
                <div class="card">
                <h5><?=$row["product_name"]?></h5>
                  <figure>
                    <img  class="cover-fit" alt=""src="/example/img/product/<?=$row["picture"]?>" >
                  </figure>
                  <div class="">價格:<?=$row["price"]?></div>
                  <div class="" id="reserve">庫存:<?=$row["count"]?></div>
                  <div class="text-success">分類:<?=$category[$row["category"]]?></div>
                  <a type="button" class="btn btn-primary" href="product.php?id=<?=$row["id"]?>">商品修改</a>
                  <a role="button" class="btn btn-danger" href="delete_product.php?id=<?=$row["id"]?>">刪除商品</a>
                </div>
              </div>