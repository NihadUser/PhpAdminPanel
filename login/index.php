<?php
include "../admins/books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $query=$elaqe->prepare('SELECT * FROM users');
    $query->execute();
    $data=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $datum){
        if($datum['email']==$_POST['email'] && $datum['password']==$_POST['psw'] && $datum['role']=="admin"){
            header("location: ../admins/books/index.php");
        }
        if($datum['password']==$_POST['psw'] && $datum['email']==$_POST['email'] && $datum['role']=="user"){
            header("location: ../client/books/index.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="email" name="email" placeholder="Enter email"><br>
        <input type="password" name="psw" placeholder="Enter password"><br>
        <p>Don't have account? <a href="register.php">Sign up</a> </p>
        <button type="submit">Enter</button>
    </form>
</body>

</html>