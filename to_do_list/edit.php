<?php 
include("functions.php");

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = clean($_POST["id"]);
    $title = clean($_POST["title"]);
    $desc = clean($_POST["desc"]);

    $sql = "UPDATE tasks SET Title = ?, Description = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $title, $desc, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record updated successfully";
        header("Location: tasks.php?id=$id&title=" . urlencode($title) . "&desc=" . urlencode($desc) . "&updated=true");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

if (isset($_GET["id"])) {
    $id = clean($_GET["id"]);
    $title = clean($_GET["title"]);
    $desc = clean($_GET["desc"]);
} else {
    $id = '';
    $title = '';
    $desc = '';
}
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
    <link rel="stylesheet" href="main.css">
    <title>DoneDeal</title>
</head>
<body>
    <h1>DoneDeal</h1>
    <div class="main">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descriptions</label>
                <textarea class="form-control" rows="5" name="desc"><?php echo htmlspecialchars($desc); ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <input type="submit" class='btn btn-primary' name="submit" value="Edit Now">
        </form>
    </div>
</body>
</html>