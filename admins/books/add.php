<?php
include "mysql.php";
$elaqe=sqlConnection();
try{
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['purchase'])&& !empty($_POST['status'])){
            $name=$_POST['name'];
            $description=$_POST['description'];
            $purchase=$_POST['purchase'];
            $status=$_POST['status'];
            if($_FILES['file']){
                $file=$_FILES['file'];
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
                    $query=$elaqe->prepare("INSERT INTO books(name,description,price,image,status) values (?,?,?,?,?)");
                    $query->execute([
                        $name,
                        $description,
                        $purchase,
                        $newFileName.".".$realFileExtentions,
                        $status
                    ]);
                    header("location: index.php");
                }
            }
        }
    }
}catch(Exception $msj){
    exit("error".$msj->getMessage());
}

?>
<?php
$elaqe==sqlConnection();
try{
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $query=$elaqe->prepare('INSERT into info(title,description,status,menu) values(?,?,?,?)');
        $query->execute([
            $_POST['title'],
            $_POST['description'],
            $_POST['status'],
            $_POST['menu']
        ]);
        header('location: index.php');
    }
}catch(Exception $send){
    exit("error".$send->getMessage());
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
    <h1>Add to books</h1>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter name"><br>
        <input type="text" name="description" placeholder="Enter description"><br>
        <input type="text" name="purchase" placeholder="Enter price"><br>
        <input type="number" name="status" placeholder="Enter status" max="2"><br>
        <input type="file" name="file"><br>
        <button type="submit">Add</button>
    </form>
    <h1>Add to info</h1>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="title" placeholder="Enter title"><br>
        <input type="text" name="description" placeholder="Enter description"><br>
        <input type="text" name="menu" placeholder="Enter menu"><br>
        <input type="number" name="status" placeholder="Enter status" max="2"><br>
        <button type="submit">Send</button>
    </form>
</body>

</html>