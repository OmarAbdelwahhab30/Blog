<?php
if (!isset($_SESSION['username'])){
    header("Location:http://blogg/signin/index");
}
require APP_PATH . '/views/includes/head.php';

?>

<div class="navbar dark">
    <?php
        require APP_PATH . '/views/includes/navigation.php';
    ?>
</div>

<div class="container" style="overflow: hidden">
    <div class="container-item">
        <form action="<?=URLROOT?>Home/add" method="post" enctype="application/x-www-form-urlencoded">
            <textarea placeholder="What's in your mind ?" name="postarea" style="
        resize: none;margin: 20px 815.35px 20px 0px;width: 1201px;height: 72px;" required></textarea>
            <input class="btn green" type="submit" name="submit" value="Add Post" style="
            cursor: pointer;border-radius: 10px;width: 145px;height: 41px;">
        </form>
    </div>

        <?php
        $posts = isset($_SESSION['posts'])? $_SESSION['posts']:array();
        if (isset($_SESSION['posts'])){
        foreach ($posts as $index){
        ?>
        <div class="container-item">

            <?php
            if ($_SESSION['username'] == $index['username']){
            ?>
                <a href="<?=URLROOT?>home/update/<?=$index['postid']?>">
                    <i  class="fa fa-pencil-square-o" aria-hidden="true" style="float:
                right;margin: 25px;font-size: 30px;color: #64A764"></i>
                </a>
                <a  href="<?=URLROOT?>home/delete/<?=$index['postid']?>"  onclick="if(!confirm('Are you sure to delete this post ? ')) return false">
                    <i class="fa fa-trash" aria-hidden="true" style="float: right;
                    margin: 25px 0px;font-size: 30px;color: firebrick"></i>
                </a>
            <?php
            }
            ?>
            <i style='font-size: 30px' class='fa fa-user-circle-o'  aria-hidden='true'> <?="  ".$index['username']?></i>

            <p style="font-size: 25px">
                <?= $index['body']?>
            </p>
            <p style="color: black;font-size: 15px"><?= $index['created_at']?></p>
        </div>
        <?php
            }
        }
        ?>
</div>