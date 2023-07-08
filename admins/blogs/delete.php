<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $query=$elaqe->prepare('DELETE FROM blogs where id=?');
    $query->execute([
        $_GET['id']
    ]);
    header('location: index.php');
}
?>