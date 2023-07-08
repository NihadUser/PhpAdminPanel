<?php
$cssUrl="style.css";
include "../../parts/header.php";
include "../../parts/menu.php";
include "../../admins/books/mysql.php";
$elaqe=sqlConnection();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $query=$elaqe->prepare("INSERT INTO message(name,email,subject,message) values (?,?,?,?)");
        $query->execute([
            $name,
            $email,
            $subject,
            $message
        ]);
    }
}
?>
<div class="main">
    <div class="main1">
        <?php
        $query=$elaqe->prepare('SELECT * FROM info where menu="contact"');
        $query->execute();
        $data=$query->fetchALL(PDO::FETCH_ASSOC);
    ?>
        <h1><?php echo $data[0]["title"] ?></h1>
        <span><?php echo $data[0]["description"] ?></span>
    </div>
    <div class="main2">
        <div class="contact">
            <div class="contactContent">
                <h1><?php echo $data[1]['title'] ?></h2>
                    <span><?php echo $data[1]['description'] ?></span>
                    <p class="text"><i class="fa-solid fa-envelope"></i> mail@example.com</p>
            </div>
            <div class="mainContact">
                <h1><?php echo $data[2]['title']?></h1>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <input type="text" name="name" placeholder="Your Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea placeholder="Message" name="message" id="" cols="30" rows="10"></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
            <div class="iconContainer">
                <h1><?php echo $data[3]['title']?></h1>
                <div class="icons">
                    <div class="icon"><i class="fa-brands fa-facebook"></i></div>
                    <div class="icon"><i class="fa-brands fa-twitter"></i></div>
                    <div class="icon"><i class="fa-brands fa-youtube"></i></div>
                </div>
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
</div>