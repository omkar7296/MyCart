<?php
include("database.php");

$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$mno=$_POST['mno'];
$radio1=$_POST['radio1'];

$query="INSERT INTO user(u_email, u_password, u_first_name, u_last_name, u_dob, u_mobile_number, u_gender) 
VALUES('$email', '$password', '$fname', '$lname', '$dob','$mno','$radio1')";
//echo $query;
mysqli_query($con,$query);

header("location: login.php?r=1");

?>

