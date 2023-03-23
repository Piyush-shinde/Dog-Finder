<!DOCTYPE html>
<html>
<head>
<style>
#showadd{color:#425298;width:90%;height:400px;background:#fff;margin-left:100px;border-radius:4px;box-shadow: 3px 3px 3px #000;border-radius:4px;border:2px solid #425298;margin-top:20px;}
#showadd li{list-style-type:none;}
</style>
</head>
<body>
<?php



		if(isset($_COOKIE['usernameget']))
				{
					include("db.php");
					$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();

					include("header_index.php");
					echo"<div id='showadd'>
						<h1 style='width:100%;height:40px;line-height:40px;background:#425298;color:#fff;box-shadow: 3px 3px 3px #000;text-align:center;border-radius:4px;text-shadow: 5px 5px 5px #000;margin-top:20px;'>Delivery to this Address</h1>
						<li style='text-align:center;margin-top:60px;font-size:30px;'>".$row['address']."</li>
						<li style='margin-top:130px;'><a href='edit_add.php' style='margin-left:450px;border:1px solid #425298;padding:10px;text-decoration:none;border-radius:4px;'>Edit Address</a></li>
						<li style='margin-top:-20px;margin-left:580px;'><a href='payment_type.php' style='border:1px solid #425298;padding:10px;text-decoration:none;border-radius:4px;'>continue</a></li>
				
						</div>
					";

				}

?>
</body>
</html>