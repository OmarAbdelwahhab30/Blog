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
        <form action="<?=URLROOT?>home/update/<?=$data2?>" method="post" enctype="application/x-www-form-urlencoded">
            <textarea placeholder="" name="postarea" style="
        resize: none;margin: 20px 815.35px 20px 0px;width: 1201px;height: 72px;" required><?= isset($data) ? $data :""?></textarea>
            <input class="btn green" type="submit" name="submit" value="Update Post" style="
            cursor: pointer;border-radius: 10px;width: 175px;height: 41px;">
        </form>
    </div>
</div>