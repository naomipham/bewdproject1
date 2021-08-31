<?php 
session_start();

// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "../config.php"; 

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
<h2>Edit Assignment</h2>
<p>Select 'edit' on the assignment you wish to change details</p>
</div>
    <?php // This is a loop, which will loop through each result in the array
        foreach($result as $row) { 
    ?>
    <div class="information">
    <p>
        <?php //echo $row; ?>
        Due Date:
        <?php echo $row['duedate']; ?><br>

        Class:
        <?php echo $row['class']; ?><br> 
        
        Assignment Name:
        <?php echo $row['assignmentname']; ?><br> 

        Weighing:
        <?php echo $row['weighing']; ?><br>
        <a href='update-work.php?id=<?php echo $row['id']; ?>'>Edit</a>    
    </p>
    <hr>
    </div>
    <?php }; 

    ?>
<div class="body">
    <form method="post">

        <input type="submit" name="submit" value="View all" class="button">

    </form>   
</div>
<?php include "templates/footer.php"; ?>