<?php
$id=$_GET["id"];
?>
<!doctype html>
<html lang="en">
  <head>
    <title>User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once("../includes/adminRole.php")?>
  <?php
    require("../includes/header.php");
    ?>
      <div class="container mt-5">
        <h2 class="py-3">會員帳號詳情</h2>
          <form action="update_user.php" method="post" >
                <input type="text" hidden value="<?=$id?>" name="id"></input>
            <div class="form-group">
                <label for="account">帳號:</label>
                <div>
                  <input type="text" class="form-control" name="account" id="account" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="name">姓名:</label>
                <div>
                  <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="form-group">
              <label for="password">密碼:</label>
              <div class="">
                <input class="form-control" type="password" name="password" id="password">
              </div>
            </div>            
            <div class="form-group">
                <label for="email">信箱:</label>
                <div class="">
                <input class="form-control" type="text" name="email" id="email">
                </div>
            </div>
            <div class="form-group ">
            <label for="phone" class="mr-2">電話:</label>
            <input type="tel" class="form-control" name="phone" id="phone">
            </div>  
            <button type="submit" class="btn btn-info">更新</button>
            <a href="delete_user.php?id=<?=$id?>" role="btn" class="btn btn-danger">刪除</a>
          </form>
            
        </div>
    <?php require_once ("../includes/script.php")?>
    <script>
      let id=<?=$id?>;
      let formdata=new FormData();
      formdata.append("id",id);
      axios.post('../api/user_api.php', formdata)
      .then(function(response){
            let data=response.data;
            $("#account").val(data.account)
            $("#name").val(data.name)
            $("#password").val(data.password)
            $("#email").val(data.email)
            $("#phone").val(data.phone)
      })
      .catch(function(error){
        console.log(error);
      })

    </script>
  </body>
</html>