<?php
include "mysql.php";
$elaqe=sqlConnection();
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $query=$elaqe->prepare('SELECT * FROM books WHERE id=?');
    $query->execute([
        $id
    ]);
    $data=$query->fetch(PDO::FETCH_ASSOC);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['id'] && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['status'])){
        if($_FILES['image']){
            $file=$_FILES['image'];
            $fileName=$file['name'];
            $fileType=$file['type'];
            $fileTemp=$file['tmp_name'];
            $fileSize=$file['size'];
            $error=$file['error'];
            $fileExtension=explode(".",$fileName);
            $realFileExtentions=end($fileExtension);
            $allowedExtentions=["png","jpeg","jpg"];
            if($error==0 && in_array($realFileExtentions,$allowedExtentions)){
                $newFileName=uniqid("",true);
                $filePath="../../uploads/".$newFileName.".".$realFileExtentions;
                move_uploaded_file($fileTemp,$filePath);
                $query=$elaqe->prepare('UPDATE books set name=?,image=?,price=?,status=?,updated_at=now() where id=?');
                $query->execute([
            $_POST['name'],
            $newFileName.".".$realFileExtentions,
            $_POST['price'],
            $_POST['status'],
            $_POST['id']
        ]);
        header('location: index.php');
        }
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
    <link rel="stylesheet" href="../../parts/style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $data['id'] ?>"><br>
        <input type="text" name="name" value="<?php echo $data['name'] ?>"><br>
        <input type="file" name="image" value="<?php echo $data['image'] ?>"><br>
        <input type="text" name="price" value="<?php echo $data['price'] ?>"><br>
        <input type="number" name="status" value="<?php echo $data['status'] ?>"><br>
        <button type="submit">Edit</button>
    </form>
</body>

</html>