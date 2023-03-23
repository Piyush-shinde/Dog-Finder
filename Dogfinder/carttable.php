<html>
<head>
	<title>Dog Finder</title>
	<link rel="stylesheet" href="index_style.css" />
<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
table{width:95%;height:auto;margin-left:30px;border-collapse:collapse;}
table th{font-size:25px;border-collapse:collapse;border:2px solid #400040;}
table td{text-align:center;padding:10px;font-size:20px;}
</style>
</head>

		<body>
		
				
			
				
	

				
				
				<?php 
				include("header_index.php");
				
				?>
				<h1 style="width:95%;text-align:center;background:#425298;color:#fff;height:50px;line-height:50px;margin-left:30px;margin-top:10px;border-radius:4px;margin-bottom:10px;">Cart Table </h1>
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
							<td><img src='petphotos/".$row2['pet_img1']."' style='width:120px;height:120px;border-radius:4px;'></td>
							<td>Rs. ".$row2['pet_rate']."</td>
							<td><b>".$row1['qty']." </b><form method='get'><input type='text' name='qty' value='".$row1['qty']."' style='width:40px;height:20px;'><input type='hidden' name='cart_id' value='".$row1['cart_id']."' style='width:40px;height:20px;'><input type='submit' name='upqty' value='add' style='width:40px;height:20px;background:#fff;color:#400040;border:1px solid #400040;margin-left:10px;'></form></td>
							<td><a href='removecart.php?cart_id=$getcartid'>Remove</a></td>
							<td>Rs .$a</td>
						
						</tr>";
						
						endwhile;
						endwhile;
						
				
				?>
				<tr><td colspan="6" style="text-align:right;border-top:1px solid #400040;"><b style="color:red;font-size:25px;">Total</b></td><td style="border-top:1px solid #400040;border-bottom:1px solid #400040;">Rs.  <?php echo"".$b."";?></td></tr>
				</table>
				<a href="deliveryaddress.php" style="margin-left:400px;border:1px solid #425298;padding:10px;text-decoration:none;">checkout</a>
				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
				
				
				<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;

}
</script>
<script>
function myFunction() {
	var x="";
    x = document.getElementById("mySelect").value;
  
    window.open(""+ x,"_self");
	
   
}
</script>

	
		</body>

</html>
<?php

	if(isset($_GET['upqty']))
	{
		include("db.php");
			
			$qty=$_GET['qty'];
			$cartid=$_GET['cart_id'];
			if($qty<=10)
			{
					$query=$con->prepare("update addcart set qty='$qty' where cart_id='$cartid'");
					
					if($query->execute())
					{
						echo"<script>alert('updated Succefully')</script>";
						echo"<script>window.open('carttable.php','_self')</script>";
					}
					else
					{
						echo"<script>alert('updated not Succefully')</script>";
					}
			}
			else
			{
				echo"<script>alert('maximum 10 pet only buy')</script>";
				echo"<script>window.open('carttable.php','_self')</script>";
			}
	}


?>
