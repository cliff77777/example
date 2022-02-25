<?php
require_once ("../includes/config.php");

// if(isset($_POST["password"])){
//     $password=$_POST["password"];
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
// };

if(!isset($_POST["account"])){
   heander("location:../dashboard.php");
   exit;
};

if(!isset($_POST["role"])){
    $role=1;
}else{
    $role=$_POST["role"];
}



$email=$_POST["email"];
$phone=$_POST["phone"];
$id=$_POST["id"];
$name=$_POST["name"];

$sql="UPDATE users SET name=?,email=?,phone=?,role=? WHERE id=?" ;
$stmt=$db_host->prepare($sql);


try{
    $stmt->execute([$name,$email,$phone,$role,$id]);
    echo "資料修改完成";
    $UserData=array(
        "name"=>$name,
        "phone"=>$phone,
        "email"=>$email,
    );
    $newUserData=array_merge($_SESSION["user"],$UserData);
    $_SESSION["user"]=$newUserData;

    echo "<script>alert('修改成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

}catch(PDOException $e){
    echo "資料修改失敗<br>";
    echo "Error: ".$e->getMessage()."<br>";
    exit;
};


    // foreach($phones as $value1){
    //     foreach($phoneID as $value){
    //         $sqlphone="UPDATE usersphone SET phone=? WHERE userID=?";
    //         $stmtphone=$db_host->prepare($sqlphone);
    //         try{
    //             $stmtphone->execute([$value,$id]);
    //             echo "資料修改完成";
    //         }catch(PDOException $e){
    //             echo "資料修改失敗<br>";
    //             echo "Error: ".$e->getMessage()."<br>";
    //             exit;
    //         };};}

?>
