<?php
$cssUrl="style.css";
include "../../parts/header.php";
include "../../parts/menu.php";
?>
<div class="main">
    <div class="main1">
        <?php
        include "../../admins/books/mysql.php";
        $elaqe=sqlConnection();
        $next=$elaqe->prepare('SELECT * from info where menu="bio"');
        $next->execute();
        $data=$next->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1><?php echo $data[0]['title'] ?></h1>
        <span><?php echo $data[0]['description'] ?></span>
    </div>
    <div class="main2">
        <div class="main2Inner">
            <div class="main2Content">
                <h1>My Story</h1>
                <?php 
                    $next=$elaqe->prepare('SELECT * from blogs');
                    $next->execute();
                    $data=$next->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <p><?php echo $data[0]['description']?></p>
                <div class="icons">
                    <div class="icon"><i class="fa-brands fa-facebook"></i></div>
                    <div class="icon"><i class="fa-brands fa-twitter"></i></div>
                    <div class="icon"><i class="fa-brands fa-youtube"></i></div>
                </div>
            </div>
            <div class="main2Image">
                <img src="../../uploads/about-image-02.png" alt="">
            </div>
        </div>
    </div>
    <div class="main2 color">
        <div class="main2Inner">
            <div class="main2Image img">
                <img src="../../uploads/about-image.png" alt="">
            </div>
            <div class="main2Content">
                <h1>Personal Life</h1>
                <?php 
                    $next=$elaqe->prepare('SELECT * from blogs');
                    $next->execute();
                    $data=$next->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <p><?php echo $data[0]['description']?></p>
            </div>
        </div>
    </div>
</div>