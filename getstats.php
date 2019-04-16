<?php 
include("header.php");
?>
<html>
<head>
<style>

.qns{
	border : 4px solid white;
	background-color: black;
	color: white;
	border-radius: 8px;
	width: 750px;
	
}
#allqns{
	width:fixed;
	margin:auto;
}
</style>
</head>
<body>
<div id="mdiv3">
			<a href="logout.php">Logout</a>
</div>
		<div id="mdiv6">
		<a href="admin.php">Admin Home Page</a>
		</div>

</div></div>

	<div id="seconddiv">
		
		<div id="fourthdiv"><h3><center> Aggregate Queries </center></h3>	
			<?php
			
			?>
			<div id="allqns">
			<?php 
			$sql1 = "
			SELECT U_ID 
			FROM bought 
			group by U_ID 
			having sum(QUANTITY) = (
						Select MAX(a.total) 
						from( SELECT U_ID, sum(QUANTITY) as total 
						FROM bought 
						group by U_ID
						)
						a
						)
			";
			
			$sql2 = "
			SELECT pt.P_TYPE_NAME as SHOE_TYPE, SUM(I.QUANTITY) as TOTAL_QUANTITY
			FROM inventory i, products p, p_type pt
			where p.P_TYPE_ID = pt.P_TYPE_ID and p.P_ID = i.P_ID
			group by pt.P_TYPE_ID
			";
			
			
			$sql3 = "
			SELECT g.GENDER as USER_TYPE, SUM(b.P_ID) as TOTAL_QUANTITY
			FROM gender_type g, products p, bought b
			where p.GENDER_TYPE_ID = g.GENDER_TYPE_ID AND b.P_ID = p.P_ID
			group by g.GENDER_TYPE_ID
			";
			
			$sql4 = "
			Select a.P_ID as PRODUCT_ID, (a.total * b.P_COST_BOUGHT) as INVENTORY_COST from (Select P_ID, Sum(QUANTITY) as total from inventory GROUP BY P_ID)a , products b where a.P_ID = b.P_ID
			";
			?>
			<center>
			<b>
				<div id="qn1" onclick="document.getElementById('ans1').innerHTML = ('<?php execute($sql1,1); ?>'); ">
				<div class ="qns"> 1. Find the user who has bought maximum number of shoes of all categories </div>
					<div id="ans1"></div>
				</div>
				<br/>
				
				
				<div id="qn2" onclick="document.getElementById('ans2').innerHTML = ('<?php execute($sql2,3); ?>');">
				<div class ="qns"> 2. Find the total quantity of each product type of shoe in inventory </div>
					<div id="ans2"></div>
				</div>
				<br/>
				
				<div id="qn3"   onclick="document.getElementById('ans3').innerHTML = ('<?php execute($sql3,4); ?>');">
				<div class ="qns"> 3. Find the total quantity bought by each type of Gender </div>
					<div id="ans3"></div>
				</div>
				<br/>
				
				<div id="qn4"  onclick="document.getElementById('ans4').innerHTML = ('<?php execute($sql4,5); ?>');">
				<div class ="qns"> 4. Get the total inventory cost of each products </div>
					<div id="ans4"></div>
				</div>
				<br/>
				</b>
			</center>
			</div>
		</div>	
		<div id="thirddiv"></div>
		<center>
		<?php
			
			function execute( $sql , $type)
			{
				$con=new mysqli("localhost","root","","shoestore");
			if ($con->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
				$result = $con->query($sql);
				if ($result->num_rows > 0) 
				{ 
					while($row = $result->fetch_assoc()) 
					{
						if($type === 1)
							echo 'User with id = ' .$row["U_ID"] ." has bought most number of shoes" ."<br/>";
						else
						{
							if($type === 2)
							echo 'P_ID = ' .$row["P_ID"] ."<br/>";
							else
							{
								if($type === 3)
									echo "There are total ".$row["TOTAL_QUANTITY"] ." " .$row["SHOE_TYPE"] ." shoes in inventory"   ."<br/>";
								else
								{
									if($type === 4)
									echo $row["USER_TYPE"] ." bought a total quantity of "  .$row["TOTAL_QUANTITY"] ." products" ."<br/>";
									else
									{
										if($type === 5)
										echo 'For product id = ' .$row["PRODUCT_ID"] ." we have inventory cost as " ."$" .$row["INVENTORY_COST"] ."<br/>";
									}
								}
							}
						}
					}
				} 
				else 
				{
					echo "0 results";
				}
				$con->close();
			}
			
		?>
	</center>
<?php 
include("footer.php");
?>
</body>
</html>
	