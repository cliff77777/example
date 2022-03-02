<?php
require_once ("../includes/config.php");


if(isset($_POST["account"])){
    $account=$_POST["account"];
}else{
    echo"請依正常途徑註冊";
    exit;
}


$role=$_POST["role"];
$name=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$createTime=date("Y-m-d H:i:s");
$phone=$_POST["phone"];
$valid="1";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);



//確認重複
$checksql="SELECT account FROM user WHERE valid=1 AND account=$account";
$checkstmt=$db_host->prepare($checksql);
try{
    $checkstmt->execute();
    $count=$checkstmt->$rowCount();
    if($count>0){
        echo '<script>alert("帳號已重複")</script>';
        exit;
    }
}catch(PDOException $e){
    echo $e->getMessage();
};


// 新增到使用者資料庫
$sql="INSERT INTO users (role,name,account,password,email,createTime,phone,valid) VALUE(?,?,?,?,?,?,?,?)" ;
$stmt=$db_host->prepare($sql);
try{
    $stmt->execute([$role,$name,$account,$hashed_password,$email,$createTime,$phone,$valid]);
    $doMsg=array(
        "status"=>0,
        "msg"=>"新增帳號成功",
        "sysMsg"=>"success"
    );
    $_SESSION["doMsg"]= $doneMsg;
    if($_SESSION["user"]["role"]===0){
        header('location:userList.php');
    }else{
        echo "<script>alert('帳號已完成註冊，請重新登入');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }
    
}catch(PDOException $e){
    $doMsg=array(
        "status"=>1,
        "msg"=>"新增帳號失敗",
        "sysMsg"=>"$e->getMessage()"
    );
    $_SESSION["doMsg"]= $doneMsg;
    echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</>";};

    $db_host=null;


?>

