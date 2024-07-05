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
        
<form method="get" action="valid.php">

<div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" class="form-control"  name="title">
  </div>

<div class="mb-3">
    <label  class="form-label">Descriptions</label>
    <textarea type="text" class="form-control" rows="5" name="desc" ></textarea>
  </div>

  <input type="submit" class='btn btn-primary' name="submit" value="Add to Tasks"> 

</form>
    </div>
</body>
</html>