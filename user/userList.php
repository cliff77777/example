<?php require_once ("../includes/config.php")?>
<!doctype html>
<html lang="en">
  <head>
    <title>userList</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

  </head>
  <body>
  <?php require_once("changePasswordModal.php");?>
  <?php require_once("../includes/adminRole.php");?>
    <div class="container py-2 mt-5">
    <?php require("../includes/header.php"); ?>
        <div class="d-flex justify-content-between py-2">
            <div class="">共有<span class="usercount"></span>個帳號</div>
            <a href="signUp.php" type="button" class="btn btn-info">新增帳號</a>
        </div>
        <table class="table table-border">
            <thead class="justify-content-center">
                <th>姓名</th>
                <th>帳號</th>
                <th>信箱</th>
                <th>權限</th>
                <th>操作</th>
                <th>修改密碼</th>
            </thead>
            <tbody>
            </tbody>
        </table>

        
    </div>
    <?php require_once("../includes/script.php");?>
    <script>
axios({
            method: 'post',
            url: '../api/userList_api.php',
        })
        .then(function (response) {
            let data=response.data;
            let content="";
            data.forEach((user)=>{
                //顯示權限
                let role=user.role;
                function decoding(target){
                    if(target===0){
                        return "管理員"
                    }else{
                        return "會員"
                    }
                };
                //列表產生內容
                content+=`
                <tr>
                    <td>${user.name}</td>
                    <td>${user.account}</td>
                    <td>${user.email}</td>
                    <td>${decoding(role)}</td>
                    <td calss="userbtn"><?php require_once("userModal.php")?></td>
                    <td class="changePasswordBtn"><a class="btn btn-secondary text-white changePassword-Btn" type="button" data-id="${user.id}" data-account="${user.account}">更改密碼</a></td>
                </tr>
                `
            })
            $("tbody").append(content)
            $(".usercount").text(data.length)
        }).catch(function (error) {
            console.log(error);
        });

        //會員瀏覽
        $("tbody").on("click","button",function(){
                let id=$(this).data("id");
                let formdata=new FormData();
                formdata.append("id",id);
                axios.post('../api/user_api.php',formdata)
                .then(function(response){
                    let data=response.data;
                    $(".accountModal").val(data.account)
                    $(".nameModal").val(data.name)
                    $(".emailModal").val(data.email)
                    $(".phoneModal").val(data.phone)
                    $(".createTimeModal").val(data.createTime)
                    $(".idModal").val(data.id)
                    $(".delete-btn").attr("href",'delete_user.php?id='+data.id)
                    // $("#checkaccount").attr("data-account",data.account)
                    if(data.role===0){
                        $(".adminModal").prop("checked",true);
                    }else{
                        $(".memberModal").prop("checked",true);
                    };
                }).catch(function (error) {
                    console.log(error);
                });
            })

        // 刪除帳號
        $("tbody").on("click",".delete-btn",function(){
            alert("確定要刪除帳號嗎?");
        })

        //更改密碼
        $("tbody").on("click","a",function(){
            $("#changePasswordModal").addClass("active");
            $("#oldPassword").attr('data-id',$(this).data("id"));
            $("#checkaccount").val($(this).data("account"));
           
        })
        //取消按鈕
        $("#changeCancel").click(function(){
            $("#changePasswordModal").removeClass("active");
            $("#oldPassword").attr('data-id',"");
            location.reload();
        })

        // 檢查舊密碼
        $("#oldPassword").on({
            "change":function(){       
                let oldPass=$("#oldPassword").val();
                let id=$(this).data("id");
                let formdata=new FormData();
                formdata.append("oldPass",oldPass);
                formdata.append("id",id);
                axios.post("../api/checkpassword_api.php",formdata).then(
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

    </script>
  </body>
</html>
