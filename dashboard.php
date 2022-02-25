<?php
    require_once ("includes/config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  
</div>
<?php require_once ("order/orderModal.php");?>
<?php require_once("user/changePasswordModal.php");?>
      <div class="container mt-5">
      <?php require "includes/header.php"?>
      <?php if($_SESSION["user"]["role"]===2):?>
        <h5 class="h1 text-center ">登入會員看到更多的資訊</h5>
        <?php ;else:?>
        <div class="container" >
          <div class="row" style="height: 100vh">
            <div class="col-3 my-5 justify-content-center d-flex">
              <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active" aria-current="true" id="userDataBtn">
                  會員基本資料
                </button>
                <button type="button" class="list-group-item list-group-item-action" id="cartBtn">購物車</button>
                <button type="button" class="list-group-item list-group-item-action" id="historyBtn">購買紀錄</button>
              </div>
            </div>
            <!-- 購買紀錄 -->
              <?php require_once ("dashboardfile/historyData.php")?> 
            <!-- 會員基本資料 -->
              <?php require_once ("dashboardfile/userData.php")?> 
            <!-- 購物車 -->
              <?php require_once ("dashboardfile/cartData.php")?> 
          </div>
        </div>
        <?php ;endif;?>
      </div>
      <?php require_once("includes/script.php");?>
      <script>
      //側欄控制
      $("#userDataBtn").click(function(){
        $("#userData").addClass("active");
        $("#userData").removeClass("d-none");
        $("#cartData").removeClass("active");
        $("#historyData").removeClass("active");
        $("#cartData").addClass("d-none");
        $("#historyData").addClass("d-none");
        $("#cartBtn").removeClass("active");
        $("#userDataBtn").addClass("active");
        $("#historyBtn").removeClass("active");

      });
      $("#cartBtn").click(function(){
        $("#cartBtn").addClass("active");
        $("#cartData").removeClass("d-none");
        $("#userDataBtn").removeClass("active");
        $("#userData").addClass("d-none");
        $("#historyData").addClass("d-none");
        $("#userData").removeClass("active");
        $("#historyData").removeClass("active");
        $("#historyBtn").removeClass("active");
      });

      $("#historyBtn").click(function(){
        $("#historyBtn").addClass("active");
        $("#historyData").addClass("active");
        $("#historyData").removeClass("d-none");
        $("#cartData").removeClass("active");
        $("#userData").removeClass("active");
        $("#userData").addClass("d-none");
        $("#cartData").addClass("d-none");
        $("#cartBtn").removeClass("active");
        $("#userDataBtn").removeClass("active");
      });


//修改會員資料
        $("#resetDataBtn").click(function(){
          location.reload();
        })

        $("#updatePasswordBtn").click(function(){
          $("#changePasswordModal").addClass("active");
          $("#oldPassword").attr('data-id',$(this).data("id"));
        })

                //取消按鈕
            $("#changeCancel").click(function(){
            $("#changePasswordModal").removeClass("active");
            $("#oldPassword").attr('data-id',"");
        })

        // 檢查舊密碼
        $("#oldPassword").on({
            "change":function(){       
                let oldPass=$("#oldPassword").val();
                let id=$(this).data("id");
                let formdata=new FormData();
                console.log(id);
                formdata.append("oldPass",oldPass);
                formdata.append("id",id);
                axios.post("/example/api/checkpassword_api.php",formdata).then(
                     function(response){
                         let status=response.data.status;
                         if(status===3){
                             $("#changePasswordError").text("提示:舊密碼輸入錯誤");
                         }else if(status===2){
                            $("#changePasswordError").text("提示:請輸入新密碼");
                            $("#newPassword").prop("readonly",false);
                            $("#oldPassword").prop("readonly",true);
                         }else{
                            $("#changePasswordError").text("提示:發生錯誤");
                         }
                     }).catch(function(error){
                    console.log(error);
                 })
                 }
            });

            // 新密碼確認
            $("#newPassword").on({
                "change":function(){
                    $("#confirmPassword").prop("readonly",false);
                    let newpassword=$("#newPassword").val();
                    // let confirmPassword=$("#confirmPassword").val();
                    $("#changePasswordError").text("提示:請再次確認新密碼");
                }
            })

            $("#confirmPassword").on({
                "change":function(){
                    let newpassword=$("#newPassword").val();
                    let confirmPassword=$("#confirmPassword").val();
                    if(newpassword===confirmPassword){
                        $("#changePasswordError").text("提示:請記住新密碼，按下確認後將修改完成");
                        $("#changePassBtn").removeClass("disabled");
                        $("#changePassBtn").removeClass("btn-secondary");
                        $("#changePassBtn").addClass("btn-primary");
                    }else{
                        $("#changePasswordError").text("提示:密碼不一致，請重新確認");
                        $("#changePassBtn").addClass("disabled");
                        $("#changePassBtn").addClass("btn-secondary");
                        $("#changePassBtn").removeClass("btn-primary");
                    }
                }
            })
            $("#changePassBtn").click(function(){
              $("#changePasswordForm").submit();
            })

          //修改會員資料
            $("#name").change(function(){
              let val=$(this).val();
              if(val===""){
                $("#nameErrorMsg").text("請輸入姓名");
              }else{
                $("#nameErrorMsg").text("");

              }
            })
            $("#email").change(function(){
              let val=$(this).val();
              if(val===""){
                $("#emailErrorMsg").text("請輸入信箱");
              }else{
                $("#emailErrorMsg").text("");

              }
            })
            $("#phone").change(function(){
              let val=$(this).val();
              if(val===""){
                $("#phoneErrorMsg").text("請輸入電話");
              }else{
                $("#phoneErrorMsg").text("");

              }
            })


          $("#updateUserBtn").click(function(){
            let checkSpace=$(".changeUse").text();
            if(checkSpace===""){
              $("#finalErrorMsg").text("")
              console.log("pass")
              $("#updataUserForm").submit()

            }else{
              $("#finalErrorMsg").text("請檢查紅字錯誤後再嘗試送出修改")
            }

          })

      </script>
  </body>
</html>