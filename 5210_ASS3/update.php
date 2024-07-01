<?php
$id = "ID";
$subject = "Subject";
$image = "Image";
$whereabouts = "Whereabouts";

// Create New Scp File
$conn = new CreateScp($id, $subject, $image, $whereabouts);
// Check if file can be updated
if ($conn->connect_error) {
  die("Update unavairble: ". $conn->connect_error);
}

$sql = "UPDATE SCP SET subject='Doe' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "File updated successfully";
} else {
  echo "Error updating File: ". $conn->error;
}

$conn->close();
?>