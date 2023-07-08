<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
   
try{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $query=$elaqe->prepare('INSERT INTO message(name,subject,email,message) values(?,?,?,?)');
        $query->execute([
        $_POST['name'],
        $_POST['subject'],
        $_POST['email'],
        $_POST['message']
        ]);
        header('location: index.php');
    }
}catch(Exception $send){
    exit("error: ".$send->getMessage());
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name" placeholder="Add blog descriptoin"><br>
        <input type="text" name="subject" placeholder="Add subject"><br>
        <input type="email" name="email" placeholder="Add email"><br>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
        <button type="submit">Add</button>
    </form>
</body>

</html>