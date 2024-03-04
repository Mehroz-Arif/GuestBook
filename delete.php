<?php
session_start();
include('connection.php');
$id=$_GET['id'];
$sql="DELETE FROM comments WHERE comment_id=$id";
$result=$conn->query($sql);
if($result){
    header('location:showComments.php');
}

?>