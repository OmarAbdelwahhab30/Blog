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
    
    <h2>Register</h2>

        <form
                id="register-form"
                method="POST"
                action="<?=URLROOT?>signup/index"
        >
            <input type="text" placeholder="Username *" name="username" required>
            
            <input type="email" placeholder="Email *" name="email" pattern="^[^ ]+@[^ ]+\.[a-z]{2,6}$" required>
            
            <input type="password" placeholder="Password *" name="password" required>
            
            <input type="password" placeholder="Confirm Password *" name="confirmPassword" required>
            
            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Do you already have an account ? <a href="<?=URLROOT?>signin/index">Click here to sign in!</a></p>
        </form>
    </div>
</div>