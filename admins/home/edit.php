<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $query=$elaqe->prepare('SELECT * from users where id=?');
    $query->execute([
        $_GET['id']
    ]);
    $data=$query->fetch(PDO::FETCH_ASSOC);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $query=$elaqe->prepare('UPDATE users set name=?,surname=?,email=?,role=? where id=?');
    $query->execute([
        $_POST['name'],
        $_POST['surname'],
        $_POST['email'],
        $_POST['role'],
        $_POST['id']
    ]);
    header('location: index.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../parts/style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="id" value="<?php echo $data['id'] ?>"><br>
        <input type="text" name="name" value="<?php echo $data['name'] ?>"><br>
        <input type="text" name="surname" value="<?php echo $data['surname'] ?>"><br>
        <input type="text" name="email" value="<?php echo $data['email'] ?>"><br>
        <input type="text" name="role" value="<?php echo $data['role'] ?>"><br>
        <button type='submit'>Send</button>
    </form>

</body>

</html>