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
            $query=$elaqe->prepare('SELECT * FROM books');
            $query->execute();
            $data=$query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="main1Inner1">
            <span>New Release</span>
            <h1><?php echo $data[0]['name'] ?></h1>
            <p>
                <?php echo $data[0]['description'] ?>
            </p>
            <a href="">$<?php echo $data[0]['price']?> - Purchase</a>
        </div>
        <div class="main1Inner2">
            <img src="../../uploads/<?php echo $data[0]['image'] ?>" alt="">
        </div>
    </div>
    <div class="main2">
        <div class="main2Content">
            <?php 
            $query=$elaqe->prepare('SELECT * from info');
            $query->execute();
            $data=$query->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <span>Complete Series</span>
            <h1><?php echo $data[2]['title']?></h1>
            <p><?php echo $data[2]['description']?></p>
            <a href="">Buy Complete Series</a>
        </div>
        <div class="main2Images">
            <?php
                $query=$elaqe->prepare('SELECT * FROM books LIMIT 8 OFFSET 3');
                $query->execute();
                $data=$query->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php
               foreach($data as $img){
            ?>
            <div class="images">
                <img src="../../uploads/<?php echo $img['image'] ?>" alt="">
            </div>
            <?php
               }
            ?>
        </div>
    </div>
    <div class="main3">
        <div class="main3Inner">
            <div class="main3Content">
                <?php
                $query=$elaqe->prepare('SELECT * from info');
                $query->execute();
                $data=$query->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <h1><?php echo $data[3]['title'] ?></h1>
                <p><?php echo $data[3]['description'] ?></p>
                <a href="">Read all</a>
            </div>
            <div class="main3Blog">
                <?php
                $query=$elaqe->prepare('SELECT  users.*,blogs.description,blogs.user_id from users LEFT JOIN blogs on blogs.user_id=users.id;');
                $query->execute();
                $data=$query->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php
                foreach($data as $datum){
                    if($datum['role']=='user'){
                ?>
                <div class="blog">
                    <p>
                        <?php echo $datum['role']=="user" ?$datum['description']: "" ?>
                    </p>
                    <div class="singleBlog">
                        <img src="../../uploads/<?php echo isset($datum['image']) ? $datum['image']: " " ?>" alt="">
                        <div class="blogContent">
                            <h4><?php
                            $datum['role']=="user"
                              ? $datum['name']."  ".$datum['surname']
                              :" " ;
                            ?></h4>
                            <span>Review on Book 1</span>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
                ?>
            </div>
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
                    $page="../books/subscription.php";
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