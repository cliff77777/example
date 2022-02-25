<?php
    require_once ("includes/config.php");
    require_once ("includes/cdn.php");


?>
<!doctype html>
<html lang="en">
  <head>
    <title>About me</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

  </head>
  <body>
    <div class="container mt-5">
      <?php require "includes/header.php"?>
            <div class="col col-lg-10 py-3 text-left">
                <div class="h2 text-center my-5">關於我</div>
                <div class="">
                    <P>
                    網站作者是出生於1991年的青年，在齡近三十前有了轉職的念頭，並且透過資策會的網頁工程師
                    了解到入門網頁製作，該作品是在課程結束後為了更熟悉網頁加以練習所設計的，並且以成為junior engineer為目標努力
                    ，如有任何建議都歡迎聯繫謝謝。
                    </P>                
                    <P>
                    該網站應用前端技術有CSS3、jQuery、HTML、AXIOS，以及Bootstrap4.3的版本，
                    後端主要是應用Xampp的安裝包架設Apache網站，利用的技術有PHP 以及MySQL。
                    網站的主題是嘗試做一個前後端整合的網站，並且透過會員登入的方式將商品加入購物車並且寫入資料庫中，
                    後續可以讓網站的管理者透過網頁介面進行管理。
                    </P>
                    <P class="text-">
                    一般會員帳號權限:建立帳號、修改帳號資料、加入購物車、購物車結帳。
                    </br>
                    管理員帳號權限:新增帳號、刪除帳號、修改帳號、新增商品、修改商品、刪除商品、查看訂單，以及一般會員的功能。
                    </P>
                    <P>
                    網頁中有許多不完整以及不完美的地方還請多多見諒，後續也會繼續利找出網站的問題並且修改，讓網頁的技術更加熟練。
                    </P>
                </div>

            </div>




    </div>


      <?php require_once("includes/script.php");?>
  </body>
</html>