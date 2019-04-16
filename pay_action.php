<?php
session_start();
include("database.php");
//$array=array(1111111111111111,1010101010101010,0101010101010101);

$cno=$_POST['cno'];
$cvv=$_POST['cvv'];
$exp=$_POST['date'];
$name=$_POST['cname'];
$cost = $_GET['cost'];
$ctype = $_POST['ctype'];


if($_POST["code"]!=$_SESSION['vercode']){
include("header.php");
	echo '<div id="hlogout" style="float:right; margin-right:50px;">
			<a href="logout.php">Logout</a>
		</div></div></div>';

			echo '<div style="text-align:center; font-size:30px; color:#660066;">
			<strong>Please reenter the captcha code.</strong>
		</div>';
} 
else{

$flag = 1;
$tran=time();
$tran = $tran.$_SESSION['uid'];
$u_id = $_SESSION['uid'];

$query_1 = "Select * from cart where U_ID = '$u_id'";
$result_1=mysqli_query($con,$query_1);		
$rowcount_1=mysqli_num_rows($result_1);

$i_1 = 1;
while($i_1<=$rowcount_1) :

$row_1 = mysqli_fetch_assoc($result_1);

$pid_1 = $row_1['P_ID'];
$size_1 = $row_1['SIZE'];
$quantity_1 = $row_1['QUANTITY'];

$query_2 = "Select * from inventory where P_ID = '$pid_1' and SIZE = '$size_1'";
$result_2=mysqli_query($con,$query_2);
$row_2 = mysqli_fetch_assoc($result_2);	
$quantity_2 = $row_2['QUANTITY'];	

if($quantity_2 < $quantity_1){
	$flag = 0;
	$query_3 = "Delete from cart where P_ID = '$pid_1' and SIZE = '$size_1'";
    mysqli_query($con,$query_3);
}
$i_1++; endwhile;

//echo $flag;
if($flag== 0)
{
	include("header.php");
					echo '<div id="hcart" style="float:left; margin-left:40px;">
			<a href="cart.php?uid='.$_SESSION['uid'].'">MyCart</a>
		</div>
					
					<div id="hlogout" style="float:right; margin-right:50px;">
					<a href="logout.php">Logout</a>
					</div></div></div>';

					echo '<div style="text-align:center; font-size:30px; color:#660066;">
					<strong>Some of the items in the cart are out of stock. Sorry for the inconvenience</strong>
					</div>';
					
					

}
else{

$query1 = '';

if($ctype == 'debit')
{
$query1="select * from card_validation where card_no='$cno' and cvv = '$cvv' and card_type = 'debit' and exp_date = '$exp' and balance > '$cost'";
}
else{
	$query1="select * from card_validation where card_no='$cno' and cvv = '$cvv' and card_type = 'credit' and exp_date = '$exp' and balance > '$cost'";
}


				 $result1=mysqli_query($con,$query1);		
				 $rowcount=mysqli_num_rows($result1);
				 $row=mysqli_fetch_assoc($result1);
	
				 $query2 = '';
				 if($rowcount!=0 )
				 {
					 //if($ctype == 'debit')
					 //{
					 $query2="update card_validation set balance = balance - $cost where card_no='$cno'";
					 //echo $query2;
					 //}
					 //else{
						// $query2="update credit_card_validation set avail_limit = avail_limit - $cost where card_no='$cno'";
					 //}
					 $result2=mysqli_query($con,$query2);
					 
					 $query3="Insert into transaction (TRANSACTION_ID,ACTUAL_AMOUNT,CARD_TYPE,CARD_NUMBER,C_NAME,RESULT) values('$tran',$cost,'$ctype','$cno','$name','SUCCESS')";
					 $result3=mysqli_query($con,$query3);
					 
					 $query4="Select * from cart where U_ID = '$u_id'";
					 $result4=mysqli_query($con,$query4);
					 $rowcount4=mysqli_num_rows($result4);
					 $i = 1;
					 
					 while($i<=$rowcount4) :
					 $row4=mysqli_fetch_assoc($result4);
					 $pid1 = $row4['P_ID'];
					 $size1 = $row4['SIZE'];
					 $q1 = $row4['QUANTITY'];
					 //echo "Insert into bought values('$u_id','$pid1','$size1','$q1','$tran')";
					 $query5="Insert into bought values($u_id,$pid1,$size1,$q1,'$tran')";
					 //echo $query5;
					 $result5=mysqli_query($con,$query5);
					 
					 $query6="update inventory set QUANTITY = QUANTITY - $q1 where P_ID = '$pid1' and SIZE = $size1;";
					 $result6=mysqli_query($con,$query6);
					 
					 $i++; endwhile;
					 
					 
					 include("header.php");
					echo '<div id="hlogout" style="float:right; margin-right:50px;">
					<a href="logout.php">Logout</a>
					</div></div></div>';

					echo '<div style="text-align:center; font-size:30px; color:#660066;">
					<strong>Your order has been placed.<br><br>Thankyou for choosing us.</strong>
					</div>';
					 
					 


					 
					
				}
				
				else{
					
					//echo "Hiii";
					//echo $tran.'<br>';
					//echo $cost.'<br>';
					//echo $ctype.'<br>';
					//echo $cno.'<br>';
					//echo $name;
					$query3_1="Insert into transaction(TRANSACTION_ID,ACTUAL_AMOUNT,CARD_TYPE,CARD_NUMBER,C_NAME,RESULT) values('$tran',$cost,'$ctype','$cno','$name','FAILED')";
					mysqli_query($con,$query3_1);
					echo $query3_1;
					
					include("header.php");
					echo '<div id="hlogout" style="float:right; margin-right:50px;">
					<a href="logout.php">Logout</a>
					</div></div></div>';

					echo '<div style="text-align:center; font-size:30px; color:#660066;">
					<strong>Bank did not authenticate the transaction..</strong>
					</div>';
					
					
					
				}
				 
				 
	

}

}







?>

