<?php
require_once "../includes/config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php require_once("../includes/cdn.php")?>
  </head>
  <body>
    <?php require_once("../includes/adminRole.php");?>
      <?php require "../includes/header.php"?>
      <?php require "orderModal.php"?>

      <div class="container mt-5">
          <div class="d-flex justify-content-between ">
          <div class="mt-5">訂單數量:<span class="orderCount"></span></div>
                <form action="orderList.php" class="d-flex py-2 ">
                    <label for="start" class="text-center px-2 py-2">查詢日期: </label>
                    <input type="date" name="start" id="start">
                    <input type="date" name="end" id="end">
                    <button type="submit" class="btn btn-info " id="searchDate">查詢</button>
                </form>
            </div>
            <?php if(isset($_GET["start"]) && isset($_GET["end"]) && !empty($_GET["end"]) && !empty($_GET["end"])){?>
            <div class="justify-content-end d-flex">查詢日期:<?=$_GET["start"]?>~<?=$_GET["end"]?></div>
            <?php ;}?>
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th>訂單號</th>
                    <th>訂購日期</th>
                    <th>訂購姓名</th>
                    <th>編輯</th>
                  </tr>
              </thead>
              <tbody id="order">
              </tbody>
          </table>
      </div>
      <?php require_once("../includes/script.php")?>
    <script>
        
    //取得url get 值
    var Request = new Object();	 
    Request = GetRequest();
    function GetRequest() {		 
        var url = location.search; 
        var theRequest = new Object();		 
        if (url.indexOf("?") != -1) {		 
            var str = url.substr(1);		 
            strs = str.split("&");		 
            for(var i = 0; i < strs.length; i++) {		 
            theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);		 
            }		 
        }		 
        return theRequest;		 
    }
        formdata=new FormData();
        if(Request["start"]===""){
            Request["start"]="1911-01-01"
        }
        if(Request["end"]===""){
            Request["end"]="9999-09-09"
        }

        formdata.append("start",Request["start"])
        formdata.append("end",Request["end"])
        axios.post("../api/orderList_catch_api.php",formdata)
        .then(function(response){
            let content="";
            let data=response.data;
            $(".orderCount").text(data.length)
            data.forEach((order)=>{
                content+=`
                <tr>
                    <td>${order[1].orderNumber}</td>
                    <td>${order[1].orderTime}</td>
                    <td>${order[1].userName}</td>
                    <td><button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#orderModal" data-whatever="@getbootstrap" data-id=${order[1].orderid} >詳情</button>
                    </td>
                </tr>
                `
            })            
            $("#order").append(content)
        }).catch(function(error){
            console.log(error);
        })

        
        $("#order").on("click","button",function(){
            let formdata=new FormData();
            let id=$(this).data("id");
            formdata.append("id",id);
            axios.post("../api/orderList_catch_api.php",formdata)
            .then(function(response){
                console.log(response);
                let modalTotal=0;
                let modalData=response.data;
                modalContent="";
                modalData.forEach((order)=>{
                    $("#deleteID").val(order[1].orderid)
                    $("#orderNumberModal").text(order[1].orderNumber);
                    $.each(order,function(key,detail){
                        let subTotal=detail.productPrice*order[1].amount;
                        modalTotal+=subTotal;
                        modalContent+=`
                    <tr>
                        <td>${detail.productName}</td>
                        <td>${detail.amount}</td>
                        <td>${detail.productPrice}</td>
                        <td>${subTotal}</td>
                    </tr>
                    `
                        
                    })
                })
                $("#modalTable").html(modalContent);
                $("#modalTotal").text(modalTotal);
                }
            )
        })
        
        $("#modalDeleteBtn").click(function(){

        })

    </script>


  </body>
</html>

