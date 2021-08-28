<?php 

    // include the config file that we created last week
    require "../config.php";
    require "../common.php";


    // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            //grab elements from form and set as varaible
            $work =[
              "id"         => $_POST['id'],
              "class" => $_POST['class'],
              "assignmentname"  => $_POST['assignmentname'],
              "duedate"   => $_POST['duedate'],
              "weighing"   => $_POST['weighing'],
              "date"   => $_POST['date'],
            ];
            
            // create SQL statement
            $sql = "UPDATE `works` 
                    SET id = :id, 
                        class = :class, 
                        assignmentname = :assignmentname, 
                        duedate = :duedate, 
                        weighing = :weighing, 
                        date = :date 
                    WHERE id = :id";

            //prepare sql statement
            $statement = $connection->prepare($sql);
            
            //execute sql statement
            $statement->execute($work);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    // GET data from DB
    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM works WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    };


?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<p>Work successfully updated.</p>
<?php endif; ?>

<h2>Edit a work</h2>

<form method="post">
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
    
    <label for="class">Class</label>
    <input type="text" name="class" id="class" value="<?php echo escape($work['class']); ?>">

    <label for="assignmentname">Assignment Name</label>
    <input type="text" name="assignmentname" id="assignmentname" value="<?php echo escape($work['assignmentname']); ?>">

    <label for="duedate">Due Date</label>
    <input type="date" name="duedate" id="duedate" value="<?php echo escape($work['duedate']); ?>">

    <label for="weighing">Weighing</label>
    <input type="text" name="weighing" id="weighing" value="<?php echo escape($work['weighing']); ?>">
    
    <label for="date">Date</label>
    <input type="text" name="date" id="date" value="<?php echo escape($work['date']); ?>">

    <input type="submit" name="submit" value="Save">

</form>





<?php include "templates/footer.php"; ?>