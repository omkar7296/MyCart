<?php
include("header.php");
session_start();
?>
<?php 
if(isset($_SESSION['name'])){
	echo '<div id="hcart" style="float:left; margin-left:40px;">
			<a href="cart.php?uid='.$_SESSION['uid'].'">MyCart</a>
		</div>
		<div id="hcart" style="float:left; margin-left:40px;">
			<a href="bought.php?uid='.$_SESSION['uid'].'">Order History</a>
		</div>
<div id="hlogout" style="float:right; margin-right:50px;">
			<a href="logout.php">Logout</a>
		</div>';
		echo '</div></div><div style="text-align:center; font-size:25px; color:#660066;"><h2>Welcome '.$_SESSION['name'].'...!!!!!</h2></div>'; 
}
else{
echo '<div id="hdiv2">
			<a href="login.php">Login</a>
		</div>
<div id="hdiv3">
			<a href="Signin.php">Sign up</a>
		</div>';
}		?>
</div></div>
<?php 
include("database.php");

$i=1;
$parameter=1;
@$parameter=$_GET['parameter'];
$fe=1;
$query="select * from products";
$result=mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
for($k=1;$k<$parameter;$k++)
	$fe=$fe+8;
	$be=$fe+8; 
	$query1="select * from Products where P_id>='$fe' and P_id<'$be'";

$result1=mysqli_query($con,$query1);
$rowcount1=mysqli_num_rows($result1);


?>

<?php 
		while($i<=$rowcount1) :
				$row=mysqli_fetch_assoc($result1);?>
				
						<div align="center" class="innerdivs" style="height:350px; width:320px; border:1px solid gray; float:left; ">
						<div id="container" style="text-align:center;"><img src="<?php echo 'images/'.$row['P_ID'].'.jpg'; ?>" height="300px" width="100%" align="center" ></div><br><div id="pseudo">
							<?php echo	'<u><a class="links" href="desc.php?id='.$row['P_ID'].'">'.' '.$row['P_NAME'].'</a></u></div></div>'; ?>
	
	<?php  $i++; endwhile; ?>
	
<div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>	
	
	<?php
			if($rowcount%8==0)
			{
				$a=$rowcount/8;
				echo "<div id='pagemenu' style='text-align:center;'>";
					if($parameter!=1){
						$prev=$parameter-1;
						echo "<a style='color:#660066;' href='Home.php?parameter=".$prev."'><strong>Prev</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					}
				for($j=1;$j<=$a;$j++){
					if($j==$parameter)
						echo  "<a style='color:red; font-size:25px;' href='Home.php?parameter=".$j."'><strong>".$j."</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					else
						echo  "<a style='color:#660066;' href='Home.php?parameter=".$j."'><strong>".$j."</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				}
				if($parameter!=$a){
					$next=$parameter+1;
					echo "<a style='color:#660066;' href='Home.php?parameter=".$next."'><strong>Next</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				}
				
			}
			else{
				$a=$rowcount/8;
				$a=floor($a);
				echo "<div id='pagemenu' style='text-align:center;'>";
					if($parameter!=1){
						$prev=$parameter-1;
						echo "<a style='color:#660066;' href='Home.php?parameter=".$prev."'><strong>Prev</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					}
				for($j=1;$j<=$a+1;$j++){
					if($j==$parameter)
						echo  "<a style='color:red; font-size:25px;' href='Home.php?parameter=".$j."'><strong>".$j."</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					else
						echo  "<a style='color:#660066;' href='Home.php?parameter=".$j."'><strong>".$j."</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				}
				
				if($parameter!=$a+1){
					$next=$parameter+1;
					echo "<a style='color:#660066;' href='Home.php?parameter=".$next."'><strong>Next</strong></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				}
				
			}
		

?>


<?php
include("footer.php");
?>

</body>
</html>
	