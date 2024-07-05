<?php 
session_start();
include('functions.php');
if(isset($_GET["submit"])){

$title=clean($_GET["title"]);
$desc=clean($_GET["desc"]);




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

$sql = "INSERT INTO tasks (Title, Description)
VALUES ('$title', '$desc')";

if (mysqli_query($conn, $sql)) {
 header("location:tasks.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);




}

?>