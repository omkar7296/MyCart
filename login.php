<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript">
			function verify(){
				if(document.getElementById('email').value == ""){
					alert("Enter Email");
					return false;
				}
				
				if(document.getElementById('password').value == ""){
					alert("Enter Password");
					return false;
				}
				
				document.getElementById("login_form").submit();
			}
		
		</script>
</head>

<body>
		<div id="Header">
			<br>
			<p><center><img src="logo/logo_1.png"/></center></p>
	<div id="firstdiv">
		<div style="margin-left:670px;">
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
				echo '<strong>&nbsp;&nbsp;&nbsp;&nbsp;Sign in to continue shopping</strong>';
			} ?>
		</div>	
			<div id="fourthdiv">
				<br><br>
				<form method="post" action="verify.php" id="login_form">
				<table id="logintable" cellspacing="10" style="border-radius: 8px;">
					<tr>
						<td>Email: </td>
						<td> <input type="email" name="email" id="email" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td> <input type="password" name="password" id="password" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
					<td> </td>
					<td> <input type="button" value="Login" style="height:30px; width:150px; border-radius: 8px;" onclick = "verify();"> &nbsp&nbsp&nbsp <input type="reset" value="clear" 
					style="height:30px; width:150px; border-radius: 8px;"></td>
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