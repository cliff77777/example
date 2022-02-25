<?php
require_once("../includes/config.php");

if(!isset($_POST["id"])){
    echo "錯誤途徑";
    exit;

}else{
    $id=$_POST["id"];
}
$password=$_POST["newPassword"];


$sql="UPDATE users SET password=? WHERE id=$id";
$stmt=$db_host->prepare($sql);
$hashed_password=password_hash($password,PASSWORD_DEFAULT);

try{
    $stmt->execute([$hashed_password]);
    echo "密碼修改完成";
    echo "<script>alert('修改密碼成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";


}catch(PDOException $e){
echo "ERROR</br>";
echo "error:".$e->getMessage()."</br>";
exit;
}

?>