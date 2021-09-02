<?php 

session_start();





?>
<div class="header">
<head>

    <title>Assignment Tracker</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/spectre.css">
    <link rel="stylesheet" href="assets/css/spectre-exp.css">
    <link rel="stylesheet" href="assets/css/spectre-icons.css">

</head>

<body>
    <header>
        <h1><a href="homepage.php">Assignment Tracker</a></h1>
    </header>
</div>
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

