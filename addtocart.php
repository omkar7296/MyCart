<?php

include("database.php");
 session_start();
 $uid=$_SESSION['uid'];
 $Pid=$_GET['id'];
  $size=$_GET['size'];
 
 $query1 = "select quantity from cart where p_id = '$Pid' and u_id = '$uid' and size = '$size'";
$result1=mysqli_query($con,$query1);
$rowcount1=mysqli_num_rows($result1);

if($rowcount1==0)
{
	$query="insert into cart values('$uid','$Pid','$size',1) ";

mysqli_query($con,$query);	
}
else
{
	
	$query="update cart set quantity= quantity+1 where p_id = '$Pid' and u_id = '$uid' and size = '$size'";

	mysqli_query($con,$query);
	
	}
 
 
 echo $_SESSION['uid'];

header("location: desc.php?added=1&id=".$Pid);	
?>