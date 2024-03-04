<?php
$Host="localhost";
$Database_Name="GuestBook";
$Database_User="root";
$Database_Password="";
 
$conn=new mysqli($Host,$Database_User,$Database_Password,$Database_Name);

if($conn->connect_error){
    die("Connection Failed:". $conn->connect_error);
}

?>