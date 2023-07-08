<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $userId=$_GET['id'];
    $query=$elaqe->prepare("DELETE FROM users where id=?");
    $query->execute([
        $userId
    ]);
    header('location: index.php');
}


?>