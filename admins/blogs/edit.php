<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $query=$elaqe->prepare("SELECT * from blogs where id=?");
    $query->execute([
        $_GET['id']
    ]);
    $data=$query->fetch(PDO::FETCH_ASSOC);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $query=$elaqe->prepare("UPDATE blogs set description=? where id=?");
    $query->execute([
        $_POST['description'],
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="id" value="<?php echo $data['id'] ?>"><br>
        <input type="text" name="description" value="<?php echo $data['description'] ?>"><br>
        <button type="submit">Edit</button>
    </form>
</body>

</html>