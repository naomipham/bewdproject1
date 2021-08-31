<?php 

session_start();




include "templates/header.php";
?>

<div class="createbody">
<h1> Welcome!</h1>
<p> Start by adding new assignments</p>
<a href='create.php?id=<?php echo $row['id']; ?>'>Add New Assignment here</a> 
<p> </p>
<p> OR </p>
<a href='read.php?id=<?php echo $row['id']; ?>'>View Existing Assignments here</a> 
</div>
<?php
include "templates/footer.php"; 
?>