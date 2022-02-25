<?php
session_start();
$servername = "localhost";
$username = "admin1";
$password = "123456";
$dbname = "product_db";
date_default_timezone_set("Asia/Taipei");

try{
    $db_host=new PDO(
        "mysql:host={$servername};
        dbname={$dbname};
        charset=utf8",
        $username,$password
    );
}catch(PDOException $e){
    echo "資料庫鏈結失敗<br>";
    echo "Error: ".$e->getMessage()."<br>";
    exit;
}

// echo "資料庫連結成功";

// $db_host=null; //資料庫關閉 

?>