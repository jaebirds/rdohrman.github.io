<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
 
// Create connection
$conn = new mysqli($curatelogin, $root, $, $users);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
$sql = "INSERT INTO users (username, password, FName, LName, email)
VALUES ('whatup', 'test', 'John', 'Doe', 'john@example.com')";
 
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
?>
