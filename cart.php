<?php
include("header.php");
session_start();
?>
<div id="hcart" style="float:left; margin-left:40px;">
			<a href="bought.php?uid='.$_SESSION['uid'].'">Order History</a>
		</div>
<div id="hlogout" style="float:right; margin-right:50px;">
			<a href="logout.php">Logout</a>
		</div></div></div> 
		
<?php		
include("database.php");
@$id=$_SESSION['uid'];
$query="select * from cart where u_id='$id' ";
$i=1;
$cost=0;
$result=mysqli_query($con,$query);		
$rowcount=mysqli_num_rows($result);
//$row1=mysqli_fetch_assoc($result);
?>	
<?php if($rowcount>0){
while($i<=$rowcount) :
				$row1=mysqli_fetch_assoc($result);
				$pid=$row1['P_ID'];
				 $query1="select * from products,p_type where P_id='$pid' AND products.p_type_id = p_type.p_type_id";
				 $result1=mysqli_query($con,$query1);		
				 $row=mysqli_fetch_assoc($result1);
				 $cost=$cost+($row['P_COST']*$row1['QUANTITY']); ?>
				<div style="height:550px;">
				<div align="center" style="height:500px; width:500px; border:2px solid gray; float:left; border-radius: 8px; margin-left: 25px;">
						<div style="text-align:center;"><img src="<?php echo 'images/'.$row['P_ID'].'.jpg'; ?>" height="100%" width="100%" align="center" style="border-radius: 8px;"></div></div>
						
						<div style="float:left; margin-left:100px; text-align: center; height:300px; width:600px; font-size:16px; color:white;">
							<?php echo '<div style="width: 300px; margin: auto; background-color: gray; border-radius: 8px; padding: 1px;">Model</div> <font color="#660066">'.$row['P_NAME'].'</font><br><br><div style="width: 300px; margin: auto;  background-color: gray; border-radius: 8px; padding: 1px;">Description</div><font color="#660066">'.$row['P_DESC'].'</font><br><br>
							<div style="width: 300px; margin: auto;  background-color: gray; border-radius: 8px; padding: 1px;">Product type</div> <font color="#660066">'.$row['P_TYPE_NAME'].'</font><br><br><div style="width: 300px; margin: auto;  background-color: gray; border-radius: 8px; padding: 1px;">Cost</div> <font color="#660066">'.$row['P_COST']*$row1['QUANTITY'].'$</font>
								<br><br><div style="width: 300px; margin: auto;  background-color: gray; border-radius: 8px; padding: 1px;">Size</div> <font color="#660066">'.$row1['SIZE'].'</font>
								<br><br><div style="width: 300px; margin: auto;  background-color: gray; border-radius: 8px; padding: 1px;">Quantity</div> <font color="#660066">'.$row1['QUANTITY'].'</font>';?>
							<br><br><br>
						<div style="width:500px; height:100px;"><font color="#660066" style="font-size:20px">
							<a href="remove.php?id=<?php echo $pid.'&size='.$row1['SIZE']; ?>" class="start" style="background:yellow;" id="removekart">Remove from cart</a> </div> </div></div>
				<?php  $i++; endwhile; ?>
						<div>
						<div style="width:500px; height:100px; margin: auto; text-align: center;"><div style="background-color: black; border-radius: 7px; border: 5px solid white;"><font color="white" style="font-size:20px">
						Total Cost: <?php echo '<font color="red" style="font-size:25px">'.$cost.'</font>'; ?></font><font color="white" style="font-size:25px">$</font></div><br><br>
						<a href="pay.php?cost=<?php echo $cost; ?>" class="start">Proceed to pay</a></div></div><br><br>
</div><?php }
			else{
				echo '<div style="text-align:center; font-size:30px; color:#660066;">
					<strong>Sorry, your cart is empty.... :-(</strong><br><br><br>
				</div>';
			}
			?>
			

			<?php include("footer.php"); ?>			