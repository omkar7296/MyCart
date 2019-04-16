<?php
	$id = $_POST['pid'];
	$size = $_POST['size'];
	$quantity = $_POST['quantity'];
	$conn=new mysqli("localhost","root","","shoestore");
	
	$sql = "SELECT * FROM Inventory WHERE P_ID = $id";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		$sql = "UPDATE Inventory SET Quantity = Quantity + $quantity where P_ID = $id AND size = $size" ;
		$result = $conn->query($sql);
		header("location: addinventory.php?message=addsuccess");
	}
	else
	{
		header("location: addinventory.php?message=noproduct");
	}
?>