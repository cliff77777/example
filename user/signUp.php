<?php require_once("../includes/config.php");
require_once("../includes/cdn.php");

if(!isset($_SESSION["user"]["role"])){
  $guest=array(
    "role"=>2,
    "name"=>"訪客"
  );
  $_SESSION["user"]=$guest;
}else if($_SESSION["user"]["role"]===1){
  header("location:../dashboard.php");
}else{
  $_SESSION["user"]["role"];
}

?>
<!doctype html>
<html lang="en">
  <head>
  <title>會員註冊</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php require_once ("../includes/header.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col col-lg-8">
        <h2 class="pt-5 mw-100 mx-auto">會員註冊</h2>
    <form action="create_user.php" method="post" class="py-3" id="createUserForm">
        <div class="mb-2 mt-2  input-group ">
            <label for="signup_Account" class="mr-2">帳號:</label>
            <input type="text" class="form-control" id="signup_Account" name="account" placeholder="請輸入4~8英文數字" required>
        </div>
        <div class="errorMsg text-right">
              <small class="text-danger" id="accountMsg"></small>
        </div>
        <div class="mb-2 mt-2  input-group ">
        <label for="name" class="mr-2">姓名:</label>
        <input type="text" class="form-control" id="name" name="username" required>
        </div>
        <div class="errorMsg text-right">
              <small class="text-danger"></small>
        </div>
        <div class="mb-2 mt-2  input-group ">
        <label for="signup_Password" class="mr-2">密碼:</label>
        <input type="password" class="form-control" id="signup_Password" name="password" required>
        </div>
        <div class="errorMsg text-right">
              <small class="text-danger signup_Password"></small>
        </div>
        <div class="mb-2 mt-2  input-group ">
        <label for="confirmPassword" class="mr-2">確認密碼:</label>
        <input type="password" class="form-control" id="confirmPassword" name="password" required>
        </div>
        <div class="errorMsg text-right">
              <small class="text-danger confirmPassword"></small>
        </div>
        <div class="mb-2 mt-2  input-group ">
        <label for="email" class="mr-2">信箱:</label>
        <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="errorMsg text-right">
              <small class="text-danger" ></small>
        </div>
        <div class="mb-2 mt-2  input-group ">
            <label for="phone" class="mr-2">電話:</label>
            <input type="tel" class="form-control" name="phone" id="phone" required>
        </div>
        <div class="errorMsg text-right">
              <small class="text-danger" id=""></small>
        </div>

        <?php if($_SESSION["user"]["role"]===0):?>
          <div class="form-group">
          <span class="mr-3">權限:</span>
            <label for="admin" class="col-form-label">管理員</label>
            <input type="radio" class="form-check-label ml-2 adminModal" name="role" value="0" id="admin">
            <label for="member" class="col-form-label">會員</label>
            <input type="radio" class="form-check-label ml-2 memberModal" name="role" value="1" id="member">
          </div>
        <?php else:?>
        <input type="text" name="role" value="1" hidden>
        <?php ;endif;?>

        <div class="justify-content-center d-flex">
            <a type="button" class="btn btn-secondary mx-2 text-white" href="userList.php">取消</a>
            <button type="submit" class="btn btn-info " id="signinUpBtn">註冊</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <?php require_once ("../includes/script.php")?>
  <script>
      
        $("#signup_Account").on({
            "change": function(){
                let account=$(this).val();
                let formdata=new FormData();
                formdata.append("account", account);

                axios.post('../api/checkUser_api.php', formdata)
                    .then(function (response) {
                        console.log(response.data.count);
                        if(response.data.count===1){
                            $("#accountMsg").text("這個帳號已經有人註冊過了")
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
            },
          "keyup": function(){
                let accountLength=$(this).val().length;
                if(accountLength===0){$("#accountMsg").text("")
                }else if(accountLength<4){
                    $("#accountMsg").text("帳號太短，請輸入4~8英文數字")
                }else if(accountLength>4 && accountLength<=8){
                    $("#accountMsg").text("")
                }else if(accountLength>8){
                    $("#accountMsg").text("帳號太長，請輸入4~8英文數字")
                }
            }
      })

      $("#signup_Password").change(function(){
          let confirmPassword=$("#confirmPassword").val()
          let signup_Password=$("#signup_Password").val()

          if(signup_Password == ""){
            $(".signup_Password").text("請輸入密碼")
          }else if(signup_Password !== confirmPassword && confirmPassword!==""){
            $(".confirmPassword").text("密碼與再次確認密碼不一致，請重新確認")
          }else{
            $(".signup_Password").text("")
            $(".confirmPassword").text("")
          }
      })


      $("#confirmPassword").change(function(){
        let confirmPassword=$("#confirmPassword").val()
        let signup_Password=$("#signup_Password").val()
          if(signup_Password !== confirmPassword && confirmPassword!==""){
            $(".confirmPassword").text("密碼與再次確認密碼不一致，請重新確認")
          }else{
            $(".confirmPassword").text("")
          }
      })

      $("#signinUpBtn").click(function(){
        let msg1=$("#accountMsg").text()
        let msg2=$(".signup_Password").text()
        let msg3=$(".confirmPassword").text()
          if( msg1===msg2&&msg3===msg1){
              $("form").submit(function(){
                return true;
            });
            console.log("done");
            ("#createUserForm").submit();
            }else{
            console.log("faild")
            $("form").submit(function(){
                return false;
            });
          }
      })
      
  </script>
</body>
</html>