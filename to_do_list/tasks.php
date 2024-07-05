<?php 


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

$sql = "SELECT id, Title, Description FROM tasks";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tasks.css">
    <title>Tasks</title>
</head>
<body>

<div class="container mt-5">
    <?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card mb-3">';
            echo '  <div class="card-header">';
            echo '    Task';
            echo '  </div>';
            echo '  <div class="card-body">';
            echo '    <h3 class="card-title">' . $row["Title"] . '</h3>';
            echo '    <p class="card-text">' . $row["Description"] . '</p>';
            echo '    <form method="get">';
            echo '        <input type="hidden" name="title" value="' . $row["Title"] . '">';
            echo '        <input type="hidden" name="desc" value="' . $row["Description"] . '">';
            echo '        <a href="delete.php?id=' . $row["id"] . '&title=' . urlencode($row["Title"]) . '&desc=' . urlencode($row["Description"]) . '" class="btn btn-danger">Delete</a>';
            echo '        <a href="edit.php?id=' . $row["id"] . '&title=' . urlencode($row["Title"]) . '&desc=' . urlencode($row["Description"]) . '" class="btn btn-danger">Edit</a>';
            echo '    </form>';

            echo '  </div>';
            echo '</div>';
        }
    } else {
        echo '<p>No tasks found.</p>';
    }

    mysqli_close($conn);
    ?>
</div>

</body>
</html>
