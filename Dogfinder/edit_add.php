<!DOCTYPE html>
<html>
<head>
<style>
#showadd{width:90%;height:400px;background:#fff;margin-left:100px;border-radius:4px;box-shadow: 3px 3px 3px #000;border-radius:4px;border:2px solid #425298;margin-top:20px;}
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
						<h1 style='width:100%;height:40px;line-height:40px;background:#425298;color:#fff;text-align:center;margin-top:20px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;'>Edit to this Address</h1>
						
					";	
						

				}

?>
		<form method="post">
			<textarea name="add" style="margin-left:300px;margin-top:100px;width:300px;height:60px;border-radius:4px;border:1px solid #425298;"><?php echo"".$row['address']."";?></textarea>
			<br><input type="submit" name="upadd" value="update address" style="width:150px;height:40px;border:1px solid #425298;border-radius:4px;margin-left:300px;background:#fff;">
		</form>
		</div>
			
</body>
</html>
<?php
	if(isset($_POST['upadd']))
	{
		$address=$_POST['add'];
		$pdoResult=$con->prepare("update newuser set address='$address' where id='".$row['id']."'");
	
			
			if($pdoResult->execute())
			{
				
				echo"<script>alert('updated Succefully')</script>";
				echo"<script>window.open('deliveryaddress.php','_self')</script>";
				
			}
			else
			{
				echo"<script>alert('updated not Succefully')</script>";
			}
		
	}


?>