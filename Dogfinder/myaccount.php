<html>
<head>

<style>
body{background:#425298;}
#box1{border:1px solid aquamarine;padding-left:200px;color:yellow;}
table{width:95%;height:auto;margin-left:30px;border-collapse:collapse;}
table th{font-size:25px;border-collapse:collapse;border:2px solid #400040;}
table td{text-align:center;padding:10px;font-size:20px;}
#show{background:#fff;}
</style>
</head>
<body>
<a href="index.php" style="color:red;font-size:20px;">Home Page</a>
<?php

	include("db.php");
	
	$a=1;
	$name=$_COOKIE['usernameget'];
	$orderdetails=$con->prepare("select * from newuser where username='$name'");
	
	$orderdetails->execute();
	
	$row=$orderdetails->fetch();
	
	$userid=$row['id'];
	
		
	echo"<h1 style='color:#fff;background:#425298;text-align:center;line-height:50px;height:50px;'>Your Address</h1>";
		echo"<div id='box1'>";
		echo"<h2>".$row['username']."</h2>";
		
		echo"<h2>".$row['address'].",</h2>";
		echo"<h2>".$row['city'].",</h2>";
		echo"<h2>".$row['pincode'].".</h2>";
		echo"<h2>".$row['email']."</h2>";
					
		echo"<h2>".$row['phoneno']."</h2><br><a href='edit_address.php?userid=".$row['id']."'><input type='submit' value='Edit' style='margin-bottom:20px;width:70px;height:40px;border-radius:4px;background:#fff;border:1px solid aquamarine;'></a>";
	
		echo"</div>";
		
		echo"<img src='userphotos/".$row['user_img']."' style='width:400px;height:330px;float:right;margin-top:-355px;margin-right:200px;border-radius:4px;border:1px solid aquamarine;'/>";
?>
					<div id="show">
						<h1 style="color:#fff;background:#425298;text-align:center;line-height:50px;height:50px;">Your orders</h1>
						<hr style="color:#425298;">
						<table>
				<tr>
					<th>S.No</th>
					<th>Pet Name</th>
				
				<th>Pet Img</th>
				
				<th>Rate</th>
				
				<th>Quantity</th>
				
				<th>order date</th>
				<th>Total</th>
				</tr>
						<?php
				include("db.php");
						$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();
						
						$query21=$con->prepare("select *from order_placed where  user_id='".$row['id']."' order by 1 desc");
						$query21->execute();
						$r=1;
						$b=0;
						while($row1=$query21->fetch()):
						$qty=$row1['qty'];
						$getpetid=$row1['pet_id'];
						
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
							<td><b>".$row1['qty']." </b></td>
							<td><b>".$row1['order_date']." </b></td>
							<td>Rs .$a</td>
						
						</tr>";
						
						endwhile;
						endwhile;
						
				
				?>
					</div>
</body>
</html>