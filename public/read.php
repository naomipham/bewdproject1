<?php 
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "../config-remote.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM works WHERE userid= :uid ORDER BY duedate"; 
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->bindValue(':uid',$_SESSION['id']);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>


<?php include "templates/header.php"; ?>

<div class="body">
<h2>Existing Assignments</h2>
<p>Monitor your assignment due dates</p>
</div>
    <?php  
        if (isset($_POST['submit'])) {
            //if there are some results
            if ($result && $statement->rowCount() > 0) { 
            ?> 
            
    <?php // This is a loop, which will loop through each result in the array
        foreach($result as $row) { 
    ?>


        <?php //echo $row; ?>
    <div class="information">
    <p>
        Due Date:
        <?php echo $row['duedate']; ?><br>
       
        Class:
        <?php echo $row['class']; ?><br> 

        Assignment Name:
        <?php echo $row['assignmentname']; ?><br> 
    
        Weighting:
        <?php echo $row['weighing']; ?><br> 
    </p>
    <hr>
    </div>

    <?php }; //close the foreach
            }; 
        }; 
    ?>
<div class="body">
        <form method="post">

            <input type="submit" name="submit" value="View all" class="button">
        
        </form>

</div>

<?php include "templates/footer.php"; ?>
