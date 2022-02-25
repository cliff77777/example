<?php
    require ("../includes/config.php");

    $id=$_GET["id"];
    $valid="0";
    $deleteSql="UPDATE users SET valid=? WHERE id=?";
    $deleteStmt=$db_host->prepare($deleteSql);
    
    try{
        $deleteStmt->execute([$valid,$id]);
        header("location:userList.php?ms=de");
    }catch(PODExpection $e){
        echo "error<br>";
        echo "ERROR: ".$e->getMessage()."<br>";
    };

?>