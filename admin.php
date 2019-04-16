<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
		<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
		<div id="Header">
			<br>
			<p><center><img src="logo/logo_1.png"/></center></p>
	<div id="firstdiv">
		<div style="margin-left:600px;">
			<a href="Home.php?parameter=1">Home</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="logout.php">Logout</a>
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
				<center> <a role="button "class="btn btn-default" href="addproduct.php">Add Products</a>
				 <a role="button "class="btn btn-default" href="addinventory.php">Add Products in Inventory</a>
				<a role="button "class="btn btn-default" href="authorizereview.php">Authorize Review</a>
				<a role="button "class="btn btn-default" href="getstats.php">Aggregate Statistics</a></center>
			</div>
	</div>	
</body>