<?php
echo "";
$var = isset($_SESSION['username'])?$_SESSION['username']:"" ;
?>
<div style="padding: 25px">
    <?php if (isset($_SESSION['username'])){?>
    <a style='color: white;line-height: 63px;margin: 269px;font-size: 23px;'>
        <i style='font-size: 30px ;margin: -9px 10px 10px; color: white' class='fa fa-user-circle-o'  aria-hidden='true'>
        <?=$var?>
        </i>
    </a>
    <?php
    }
    ?>
</div>
<nav class="top-nav">

    <ul>
        <?php if (!isset($_SESSION['username'])){ ?>
        <li>
            <a href="<?php echo URLROOT; ?>signup/index">Register</a>
        </li>
        <?php } ?>

        <li class="btn-login">
            <?php
            if (isset($_SESSION['username'])){
            ?>
                <a href="<?php echo URLROOT; ?>signin/logout">Sign-out</a>
            <?php
            }else
            {?>
                <a href="<?php echo URLROOT;?>signin/index">Sign-in</a>
           <?php }
            ?>
        </li>
    </ul>
</nav>