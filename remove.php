<?php
session_start();
include("database.php");

$pid=$_GET['id'];
$size=$_GET['size'];
$uid=$_SESSION['uid'];
$query="delete from cart where p_id='$pid'  and u_id='$uid' and size='$size'";
$result=mysqli_query($con,$query);

header("location: cart.php");
?>

