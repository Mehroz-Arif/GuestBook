<?php
include('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO signup (Name, Email, Password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
   header(location:'index.php')
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
