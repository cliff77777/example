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
                <?php require_once("storeAside.php")?>
            </div>
            <div class="col col-lg-9" >
                <div class="row" id="product"></div>
            </div>
        </div>
    </div>

    <?php require_once ("../includes/script.php")?>

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
//storeAside 鏈結
            let formdata=new FormData();
            axios.post("../api/category_api.php").then(
            function(response){
                let data=response.data;
                content="";
                data.forEach((category)=>{
                    // console.log(category.category)
                    content+=`
                    <a href="storeList.php?category=${category.id}" class="list-group-item list-group-item-action" aria-current="true">${category.category}</a>
                    `
                })
                $("#storeCategory").append(content)
                }
            )

//獲取store資料
        axios.get("../api/product_List_api.php", {
            params:{
            category: Request["category"],
            max: Request["max"],
            min: Request["min"],
            search: Request["search"]
        }
        }).then(
            function(response){
                let data=response.data;
                console.log(data)

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

        //判斷加入購物車
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