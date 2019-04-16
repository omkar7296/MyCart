<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript">
			function verify(){
				if(document.getElementById('fname').value == ""){
					alert("Enter First Name");
					return false;
				}
				
				if(document.getElementById('lname').value == ""){
					alert("Enter Last Name");
					return false;
				}
				
				if(document.getElementById('dob').value == ""){
					alert("Enter Date of Birth");
					return false;
				}
				
				if(document.getElementById('mno').value == ""){
					alert("Enter Mobile Number");
					return false;
				}
				
				if(document.getElementById('email').value == ""){
					alert("Enter Email");
					return false;
				}
				
				if(document.getElementById('password').value == ""){
					alert("Enter Password");
					return false;
				}
				
				if(document.getElementById('password1').value == ""){
					alert("Enter Retype Password");
					return false;
				}
				
				if(document.getElementById('password').value != document.getElementById('password1').value){
					alert("Password and Retype Password must match");
					return false;
				}

				
				document.getElementById("submit_signup_form").submit();
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
			<strong>&nbsp;&nbsp;PLEASE ENTER YOUR DETAILS</strong>
		</div>	
			<div id="fourthdiv">
				<br><br>
				<form method="post" id="submit_signup_form" action="signin_action.php">
				<table id="signintable" cellspacing="10" style="border-radius: 8px;">
					<tr>
						<td>First Name: </td>
						<td> <input type="text" name="fname" id="fname" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td> <input type="text" name="lname" id="lname" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Gender: </td>
						<td> M<input type="radio" name="radio1" id="radio1" value="Male">
								F<input type="radio" name="radio1" id="radio2" value="Female" checked></td>
						
							
					</tr>
					
					<tr>
					<td>Date of Birth: </td>
						<td> <input type="date" name="dob" id="dob" style="height:30px; padding:auto; width:100%; border-radius: 8px;">
							</td>
					</tr>
					
					<tr>
						<td>Mobile no: </td>
						<td> <input type="text" name="mno" id="mno" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td> <input type="email" name="email" id="email" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td> <input type="password" name="password" id="password" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Retype Password: </td>
						<td> <input type="password" name="password1" id="password1" style="height:30px; padding:auto; width:100%; border-radius: 8px;"></td>
					</tr>
					<tr>
						<td>Enter Captcha: </td>
						<td><input class="textbox" type="text" name="code" style="height:30px; width:195px; padding:auto; border-radius: 8px;">&nbsp;&nbsp;<img src="captcha.php" style="border-radius: 8px; position: absolute"></td>
					</tr>
					<tr>
					<td> </td>
					<td> <input type="button" value="Submit" style="height:30px; width:150px; border-radius: 8px;" id="submit_signup" onclick = "verify();"/> &nbsp&nbsp&nbsp <input type="reset" value="clear" 
					style="height:30px; width:150px; border-radius: 8px;"></td>
					</tr>
				</table>
				</form>
			</div>
	</div>	
	
	<?php include("footer.php");
	