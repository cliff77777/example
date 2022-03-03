<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $("#loginbtn").click(function(){
        let account=$("#account").val();
        let password=$("#password").val();
        let formdata=new FormData();
        formdata.append("account",account);
        formdata.append("password",password);
        axios.post('/example/api/do_login_api.php',formdata)
                .then(function(response){
                    let status=response.data.status;
                    if(status===0){
                        console.log("status:0")
                        location.href="";
                        alert("登入成功")
                    }else if(response.data.time>=3){
                        console.log("3",response.data.message)
                        $("#errormsg").text(response.data.message);
                    }else{
                        $("#errormsg").text(response.data.message+"，次數"+response.data.time+"次")
                        console.log("status:",response.data.status);
                    }
                }).catch(function (error) {
                    console.log(error)
                });
            })


          //         switch(status){
            //                 case 0:location.href=""
            //             break;
            //                 case 2:$("#errormsg").text(response.data.message+"，次數"+response.data.time+"次")
            //             break;
            //                 case 3:$("#errormsg").text(response.data.message+"，次數"+response.data.time+"次")
            //             break ;
            //         }
            //     }).catch(function (error) {
            //         console.log(error)
            //     });
            // })

</script>