<?php
require_once "../includes/config.php";
$id=$_POST["id"];
$sql="SELECT * FROM product WHERE id=$id";
$stmt=$db_host->prepare($sql);

try{
    $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){ 
        echo json_encode($row);
    };
}catch(PDOException $e){
    $data=arry(
        "status"=>0,
        "message"=>$e->getMessage()
    );
    echo json_encode($error);
}
?>