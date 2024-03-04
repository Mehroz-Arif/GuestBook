<?php

include('connection.php');
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM signup WHERE Email='$email' AND Password='$password'";
echo "Query: $sql";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();


if (mysqli_num_rows($result) == 1) {
    $_SESSION['email']=$row['Email'];
    $_SESSION['id']=$row['id'];
$_SESSION['mail']=$email;
    header('location:commentPage.php');
} 
else{
    header('location:index.php');
}


?>
