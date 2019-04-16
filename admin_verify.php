<?php
session_start();

include("database.php");
 	
$email=$_POST['email'];
$password=$_POST['password'];

$sql="Select * from user where U_EMAIL='$email' AND U_PASSWORD = '$password'";
$result = $con->query($sql);
if($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$uid = $row["U_ID"];
	$sql="Select * from Admin where U_ID='$uid'";
	$result = $con->query($sql);
	if($result->num_rows > 0)
	{
		$_SESSION['name']=$row["U_FIRST_NAME"];
		header("location: admin.php?message=loginsuccess");
	}
	else
	{
		header("location: admin_login.php?message=loginfailed");
	}
}
else
{
	header("location: admin_login.php?message=loginfailed");
}
mysqli_close($con);
?>
