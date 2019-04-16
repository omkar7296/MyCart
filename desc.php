<?php
include("header.php");
session_start();

if(isset($_SESSION['name'])){
	echo '<div id="hcart" style="float:left; margin-left:40px;">
			<a href="cart.php?uid='.$_SESSION['uid'].'">MyCart</a>
		</div>
		<div id="hcart" style="float:left; margin-left:40px;">
			<a href="bought.php?uid='.$_SESSION['uid'].'">Order History</a>
		</div>
<div id="hlogout" style="float:right; margin-right:50px;">
			<a href="logout.php">Logout</a>
		</div></div></div>';
//echo '</div></div><div style="text-align:center; font-size:25px; color:#660066;"><h2>Welcome '.$_SESSION['name'].'...!!!!!</h2></div>'; 
}
else{
		echo '<div id="hdiv2">
			<a href="login.php">Login</a>
		</div>
<div id="hdiv3">
			<a href="Signin.php">Sign up</a>
		</div></div></div> ';}?>
<?php		
include("database.php");
$id=$_GET['id'];
$query="select P_NAME,P_TYPE_NAME,B_NAME,P_COST,P_DESC from Products,p_type,brand where P_id='$id' AND Products.p_type_id = p_type.p_type_id AND Products.b_id = brand.b_id ";

$query1 = "select size from inventory where p_id = '$id' and quantity > 0";
$result1=mysqli_query($con,$query1);
$rowcount1=mysqli_num_rows($result1);

$result=mysqli_query($con,$query);		
$row=mysqli_fetch_assoc($result);
?>

<br>

				<div align="center" style="height:500px; width:500px; border:1px solid gray; float:left; ">
						<div style="text-align:center;"><img src="<?php echo 'images/'.$id.'.jpg'; ?>" height="100%" width="100%" align="center" ></div><br></div>
						
						<div style="float:left; margin-left:50px; width:500px; text-align:center; font-size:20px; color:#660066;">
							<?php echo 'Model: <font color="blue">'.$row['P_NAME'].'</font><br><br><br>Description: <font color="blue">'.$row['P_DESC'].'</font><br><br><br>
							Product type/ Brand: <font color="blue">'.$row['P_TYPE_NAME'].' '.$row['B_NAME'].'</font><br><br><br>Cost: <font color="blue">'.$row['P_COST'].'</font>';?>  
						<br><br><br><br> 
						Select size:
						 <select style="width:100px;" name="ptype" id="ptype" style="height:30px; padding:auto; width:100%;">
								<?php 	
								$i = 1;
								while($i<=$rowcount1) :
				$row1=mysqli_fetch_assoc($result1);?>
									<option value="<?php echo $row1['size'];?>" ><?php echo $row1['size'];?></option>
														<?php  $i++; endwhile; ?>	</select><br><br>
						
						
						<?php if(isset($_SESSION['name'])){ echo '<a  href="#" style="display:inline-block; background:yellow; color:black; padding:6px 13px;
						border:1px dotted #ccc; border-radius:5px; font-size:20px;" id="addkart">ADD TO CART</a>';} 
							
							if(!isset($_SESSION['name'])){
								echo '<div style="font-size:16px;"> Please login to add product to your cart.</div>';
							}
							
							if(@$_GET['added']==1){
								echo '<div style="font-size:16px;"> Product successfully added.</div>';
							}
							
	?> </div>	


	<script type="text/javascript">
  document.getElementById("addkart").onclick = function() {
	var size = document.getElementById("ptype").value;
    document.getElementById("addkart").href="<?php echo 'addtocart.php?id='.$id?>&size="+size; 

  };
</script>
	
<div style=" float:left; width:100%; ">
	<h2 style="text-align:center; color:#000066;">REVIEWS</h2><br>
<?php 
$i=1;
$query="select * from reviews where authorize=1 and p_id='$id'";

$result=mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
if($rowcount==0){
	echo '<div style="text-align:center; width:100%; color:red; font-size:18px; ">No reviews present</div>';
}
while($i<=$rowcount) :
				$row=mysqli_fetch_assoc($result);
				$id1=$row['U_ID'];
				$query1="select * from user where u_id='$id1'";
				$result1=mysqli_query($con,$query1);
				$row1=mysqli_fetch_assoc($result1);
				$name=$row1['U_FIRST_NAME'];
				$rating = $row['RATINGS']?>
	<div style="text-align:center; width:100%; color:red; font-size:18px; ">
	 Name: <?php echo $name; ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row['TIME']; ?><br>
	Review: <font color="#000066"><?php echo $row['REVIEW']; ?></font><br>
	Rating: <?php echo $rating; ?></div><br><br>
	<?php  $i++; endwhile; ?>
	<?php
	if(!isset($_SESSION['name'])){
								echo '<div style="font-size:16px; color:#660066; text-align:center;"> Please login or sign up to add your review.</div>';
							}?>
							<?php if(isset($_SESSION['name'])){ echo '<div style="margin-left:580px;"><a  align="center" href="addreview.php?id='.$id.'"style="display:inline-block; background:yellow; color:black; padding:6px 13px;
						border:1px dotted #ccc; border-radius:5px; font-size:20px;  ">ADD REVIEW</a></div>';} 
?>
							</div>	
							