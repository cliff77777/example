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
        //寫入user_order
        $sql="INSERT INTO user_order (user_id,order_time,orderNumber) VALUE(?,?,?)";
        $stmt=$db_host->prepare($sql);
        $stmt->execute([$_SESSION["user"]["id"],date("Y-m-d H:i:s"),date("YmdHis").$_SESSION["user"]["id"]]);
        $orderid=$db_host->lastInsertId();
        //寫入user_order_detail
        foreach($_SESSION["cart"] as $product){
            foreach($product as $key=>$value){
                $sql="INSERT INTO user_order_detail (order_id,product_id,amount) VALUE(?,?,?)";
                $stmt=$db_host->prepare($sql);
                $stmt->execute([$orderid,$key,$value]);
                //修改product count、order_count數量
                $orderCountSql="UPDATE product SET count=IF(`count`<1, 0, `count`-1),order_count='1' WHERE id=$key";
                $orderCountStmt=$db_host->prepare($orderCountSql);
                $orderCountStmt->execute();

            };
        };        
        unset($_SESSION["cart"]);

        echo "<script>alert('訂單成立');location.href='../dashboard.php';</script>";
    }


    // echo $_SESSION["cartMsg"];

?>