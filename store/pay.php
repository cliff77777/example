<?php
    require_once ("../includes/config.php");

    if($_SESSION["user"]["role"]===2){
        $msg=array(
            "status"=>5,
            "msg"=>"需登入後結帳"
        );
        $_SESSION["cartMsg"]=$msg;
        header("location:cart.php");
        
    }elseif(empty($_SESSION["cart"])){
        $msg=array(
            "status"=>6,
            "msg"=>"請依正常管道進入"
        );
        $_SESSION["cartMsg"]=$msg;
        echo "<script>alert('請依正常管道進入');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }else{
        $sql="INSERT INTO user_order (user_id,order_time) VALUE(?,?)";
        $stmt=$db_host->prepare($sql);
        $stmt->execute([$_SESSION["user"]["id"],date("Y-m-d H:i:s")]);
        $orderid=$db_host->lastInsertId();

        foreach($_SESSION["cart"] as $product){
            foreach($product as $key=>$value){
                $sql="INSERT INTO user_order_detail (order_id,product_id,amount) VALUE(?,?,?)";
                $stmt=$db_host->prepare($sql);
                $stmt->execute([$orderid,$key,$value]);
            };
        };

        unset($_SESSION["cart"]);
        header("location:cart.php");


    }


    // echo $_SESSION["cartMsg"];

?>