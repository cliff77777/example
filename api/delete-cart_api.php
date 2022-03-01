<?php
session_start();
$delID=$_GET["id"];

foreach($_SESSION["cart"] as $key=>$value){
    if(array_key_exists($delID,$value)){
        unset($_SESSION["cart"][$key]);
        $msg=array(
            "status"=>0,
            "msg"=>"刪除成功",
            "cart"=>$_SESSION["cart"]
        );
        break;
    }else{
        $msg=array(
            "status"=>1,
            "msg"=>"刪除失敗",
            "cart"=>$_SESSION["cart"]
        );
    };
}
echo json_encode($msg);

?>