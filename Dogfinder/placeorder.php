<?php

	if(isset($_POST['place']))
	{
		include("db.php");
						$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();
						
						$query21=$con->prepare("select *from addcart where  user_id='".$row['id']."' order by 1 desc");
						$query21->execute();
						
						while($row1=$query21->fetch()):
							$query211=$con->prepare("insert into order_placed(pet_id,user_id,qty,order_date)values('".$row1['pet_id']."','".$row1['user_id']."','".$row1['qty']."',Now())");
						$query211->execute();
						
						endwhile;
						$query221=$con->prepare("delete from addcart where user_id='".$row['id']."'");
						$query221->execute();
				
				echo"<script>alert('order_placed')</script>";
				echo"<script>window.open('myaccount.php','_self')</script>";
	}

?>

<!DOCTYPE html>
<html>
<head>
<style>
#show{width:90%;height:auto;background:#fff;margin-left:70px;border-radius:4px;box-shadow: 3px 3px 3px #000;border-radius:4px;border:2px solid #425298;margin-top:20px;}
#show table{border:1px solid #000;;width:100%;border-collapse:collapse;}
#show table td{text-align:center;padding:15px;}
#show table th{text-align:center;padding:10px;font-size:20px;}
</style>
</head>
<body>
<?php


	
	include("header_index.php");
	
?>
	<div id="show">
	<h1 style="width:100%;height:40px;line-height:40px;background:#425298;color:#fff;text-align:center;margin-top:20px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;">order Details</h1>
				<table>
				<tr>
					<th>S.No</th>
					<th>Pet Name</th>
				
				
				
				<th>Rate</th>
				
				<th>Quantity</th>
				
				
				<th>Total</th>
				</tr>
				<?php
				include("db.php");
						$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();
						
						$query21=$con->prepare("select *from addcart where  user_id='".$row['id']."' order by 1 desc");
						$query21->execute();
						$r=1;
						$b=0;
						while($row1=$query21->fetch()):
						$qty=$row1['qty'];
						$getpetid=$row1['pet_id'];
						$getcartid=$row1['cart_id'];
						$query22=$con->prepare("select *from petdetails where pet_id='$getpetid'");
						$query22->execute();
						
						while($row2=$query22->fetch()):
						$rate=$row2['pet_rate'];
						$a=$qty*$rate;
						$b=$b+$a;
						echo"<tr>
						
							<td>".$r++."</td>
							<td>".$row2['pet_name']."</td>
							
							<td>Rs. ".$row2['pet_rate']."</td>
							<td><b>".$row1['qty']." </b></td>
							
							<td>Rs .$a</td>
						
						</tr>";
						
						endwhile;
						endwhile;
						
				
				?>
				<tr><td colspan="4" style="text-align:right;border-top:1px solid #400040;"><b style="color:red;font-size:25px;">Total</b></td>
				<td style="border-top:1px solid #400040;border-bottom:1px solid #400040;">Rs. <b style="font-size:20px;"> <?php echo"".$b."";?></b></td></tr>
		<tr><td colspan="5">payment method: <?php echo"".$_GET['method']."";?></td></tr>	
<tr><td colspan="5"><form method="post"><input type="submit" name="place" value="placeOrder" style="padding:10px;border:1px solid #425298;color:#425298;background:#fff;border-radius:4px;"></form></td></tr>			
		</table>
	</div>
		<div id="show">
			
		<h1 style="width:95%;text-align:center;background:#425298;color:#fff;height:50px;line-height:50px;margin-left:30px;margin-top:10px;border-radius:4px;margin-bottom:10px;">Order Details table </h1>
				<table>
				<tr>
					<th>S.No</th>
					<th>Pet Name</th>
				
				<th>Pet Img</th>
				
				<th>Rate</th>
				
				<th>Quantity</th>
				<th>Remove</th>
				
				<th>Total</th>
				</tr>
				<?php
				
						$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();
						
						$query21=$con->prepare("select *from addcart where  user_id='".$row['id']."' order by 1 desc");
						$query21->execute();
						$r=1;
						$b=0;
						while($row1=$query21->fetch()):
						$qty=$row1['qty'];
						$getpetid=$row1['pet_id'];
						$getcartid=$row1['cart_id'];
						$query22=$con->prepare("select *from petdetails where pet_id='$getpetid'");
						$query22->execute();
						
						while($row2=$query22->fetch()):
						$rate=$row2['pet_rate'];
						$a=$qty*$rate;
						$b=$b+$a;
						echo"<tr>
						
							<td>".$r++."</td>
							<td>".$row2['pet_name']."</td>
							<td><img src='petphotos/".$row2['pet_img1']."' style='width:120px;height:120px;border-radius:4px;'></td>
							<td>Rs. ".$row2['pet_rate']."</td>
							<td><b>".$row1['qty']." </b><form method='get'><input type='text' name='qty' value='".$row1['qty']."' style='width:40px;height:20px;'><input type='hidden' name='cart_id' value='".$row1['cart_id']."' style='width:40px;height:20px;'><input type='submit' name='upqty' value='add' style='width:40px;height:20px;background:#fff;color:#400040;border:1px solid #400040;margin-left:10px;'></form></td>
							<td><a href='placeorder_removepets.php?cart_id=$getcartid'>Remove</a></td>
							<td>Rs .$a</td>
						
						</tr>";
						
						endwhile;
						endwhile;
						
				
				?>
		
		</div>
</body>
</html>
<?php

	if(isset($_GET['upqty']))
	{
	
			
			$qty=$_GET['qty'];
			$cartid=$_GET['cart_id'];
			if($qty<=10)
			{
					$query=$con->prepare("update addcart set qty='$qty' where cart_id='$cartid'");
					
					if($query->execute())
					{
						echo"<script>alert('updated Succefully')</script>";
						echo"<script>window.open('placeorder.php?method=cod','_self')</script>";
					}
					else
					{
						echo"<script>alert('updated not Succefully')</script>";
					}
			}
			else
			{
				echo"<script>alert('maximum 10 pet only buy')</script>";
				echo"<script>window.open('placeorder.php?method=cod','_self')</script>";
			}
	}


?>
