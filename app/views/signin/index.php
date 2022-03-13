<?php
if (isset($_SESSION['username'])){
    header("Location:http://blogg/home/index");
}
require APP_PATH . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
    require APP_PATH . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
    <?php
    
    if(!empty($_SESSION['alert'])){
    ?>
        <div class="alert alert-danger" role="alert">
            <?=$_SESSION['alert']?>

            <?php
            unset($_SESSION['alert']);
            ?>
        </div>
    <?php
    }
    ?>
        <h2>Sign in</h2>

        <form action="<?=URLROOT?>signin/index" method ="POST">
            <input type="text" placeholder="Username *" name="username">
            
            <input type="password" placeholder="Password *" name="password">
        
            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?=URLROOT?>signup/index">Create an account!</a></p>
        </form>
    </div>
</div>