<?php
$cssUrl="style.css";
include "../../parts/header.php";

?>
<div class="main">
    <?php 
        include "mysql.php";
        $elaqe=sqlConnection();
        $query=$elaqe->prepare('SELECT * from info');
        $query->execute();
        $data=$query->fetchAll(PDO::FETCH_ASSOC);
        ?>

    <div class="main-3">
        <?php
                include "../../parts/adminHeader.php";
                $query=$elaqe->prepare('SELECT * FROM books LIMIT 9 OFFSET 2');
                $query->execute();
                $data=$query->fetchAll(PDO::FETCH_ASSOC);
            ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                foreach($data as $singleData){
            ?>
                <tr>

                    <td><?php echo $singleData['id']?></td>
                    <td>
                        <?php echo $singleData['name']?>
                        <img class="image" src="../../uploads/<?php echo $singleData['image'] ?>" alt="">
                    </td>
                    <td><?php echo $singleData['description']?></td>
                    <td><?php echo $singleData['price']?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $singleData['id'] ?>" class="edit">Edit</a>
                        <a href="delete.php?id=<?php echo $singleData['id'] ?>" class="delete">Delete</a>
                    </td>
                </tr>

                <?php 
                }
            ?>
            </tbody>
        </table>
    </div>
    <a class="addLink" href="add.php">Add a book</a>

    <div class=" endDiv">

        <h2>Subscriptions:</h2>
        <?php
                   $query= $elaqe->prepare('SELECT * FROM subscriptions');
                    $query->execute();
                    $data=$query->fetchALL(PDO::FETCH_ASSOC);
                ?>
        <ul>
            <?php
                foreach ($data as $subs) {
                ?>
            <li><?php echo $subs['email'] ?></li>
            <?php
                }
                ?>
        </ul>
    </div>

</div>
</div>