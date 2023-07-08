<?php
include "../../admins/books/mysql.php";
$elaqe=sqlConnection();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $userId=$_POST['sbcEmail'];
        $query=$elaqe->prepare('INSERT INTO subscriptions(email) values (?)');
        $query->execute([
            $userId
        ]);
        header('location: index.php');
    }
?>