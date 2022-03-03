<?php
require_once ("includes/config.php");
if($_SESSION["user"]["role"]!==2){
  header("location:dashboard.php");
};

?>
<!doctype html>
<html lang="en">
  <head>
    <title>LogIn</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            background:grey;
        }
        .form-signin{
        width: 100%;
        max-width: 300px;
        padding: 15px;
        margin: auto;
        transform:translatey(100%)
        }
    </style>
  </head>
  <body class="text-center">
    <form class="form-signin" action="Log_in.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">登入</h1>
        <label for="account" class="sr-only mb-3">account</label>
          <input type="text" class="mb-3" id="account" name="account" placeholder="account" required autofocus>
        <label for="password" class="sr-only">password</label>
          <input type="password" id="password" class="mb-3" name="password" placeholder="password" required>
          <?php if(isset($_SESSION["dataError"])):?>
            <div class=""><small class="text-danger"><?=$_SESSION["dataError"]["message"]?>，錯誤<?=$_SESSION["dataError"]["time"]?>次</small></div>
          <?php endif;?>
        <button class="btn btn-lg btn-primary btn-block " type="submit">登入</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>