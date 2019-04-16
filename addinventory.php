<?php 
include("header.php");
?>

<div id="mdiv3">
			<a href="logout.php">Logout</a>
		</div>
		<div id="mdiv6">
		<a href="admin.php">Admin Home Page</a>
			&nbsp&nbsp&nbsp
		</div>

</div></div>

	<div id="seconddiv">
		<div id="thirddiv"><h3> Add in inventory </h3></div>
			<div id="fourthdiv">
			<br>
			<center>
			<?php
			if(isset($_GET["message"]))
			{
				if($_GET["message"] == "noproduct")
					echo '<h3>product does not exist, first add into products table</h3>';
				else
				{
					echo '<h3>product added successfully</h3>';
				}
			}
			?>
			</center>
				<form action="addinventaction.php" method="post" enctype="multipart/form-data">
				<table id="admintable" cellspacing="10">
					<tr>
						<td>Shoe id: </td>
						<td> <input type="text" name="pid" id="pid" style="height:30px; padding:auto; width:100%;" required></td>
					</tr>
					<tr><td>Shoe Size: </td>
						<td> <select name="size" id="size" style="height:30px; padding:auto; width:100%;" required>
									<option value="">Select Shoe size</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select></td>										
					</tr>
					<tr>
						<td>Quantity: </td>
						<td> <input type="text" name="quantity" id="quantity" style="height:30px; padding:auto; width:100%;" required></td>
					</tr>
					<tr>
						<td> </td>
						<td> <input type="submit" value="Add Product in Inventory" style="height:30px; width:150px;">&nbsp&nbsp&nbsp <input type="reset" value="clear" style="height:30px; width:150px";> </td>
					</tr>
				</table>
				</form>
			</div>
	</div>	
		</body>
	</html>
	