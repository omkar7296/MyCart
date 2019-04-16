<?php

include("database.php");
$rid=$_GET['rid'];
if($_GET['n']==1){
	$query="select * from reviews where r_id='$rid'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$time=$row['TIME'];
	$query="update reviews set authorize=1,time='$time' where r_id='$rid'";
	mysqli_query($con,$query);
	header("location: authorizereview.php");
}
else{
	$query="delete from reviews where r_id='$rid'";
	mysqli_query($con,$query);
	header("location: authorizereview.php");
}
?>