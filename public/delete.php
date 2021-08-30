<?php 
session_start();

 // include the config file 
 require "../config.php";
 require "../common.php";

 // This code will only run if the delete button is clicked
 if (isset($_GET["id"])) {
     // this is called a try/catch statement 
     try {
         // define database connection
         $connection = new PDO($dsn, $username, $password, $options);
         
        // set id variable
         $id = $_GET["id"];
         
         // Create the SQL 
         $sql = "DELETE FROM works WHERE userid= :uid AND id= :id"; 
        
         // Prepare the SQL
         $statement = $connection->prepare($sql);
         $statement->bindValue(':uid',$_SESSION['id']);
         $statement->bindValue(':id',$id);
         $statement->execute();

         // Success message
         $success = "Work successfully deleted";

     } catch(PDOException $error) {
         // if there is an error, tell us what it is
         echo $sql . "<br>" . $error->getMessage();
     }
 };

 // This code runs on page load
 try {
     $connection = new PDO($dsn, $username, $password, $options);
     
     // SECOND: Create the SQL 
     $sql = "SELECT * FROM works WHERE userid= :uid"; 
     
     // THIRD: Prepare the SQL
     $statement = $connection->prepare($sql);
     $statement->bindValue(':uid',$_SESSION['id']);
     $statement->execute();
     
     // FOURTH: Put it into a $result object that we can access in the page
     $result = $statement->fetchAll();
 } catch(PDOException $error) {
     echo $sql . "<br>" . $error->getMessage();
 }
?>


<?php include "templates/header.php"; ?>


<?php  
    // if (isset($_POST['submit'])) {
    //     //if there are some results
    //     if ($result && $statement->rowCount() > 0) { ?>

<div class="body">
<h2>Results</h2>

<?php // This is a loop, which will loop through each result in the array
    foreach($result as $row) { 
?>

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
    <a onClick="return confirm('Do you really want to delete this item?');" 
    href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
</p>

<?php // this willoutput all the data from the array
            //echo '<pre>'; var_dump($row); 
?>

<hr>
<?php }; //close the foreach
    //     }; 
    // }; 
?>

<form method="post" onsubmit="return confirm('Are you sure?')">
    <input type="submit" name="submit" value="View all">
</form>
</div>
<?php include "templates/footer.php"; ?>