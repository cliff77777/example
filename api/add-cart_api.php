<?php
session_start();

$id=$_POST["id"];
// $amount=$_POST["amount"];

$data=array(
    $id=>1 // $amount
);

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=array();
}else{
    $product_exist=false;
    foreach($_SESSION["cart"] as $value){
        if(array_key_exists($id,$value)){
            $product_exist=true;
            break;
        }
    };
    if(!$product_exist){
        array_push($_SESSION["cart"],$data);
        $msg=array(
            "status"=>0,
            "msg"=>"加入成功",
            "cart"=>$_SESSION["cart"]
        );
    }else{
        $msg=array(
            "status"=>1,
            "msg"=>"加入失敗",
            "cart"=>$_SESSION["cart"]
        );
    };

    echo json_encode($msg);
};



?>