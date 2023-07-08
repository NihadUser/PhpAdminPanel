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
            $query=$elaqe->prepare("SELECT blogs.id,blogs.description,users.name FROM blogs LEFT JOIN users ON blogs.user_id=users.id");
            $query->execute();
            $data=$query->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Blog</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                foreach($data as $datum){
                ?>
                    <tr>
                        <td><?php echo $datum['id'] ?></td>
                        <td><?php echo $datum['name'] ?></td>
                        <td><?php echo $datum['description'] ?></td>
                        <td>
                            <a class="delete" href="delete.php?id=<?php echo $datum['id'] ?>">Delete</a>
                            <a class="edit" href="edit.php?id=<?php echo $datum['id'] ?>">Edit</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <a href="add.php" class="addLink">Add a blog</a>
    </div>

</body>

</html>