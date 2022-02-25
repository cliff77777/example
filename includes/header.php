  <?php
    require_once ("config.php");
    require_once("loginModal.php");
    require_once("cdn.php");

    if(!isset($_SESSION["user"]["role"])){
      $guest=array(
        "role"=>2,
        "name"=>"訪客"
      );
      $_SESSION["user"]=$guest;

    }else{
      $_SESSION["user"]["role"];
    };

  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
  <a class="navbar-brand" href="#">Example</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION["user"]["role"])&&$_SESSION["user"]["role"]===0):?>
      <li class="nav-item">
        <a class="nav-link" href="/example/user/userList.php">帳號管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/example/order/orderList.php">訂單列表</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/example/product/productList.php?p=1">編輯商品</a>
      </li>
      <?php endif;?>
              <li class="nav-item">
              <a class="nav-link" href="/example/dashboard.php">會員中心</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/example/store/storeList.php">賣場</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/example/store/cart.php">購物車</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/example/aboutme.php">關於我們</a>
              </li>
    </ul>


    <?php if($_SESSION["user"]["role"]!==2):?>
      <div class="form-inline my-2 my-lg-0">      
        <div class="mx-3 text-body">hi,<?= $_SESSION["user"]["name"]?></div>
        <a href="/example/Logout.php" class="btn btn-info mr-2" role="button">登出</a>
      </div>
    <?php else:?>
      <div class="form-inline my-2 my-lg-0">
        <div class="mr-3 text-body">hi,<?= $_SESSION["user"]["name"]?></div>
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#loginModal" data-whatever="login">登入</button>       
      </div>
      <?php endif;?>
      <a href="/example/store/cart.php" role="button" class="btn btn-outline-info my-2 my-sm-0 position-relative">
        <div class="amount position-absolute" id="amount">
          <?php if(isset($_SESSION["cart"])):
            $amount=count($_SESSION["cart"]);
          else:$amount=0;
        endif;?>
        <?= $amount?></div>
          <i class="fas fa-shopping-cart"></i>
        </a> 
  </div>
</nav>

<script>

</script>

