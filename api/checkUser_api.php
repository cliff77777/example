<?php
require_once ("../includes/config.php");
$account=$_POST["account"];

$sql="SELECT account FROM users WHERE account='$account'";
$stmt=$db_host->prepare($sql);
$stmt->execute();

try{
    $count=$stmt->rowCount();
    $data=array(
        "status"=>1,
        "count"=>$count
    );
    echo json_encode($data);

}catch(PDOException $e){
    $data=array(
        "status"=>0,
        "message"=>$e->getMessage()
    );
    echo json_encode($data);
    exit;
}
?>