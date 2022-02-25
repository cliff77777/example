  <form class="form-inline mt-3" action="../product/searchProduct.php" method="get">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="請輸入關鍵字" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
          <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">收尋</button>
          </div>
      </div>
      <div class="input-group flex-nowrap">
  <div class="input-group-prepend my-2">
    <span class="input-group-text" id="addon-wrapping">價格大於</span>
  </div>
  <input type="number" class="form-control my-2" name="min" placeholder="請填入價格" aria-label="Username" aria-describedby="addon-wrapping">
</div>
<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">價格小於</span>
  </div>
  <input type="number" class="form-control" placeholder="請填入價格" aria-label="Username" aria-describedby="addon-wrapping" name="max">
</div>
<button class="btn btn-primary my-2 " type="submit" >篩選</button>
  </form>

  <div class="list-group">
  <a href="productList.php?p=1" class="list-group-item list-group-item-action" aria-current="true">
所有商品 </a>
<?php foreach($category as $key => $value){?>
  <a href="category.php?ct=<?=$key?>" class="list-group-item list-group-item-action" name="ct"><?=$value?></a>
  <?php }?>
</div>