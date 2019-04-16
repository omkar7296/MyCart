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
			<a href="admin.php">Admin Home Page</a>
		</div> 
		</div>
		</div>
		
		<div id="seconddiv" >
			<div style="text-align:center; font-size:30px; color:#660066;">			
			<strong>Sign in as admin to add products</strong>
		</div>	
			<div id="fourthdiv">
				<br><br>
				<center>
			<?php
			if(isset($_GET["message"]))
			{
				if($_GET["message"] == "loginfailed")
					echo '<h3>Login Failed</h3>';
				else
				{
					//echo '<h3>Login failed</h3>';
				}
			}
			?>
			</center>
				<form method="post" action="admin_verify.php">
				<table id="logintable" cellspacing="10">
					<tr>
						<td>Email: </td>
						<td> <input type="email" name="email" id="email" style="height:30px; padding:auto; width:100%;"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td> <input type="password" name="password" id="password" style="height:30px; padding:auto; width:100%;"></td>
					</tr>
					<tr>
					<td> </td>
					<td> <input type="submit" value="Login" style="height:30px; width:150px;" > &nbsp&nbsp&nbsp <input type="reset" value="clear" 
					style="height:30px; width:150px;"></td>
					</tr>
				</table>
				</form>
			</div>
	</div>	
	
	<?php
		
		if(@$_GET['n']==1){
			echo '<div style="text-align:center; font-size:20px; color:#660066;">
			<strong>Not a valid username & password OR you are not an admin....</strong>
		</div>';	
		}
		
		?>