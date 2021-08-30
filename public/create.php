<?php 
session_start();

// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {


echo "<h1>Session ID:" . $_SESSION['id'] . "</h1>";
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        $userid = $_SESSION['id'];
        $class = $_POST['class'];
        $assignmentname = $_POST['assignmentname'];
        $duedate = $_POST['duedate'];
        $weighing = $_POST['weighing'];

        // SECOND: Get the contents of the form and store it in an array
        $new_work = array( 
            "userid" => $userid,
            "class" => $class,
            "assignmentname" => $assignmentname,
            "duedate" => $duedate,
            "weighing" => $weighing, 
        );
        
        // THIRD: Turn the array into a SQL statement
        $sql = "INSERT INTO works (userid, class, assignmentname, duedate, weighing) 
                VALUES (:userid, :class, :assignmentname, :duedate, :weighing)";        
        
        // FOURTH: Now write the SQL to the database
        $statement = $connection->prepare($sql);
        $statement->execute($new_work);

	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>


<?php include "templates/header.php"; ?>


<div class="body">
<h2>Add a Assignment</h2>

    <div class="information">
    <?php if (isset($_POST['submit']) && $statement) { ?>
    <p>Work successfully added.</p>
    <?php } ?>

    <!--form to collect data for each artwork-->

    <form method="post">
        <label for="class">Class</label>
        <input type="text" name="class" id="class">

        <label for="assignmentname">Assignment Name</label>
        <input type="text" name="assignmentname" id="assignmentname">

        <label for="duedate">Due Date</label>
        <input type="date" value="<?php echo date ('Y-m-d');?>" name="duedate" id="duedate">

        <label for="weighing">Weighing</label>
        <input type="text" name="weighing" id="weighing">
        <input type="submit" name="submit" value="Submit" class="button">

    </form>
    </div>
</div>

<?php include "templates/footer.php"; ?>