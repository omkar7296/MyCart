<?php 
include("header.php");
include("database.php");
?>

<div id="mdiv3">
			<a href="logout.php">Logout</a>
		</div>
		</div>

</div></div>
<?php
$i=1;
$query="select * from reviews where authorize=0";

$result=mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
while($i<=$rowcount) :
				$row=mysqli_fetch_assoc($result);
				$rid=$row['R_ID'];
				$id1=$row['U_ID'];
				$query1="select * from user where u_id='$id1'";
				$result1=mysqli_query($con,$query1);
				$row1=mysqli_fetch_assoc($result1);
				$name=$row1['U_FIRST_NAME'];
				$id2=$row['P_ID'];
				$query2="select * from Products where P_id='$id2'";
				$result2=mysqli_query($con,$query2);
				$row2=mysqli_fetch_assoc($result2);
				$name1=$row2['P_NAME'];?>
	<div style="text-align:center; height:170px; width:100%; color:red; font-size:18px; ">
	 Name: <?php echo $name; ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row['TIME']; ?><br>
	 Product: <?php echo $name1; ?><br>
	Review: <?php echo $row['REVIEW']; ?><br>
	<div style="margin-left:550px; float:left;"><?php echo '<a  align="center" href="authorizereview_action.php?rid='.$rid.'&n=1"style="display:inline-block; background:yellow; color:black; padding:6px 13px;
						border:1px dotted #ccc; border-radius:5px; font-size:20px;  ">Accept</a>'; ?></div>
						<div style="margin-left:50px; float:left;"><?php echo '<a  align="center" href="authorizereview_action.php?rid='.$rid.'&n=0"style="display:inline-block; background:yellow; color:black; padding:6px 13px;
						border:1px dotted #ccc; border-radius:5px; font-size:20px;  ">Reject</a>'; ?></div></div>
	<?php  $i++; endwhile; ?>
	
	