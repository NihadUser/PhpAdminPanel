<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../books/style.css">
</head>

<body>
    <div class="main">
        <div class="main-3">
            <?php
        include "../../parts/adminHeader.php";
        ?>
            <?php 
            include "../books/mysql.php";
            $elaqe=sqlConnection();
            $query=$elaqe->prepare('SELECT * from message');
            $query->execute();
            $data=$query->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($data as $msj){ 
                ?>
                    <tr>
                        <td><?php echo $msj['id'] ?></td>
                        <td>
                            <span><?php echo $msj['name'] ?></span>
                        </td>
                        <td><?php echo $msj['email'] ?></td>
                        <td><?php echo $msj['subject'] ?></td>
                        <td><?php echo $msj['message'] ?></td>
                        <td>
                            <a class="delete" href="delete.php?id=<?php echo $msj['id'] ?>">Delete</a>
                            <a class="edit" href="edit.php?id=<?php echo $msj['id'] ?>">Edit</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <a href="add.php" class="addLink">Add</a>
    </div>
</body>

</html>