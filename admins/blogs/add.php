<?php
include "../books/mysql.php";
$elaqe=sqlConnection();
    $query=$elaqe->prepare("SELECT users.id FROM users");
    $query->execute();
    $data=$query->fetchAll(PDO::FETCH_ASSOC);
try{
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $blog=$_POST['blog'];
        $user=$_POST['user'];
        $query=$elaqe->prepare('INSERT INTO blogs(description,user_id) values(?,?)');
        $query->execute([
        $blog,
        $user
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
        <input type="text" name="blog" placeholder="Add blog descriptoin"><br>
        <select name="user" id="">
            <?php foreach($data as $id){
            ?>
            <option value="<?php echo $id['id']?>"><?php echo $id['id']?></option>
            <?php
                }
                ?>
        </select><br>
        <button type="submit">Add</button>
    </form>
</body>

</html>