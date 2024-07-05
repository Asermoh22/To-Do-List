<?php 
session_start();
if(isset($_GET["id"])){

    $id=$_GET["id"];



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "to_do_list";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
   
    
        // Prepare SQL statement to delete a record
        $sql = "DELETE FROM tasks WHERE ID = $id";
    
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
            // Optionally, redirect or refresh the page after deletion
             header("Location: tasks.php");
            // exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
     }




?>