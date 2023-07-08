<?php
$cssUrl="style.css";
include "../../parts/header.php";
include "../../parts/menu.php";
?>
<div class="main">
    <div class="main-1">
        <?php 
        include "../../admins/books/mysql.php";
        $elaqe=sqlConnection();
        $query=$elaqe->prepare('SELECT * from info');
        $query->execute();
        $data=$query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h1><?php echo $data[0]['title'] ?></h1>
        <span><?php echo $data[0]['description'] ?></span>
    </div>
    <div class="main-2">
        <?php
        $query=$elaqe->prepare('SELECT * from books');
        $query->execute();
        $data=$query->fetchALL(PDO::FETCH_ASSOC);
        ?>
        <div class="main-2-inner-1">
            <span>New Release</span>
            <h1 class="title"><?php echo $data[0]['name']?></h1>
            <p><?php echo $data[0]['description'] ?></p>
            <button class="button">$ <?php echo $data[0]['price'] ?> - Purchase</button><br>
            <button class="main-2-button">READ ON KINDLE</button>
        </div>
        <div class="main-2-inner-2">
            <img src="../../uploads/<?php echo $data[0]['image'] ?>" alt="">
        </div>
    </div>
    <div class="main-3">
        <p class="main3Title">Complete Series Of</p>
        <h1 class="main3Text">Smoke And The Heart</h1>
        <span class="main3Span">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</span>
        <div class="books">
            <?php
    $query=$elaqe->prepare('SELECT * FROM books LIMIT 8 OFFSET 3');
    $query->execute();
    $data=$query->fetchAll(PDO::FETCH_ASSOC);
    ?>
            <?php 
    foreach($data as $singleData){
?>
            <div class="card">
                <img src="../../uploads/<?php echo $singleData['image'] ?>" alt="">
                <h3><?php echo $singleData['name'] ?></h3>
                <button class="purchase">$<?php echo $singleData['price']?> - Purchase</button>
            </div>
            <?php 
    }
?>
        </div>
    </div>
    <div class="main-4">
        <?php 
            $query=$elaqe->prepare('SELECT * FROM books limit 1 OFFSET 1');
            $query->execute();
            $data=$query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="main4Content">
            <h1>Buy a <?php echo $data['name']?></h1>
            <p><?php echo $data['description'] ?></p>
            <a href="" class="buyLink">$<?php echo $data['price']?> - Purchase</a>
        </div>
        <div class="img">
            <img src="../../uploads/<?php echo $data['image']?>" alt="">
        </div>
    </div>
    <div class="main-5">
        <?php
           $query=$elaqe->prepare('SELECT * FROM books limit 1 OFFSET 2');
           $query->execute();
           $data=$query->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="main5Inner">
            <div class="main5Image">
                <img src="../../uploads/<?php echo $data['image'] ?>" alt="">
            </div>
            <div class="main5Content">
                <h1><?php echo $data['name']?></h1>
                <p><?php echo $data['description']?></p>
                <a href="" class="buyLink">Notify me</a>
            </div>
        </div>
    </div>
    <div class=" endDiv">
        <div class="subscripe">
            <h1>Subscribe Now to Get Regular Updates</h1>
            <?php
                $page="";
                $email = "test@example.com";
                $emailRegex = "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$^";
                if (preg_match($emailRegex, $email)){
                    $page="subscription.php";
                }
            ?>
            <form action="<?php echo $page ?>" method="POST">
                <input type="email" name="sbcEmail">
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="main1Image-2">
            <img src="https://websitedemos.net/kathryn-ebook-author-02/wp-content/uploads/sites/1020/2022/02/susbcribe-image.png"
                alt="">
        </div>
    </div>
</div>
<?php
include "../../parts/footer.php";
?>