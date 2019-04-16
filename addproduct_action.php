<?php
$con=new mysqli("localhost","root","","shoestore");
$pname=$_POST['pname'];
$ptype=$_POST['ptype'];
$btype=$_POST['btype'];
$desc=$_POST['desc'];
$gender=$_POST['gender'];
$cost=$_POST['cost'];
$costprice = $_POST['costprice'];
$query = "SELECT MAX(P_ID) FROM products";
$result=$con->query($query);
$row = $result->fetch_assoc();
$num = $row['MAX(P_ID)'] + 1;
$sql="INSERT INTO products VALUES($num,'$pname',$cost,$btype,$ptype,'$desc',$gender,$costprice)";
$result = $con->query($sql);
$sql = "INSERT INTO Inventory VALUES($num,5,0)";
$result = $con->query($sql);
$sql = "INSERT INTO Inventory VALUES($num,6,0)";
$result = $con->query($sql);
$sql = "INSERT INTO Inventory VALUES($num,7,0)";
$result = $con->query($sql);
$sql = "INSERT INTO Inventory VALUES($num,8,0)";
$result = $con->query($sql);
$sql = "INSERT INTO Inventory VALUES($num,9,0)";
$result = $con->query($sql);
$sql = "INSERT INTO Inventory VALUES($num,10,0)";
$result = $con->query($sql);
if($_FILES["image"]["error"]>0)
{
	echo "error:".$_FILES["image"]["error"]."<br>";
	header("location: addproduct.php?message=productaddfailed");
}
else
{
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$num .".jpg");
	header("location: addproduct.php?message=success");
}

?>