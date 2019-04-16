<head>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<div id="Header">
			<br>
			<p><h1>MyCart.com</h1></p>
	<div id="firstdiv">
		<div style="margin-left:600px;">
			<a href="Home.php?parameter=1">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		</div> 
		</div>
		</div>
		<div id="seconddiv" >
			<div style="text-align:center; font-size:30px; color:#660066;">			
				<strong>Admin Homepage</strong>
			</div>	
			<div id="fourthdiv">
			<center>
			<?php
			if(isset($_GET["message"]))
			{
				if($_GET["message"] == "loginsuccess")
					echo '<h3>You logged in successfully</h3>';
				else
				{
					echo '<h3>Login failed</h3>';
				}
			}
			?>
			</center>
				<center><button id="addproduct"> <a style="color:black" href="addproduct.php">Add Products</a></button>
				<button id="addinventory"> <a style="color:black" href="addinventory.php">Add Products in Inventory</a></button>
				<button id="authorizereview"> <a style="color:black" href="authorizereview.php">Authorize Review</a></button></center>
			</div>
	</div>	
</body>