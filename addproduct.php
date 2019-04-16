<?php 
include("header.php");
?>

<div id="mdiv3">
			<a href="logout.php">Logout</a>
</div>
		<div id="mdiv6">
		<a href="admin.php">Admin Home Page</a>
		</div>

</div></div>

	<div id="seconddiv">
		<div id="thirddiv"><h3> Admin Panel </h3></div>
			<div id="fourthdiv">
			<br>
			<center>
			<?php
			if(isset($_GET["message"]))
			{
				if($_GET["message"] == "productaddfailed")
					echo '<h3>product addition failed, try again</h3>';
				else
				{
					echo '<h3>product added successfully</h3>';
				}
			}
			?>
			</center>
				<form action="addproduct_action.php" method="post" enctype="multipart/form-data">
				<table id="admintable" cellspacing="10">
					<tr>
						<td>Shoe name: </td>
						<td> <input type="text" name="pname" id="pname" style="height:30px; padding:auto; width:100%;" required></td>
					</tr>
					<tr>
						<td>Shoe type: </td>
						<td> <select name="ptype" id="ptype" style="height:30px; padding:auto; width:100%;" required>
									<option value="">Select Shoe type</option>
									<option value="1">Casual</option>
									<option value="2">Formal</option>
									<option value="3">Running</option>
						</select></td>										
					</tr>
					<tr><td>Shoe Brand: </td>
						<td> <select name="btype" id="btype" style="height:30px; padding:auto; width:100%;" required>
									<option value="">Select Shoe brand</option>
									<option value="1">Puma</option>
									<option value="2">Adidas</option>
									<option value="3">Reebok</option>
									<option value="4">Nike</option>
								</select></td>										
					</tr>
					<tr><td>Shoe Gender: </td>
						<td> <select name="gender" id="gender" style="height:30px; padding:auto; width:100%;" required>
									<option value="">Select Shoe Gender</option>
									<option value="1">Men</option>
									<option value="2">Women</option>
									<option value="3">Unisex</option>
								</select></td>										
					</tr>
					<tr>
						<td>Upload image: </td>
						<td> <input type="file" name="image" id="image" style="height:30px; padding:auto; width:100%;" required></td>
					</tr>
					<tr>
						<td>Shoe Desc: </td>
						<td> <input type="text" name="desc" id="desc" style="height:30px; padding:auto; width:100%;" required></td>
					</tr>
					<tr>
						<td>Cost: </td>
						<td> <input type="text" name="cost" id="cost" style="height:30px; padding:auto; width:100%;" required></td>
					</tr>
					<tr>
					<td> </td>
					<td> <input type="submit" value="Add Product" style="height:30px; width:150px;">&nbsp&nbsp&nbsp <input type="reset" value="clear"
					style="height:30px; width:150px";></td>
					</tr>
				</table>
				</form>
			</div>
	</div>	
	
<?php 
if(@$_GET['n']){
	echo "<h3 align='center'> Product added successfully. </h3>";
}
include("footer.php");
?>
	
	</body>
	</html>
	