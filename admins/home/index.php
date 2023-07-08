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
            $query=$elaqe->prepare('SELECT * from users');
            $query->execute();
            $data=$query->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($data as $users){ 
                ?>
                    <tr>
                        <td><?php echo $users['id'] ?></td>
                        <td>
                            <span><?php echo $users['name'] ?></span>
                        </td>
                        <td><?php echo $users['surname'] ?></td>
                        <td><?php echo $users['email'] ?></td>
                        <td><?php echo $users['role'] ?></td>
                        <td>
                            <a class="delete" href="delete.php?id=<?php echo $users['id'] ?>">Delete</a>
                            <a class="edit" href="edit.php?id=<?php echo $users['id'] ?>">Edit</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>