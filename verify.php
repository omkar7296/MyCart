<?php
include("database.php");
	
$email=$_POST['email'];
$password=$_POST['password'];



$query="Select * from user where u_email='$email'";

$result=mysqli_query($con,$query);

if(@mysqli_num_rows($result)==0)
{
	header("location: login.php?n=1");
}
else
{
	$row=mysqli_fetch_assoc($result);
	$name=$row['U_FIRST_NAME'];
	$uid=$row['U_ID'];
	$password1=$row['U_PASSWORD'];
	
	if($password1!=$password){
		header("location: login.php?m=1");
	}
	else{
	session_start();
	$_SESSION['name']=$name;
	$_SESSION['uid']=$uid;
	header("location: home.php?parameter=1");
	}
	
	
}
mysqli_close($con);
?>
