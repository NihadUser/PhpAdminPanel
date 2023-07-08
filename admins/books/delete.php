<?php
include "mySql.php";
$elaqe=sqlConnection();
try{
    if($_SERVER['REQUEST_METHOD']=="GET"){
        $userId=$_GET['id'];
        $query=$elaqe->prepare('DELETE FROM books WHERE id=?');
        $query->execute([
            $userId
        ]);
        header("location: index.php");
    }
}catch(Exception $msj){
    exit("We cant understannt".$msj->getMessage());
}
?>