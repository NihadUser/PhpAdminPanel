<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']){
    $query=$elaqe->prepare('SELECT * FROM message where id=?');
    $query->execute([
        $_GET['id']
    ]);
    $data=$query->fetch(PDO::FETCH_ASSOC);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $query=$elaqe->prepare('UPDATE message set name=?,subject=?,email=?,message=? where id=?');
    $query->execute([
        $_POST['name'],
        $_POST['subject'],
        $_POST['email'],
        $_POST['message'],
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
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <input type="hidden" value="<?php echo $data['id']?>">
        <input type="text" name="name" value="<?php echo $data['name']?>"><br>
        <input type="text" name="subject" value="<?php echo $data['subject']?>"><br>
        <input type="email" name="email" value="<?php echo $data['email']?>"><br>
        <textarea name="message" cols="30" rows="10"><?php echo $data['message']?></textarea><br>
        <button type="submit">Add</button>
    </form>
</body>

</html>