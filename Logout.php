<?php

session_start();

if($_SESSION["user"]["role"] == 2){
    header("location:dashboard.php");
}

if(isset($_SESSION["user"])){
    session_destroy();}

    echo "<script>alert('退出成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

    ?>