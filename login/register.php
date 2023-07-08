<?php
include "../admins/books/mysql.php";
$elaqe=sqlConnection();
$name=$email=$psw=$surname="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['psw'])){
        $name=validation($_POST['name']);
        $email=validation($_POST['email']);
        $psw=validation($_POST['psw']);
        $surname=validation( $_POST['surname']);
        $query=$elaqe->prepare('INSERT INTO users(name,email,password,surname) values (?,?,?,?)');
        $query->execute([
            $name,
            $email,
            $psw,
            $surname
        ]);
        header('location: index.php');
    }
}
function validation($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../parts/style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name" placeholder="Enter name"><br>
        <input type="text" name="surname" placeholder="Enter surname"><br>
        <input type="email" name="email" placeholder="Enter email adress"><br>
        <input type="password" name="psw" placeholder="Enter password"><br>
        <button type="submit">Register</button>
    </form>
</body>

</html>