    <div class="col-9 d-none" id="historyData" >
      <h3 class="text-center mt-5 py-3">購買紀錄</h3>
          <div class="mt-5">訂單數量:<span class="orderCount"></span></div>
          <table class="table table-striped">
              <thead>
                  <tr>
                    <th>訂單號</th>
                    <th>訂購日期</th>
                    <th>訂購姓名</th>
                    <th>訂單詳情</th>
                  </tr>
              </thead>
              <tbody id="order">
              </tbody>
          </table>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script>
      let formdata=new FormData();
      formdata.append("id",<?=$_SESSION["user"]["id"]?>)
      axios.post("/example/api/userOrder_api.php",formdata).then(function(response){
        let content="";
        let data=response.data;
        $(".orderCount").text(data.length)
        data.forEach((order)=>{
          content+=`
          <tr>
                    <td>${order.orderNumber}</td>
                    <td>${order.orderTime}</td>
                    <td><?=$_SESSION["user"]["name"]?></td>
                    <td><button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#orderModal" data-whatever="@getbootstrap" data-id=${order.orderid} >詳情</button>
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
            axios.post("api/orderList_catch_api.php",formdata)
            .then(function(response){
              console.log(response);
                let modalTotal=0;
                let modalData=response.data;
                modalCount="";
                modalData.forEach((order)=>{
                    $("#deleteID").val(order[1].orderid)
                    $("#orderNumberModal").text(order[1].orderNumber);
                    $.each(order,function(key,detail){
                        let subTotal=detail.productPrice*order[1].amount;
                        modalTotal+=subTotal;
                        modalCount+=`
                    <tr>
                        <td>${detail.productName}</td>
                        <td>${detail.amount}</td>
                        <td>${detail.productPrice}</td>
                        <td>${subTotal}</td>
                    </tr>
                    `
                        
                    })
                    console.log(modalCount)
                })
                $("#modalTable").html(modalCount);
                $("#modalTotal").text(modalTotal);
                }
            )
        })


    </script>
