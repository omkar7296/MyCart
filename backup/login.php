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
		
		<div id="seconddiv">
			<div style="text-align:center; font-size:30px; color:#660066;">
			<?php
			if(@$_GET['r']==1){
				echo '<strong>User successfully registered...Please Sign in to continue shopping</strong>';}
			else{
				echo '<strong>Sign in to continue shopping</strong>';
			} ?>
		</div>	
			<div id="fourthdiv">
				<br><br>
				<form method="post" action="verify.php">
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
			<strong>User not registered please sign in to continue shopping....</strong>
		</div>';	
		}
		
		if(@$_GET['m']==1){
			echo '<div style="text-align:center; font-size:20px; color:#660066;">
			<strong>Please check your password...</strong>
		</div>';	
		}
		?>