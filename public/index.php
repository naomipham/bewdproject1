<?php 

session_start();




include "templates/header.php";
?>
<div class="createbody">
<h1> Welcome to Assignment Tracker!</h1>
            <div class="button">
                <a class="button" href="login.php">Sign In</a>
            </div>
            <div class="button">
                <a class="button" href="register.php">Register</a>
            </div>
</div>
<?php
include "templates/footer.php"; 
?>