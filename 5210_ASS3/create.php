<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scp CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Add New SCP FILE.</h1>
    <button type="button">ADD NEW</button>
    <button type="button">Update SCP</button>
    <button type="button">Return</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
$id = "ID";
$subject = "Subject";
$image = "Image";
$whereabouts = "Whereabouts";

// Create New Scp File
$conn = new CreateScp($id, $subject, $image, $whereabouts);
// Check if file can be updated
if ($conn->connect_error) {
  die("Updated unavairible: ". $conn->connect_error);
}

$sql = "UPDATE SCP SET subject='Doe' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "File updated successfully";
} else {
  echo "Error updating File: ". $conn->error;
}

$conn->close();
?>
  </body>
</html>