<!doctype html>
<html lang="en">
  <head>
    <title>Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once("../includes/cdn.php")?>
  </head>
  <body>
    <div class="container">
    <?php require_once("../includes/header.php")?>
        <div class="row py-5">
            <div class="col col-lg-3">
                <?php require_once("../includes/aside copy.php")?>
            </div>
            <div class="col col-lg-9" >
                <div class="row" id="product"></div>
            </div>
        </div>
    </div>

    <?php require_once ("../includes/script.php")?>

    <script>
function category(target){
            let formdata=new FormData();
            formdata.append("id",target);
            axios.post("../api/category_api.php",formdata).then(
            function(response){
                let data=response.data["category"];
                return data;
                }
            )
        };
        axios.get("../api/product_List_api.php").then(
            function(response){
                let data=response.data;
                let content="";
                data.forEach((product)=>{
                    content+=`
                <div class="col-lg-3 my-3">
                    <div class="card p-2">
                        <h6>${product.product_name}</h6>
                        <figure>
                            <img  class="cover-fit" alt="${product.name}"src="/example/img/product/${product.picture}" >
                        </figure>
                        <div class="">價格:${product.price}</div>
                        <div class="" id="reserve">庫存:${product.count}</div>
                            <button type="button" class="btn btn-primary btn-block add-cart" data-id="${product.id}"><i class="fas fa-cart-plus"></i></button>
                        <form>
                    </div>
                </div>
                `
                })
                $("#product").append(content)
                
            }
        ).catch(function (error) {
            console.log(error);
        });

        $("#product").on("click","button",function(){
            let id=$(this).data("id");
            let formdata=new FormData();
            formdata.append("id",id);
            axios.post("../api/add-cart_api.php",formdata).then(
                function(response){
                    let data=response.data;
                    let status=data.status;
                    if(status===1){
                        alert("重複加入商品");
                    }else{
                        let amount=parseInt($("#amount").text());
                        amount++;
                        $("#amount").text(amount);
                    }                    
                }).catch(function(error){

            });
        })
    </script>
  </body>
</html>