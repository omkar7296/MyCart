<?php
include("header.php");
include("database.php");
session_start();
if(!$_POST){
$_SESSION['pid']=$_GET['id'];}

	echo '<div id="hcart" style="float:left; margin-left:40px;">
			<a href="cart.php?uid='.$_SESSION['uid'].'">MyCart</a>
		</div>
		<div id="hcart" style="float:left; margin-left:40px;">
			<a href="bought.php?uid='.$_SESSION['uid'].'">Order History</a>
		</div>
<div id="hlogout" style="float:right; margin-right:50px;">
			<a href="logout.php">Logout</a>
		</div></div></div>';
		
		
if($_POST){
	$i=1;
	$count1 = 0;
	$query="select * from reviews";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	while($i<=$count){
			$row=mysqli_fetch_assoc($result);
			if($i==$count){
				$count1=$row['R_ID'];
			}
			$i++;
	}
	$count1++;
	$pid=$_SESSION['pid'];
	$review=$_POST['review'];
	$rating = $_POST['rating'];
	$uid=$_SESSION['uid'];
	$authorize=0;
	$query="INSERT INTO reviews(r_id,u_id,p_id,review,authorize,ratings) VALUES('$count1','$uid','$pid','$review','$authorize','$rating')";
	mysqli_query($con,$query);
	
	}
		?>


<div id="seconddiv">
			<div style="text-align:center; font-size:30px; color:#660066;">
				<strong>Enter your review..</strong>
			</div>
			<div id="fourthdiv">
				<br><br>
				<form method="post" action="addreview.php">
				<table id="logintable" cellspacing="10">
					<tr>
						<td>Review: </td>
						<td> <input type="text" name="review" id="review" style="height:30px; padding:auto; width:100%;"></td>
					</tr>
					<tr>
					<td>Rating: </td>
					<td><input type="range" min="1" max="10" value="5" class="slider" id="rating" name="rating" style="height:30px; padding:auto; width:100%;"></td>
					</tr>
					<tr>
					<tr>
					<td> </td>
					<td> <input type="submit" value="Submit" style="height:30px; width:150px;" > &nbsp&nbsp&nbsp <input type="reset" value="clear" 
					style="height:30px; width:150px;"></td>
					</tr>
				</table>
				</form>
			</div>
	</div>	
	
	<?php 
	if($_POST){
		echo '<div style="text-align:center; font-size:16px; color:blue;"> Review sent for authorization</div>';
	}
		