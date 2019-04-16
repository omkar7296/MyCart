<?php
include("header.php");
session_start();
?>
<?php 
if(isset($_SESSION['name'])){
	echo '<div id="hcart" style="float:left; margin-left:40px;">
			<a href="cart.php?uid='.$_SESSION['uid'].'">MyCart</a>
		</div>
<div id="hlogout" style="float:right; margin-right:50px;">
			<a href="logout.php">Logout</a>
		</div>';
		echo '</div></div><div style="text-align:center; font-size:25px; color:#660066;"><h2>Welcome '.$_SESSION['name'].'...!!!!!</h2></div>'; 
}
else{
echo '
 
<div id="hdiv2">
			<a href="login.php">Login</a>
		</div>
<div id="hdiv3">
			<a href="Signin.php">Sign up</a>
		</div>
	


 ';
}		?>

<style>

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: right;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text]{
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: right;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

.container {
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    //left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: green;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: green;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

</style>
</div>
	</div>
	
	<div>
	
	
	<div class="search-container" style="text-align: center;">
	

	<form method= "POST" action="search.php" id="search_form">
	
	
<label class="container"><b>By Brand</b>&nbsp;
  <input type="radio" id="brand" checked="checked" name="radio_search" value="brand">
  <span class="checkmark"></span>
</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" id = "search_inp" placeholder="Search.." name="search_inp">
      <button type="button" id="search_button" onclick="call_search();"><i class="fa fa-search"></i></button>
	  
<label class="container"><b>By Male</b>&nbsp;
  <input type="radio" id="male" name="radio_search" onclick="call_search();" value="male">
  <span class="checkmark"></span>
</label>
&nbsp;&nbsp;&nbsp
<label class="container"><b>By Female</b>&nbsp;
  <input type="radio" id="female" name="radio_search" onclick="call_search();" value="female">
  <span class="checkmark"></span>
</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	  
	</form>
 </div>
	</div>
<?php 
include("database.php");




$i=1;
$parameter=1;
@$parameter=$_GET['parameter'];
$fe=1;
$query="select * from products";
$result=mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);

$query1="select * from Products";

if($_POST){
	$radio_search=$_POST['radio_search']; 
	$search_inp=$_POST['search_inp']; 
	if($radio_search == 'male'){
		$query1="select * from Products a,gender_type b  where a.GENDER_TYPE_ID = b.GENDER_TYPE_ID and b.GENDER = 'Men'";
	}else if($radio_search == 'female'){
		$query1="select * from Products a,gender_type b  where a.GENDER_TYPE_ID = b.GENDER_TYPE_ID and b.GENDER = 'Women'";
	}else if($radio_search == 'brand'){
		$query1="select * from Products a,brand b  where a.B_ID = b.B_ID and b.B_NAME like '%$search_inp%'";
	}
	
	
}

$result1=mysqli_query($con,$query1);
$rowcount1=mysqli_num_rows($result1);


?>

<?php 
		while($i<=$rowcount1) :
				$row=mysqli_fetch_assoc($result1);?>
				
						<div align="center" class="innerdivs" style="height:250px; width:210px; border:2px solid gray; float:left; margin-left: 7px; margin-bottom: 8px; border-radius: 8px;">
						<div id="container" style="text-align:center; border-radius: 8px;"><img src="<?php echo 'images/'.$row['P_ID'].'.jpg'; ?>" height="170px" width="100%" align="center" style="border-radius: 8px;"></div><br><div id="pseudo">
							<?php echo	'<u><a class="links" href="desc.php?id='.$row['P_ID'].'">'.' '.$row['P_NAME'].'</a></u></div></div>'; ?>
	
	<?php  $i++; endwhile; ?>
	
<div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>	
	
	<?php

		

?>




</body>
</html>
	