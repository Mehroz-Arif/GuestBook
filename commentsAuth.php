<?php

include('connection.php');
session_start();
if(isset($_POST['submit'])){


$email= $_SESSION['email'];
echo $email;
$comments=$_POST['comment'];
$sql= "insert into comments (email,comments) values ('$email','$comments')";


if ($conn->query($sql) === TRUE) {
   header('location:showComments.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>