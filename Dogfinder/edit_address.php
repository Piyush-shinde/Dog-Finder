<html>
<head>
<title>new user</title>
			<style>
			
			
			body
	
	{
	
		margin:0 auto;
		background-image:url("b.jpg");
		background-repeat:no-repeat;
		background-size: 100% 680px;
		
	}
		.container-signup
		{
		width:470px;
		height: auto;
		text-align: center;
		background-color:#400040;
		border-radius: 4px;
		margin:0 auto;
		margin-top:20px;
		opacity:0.8;
		
		transition:width 0.4s ease-in-out;
		}
	
		.container-signup img
	{
		width:100px;
		height: 100px;
		margin-top:20px;
		margin-bottom:20px;
		border-radius:60px;
		border:none;
		
	
	}
	
	.btn-signup
	{
		border-radius: 4px;
		padding:5px 15px;
		font-weight:bold;
		margin-top:10px;
		cursor:pointer;
		color:#00FFFF;
		margin-bottom:3px;
		}
	
	
	
	
	
				input[type="text"],input[type="password"],input[type="email"]
	{
		width:300px;
		height: 33px;
		border:none;
		border-radius:4px;
		font-size:15px;
		margin-bottom:15px;
		background-color:#fff;
		padding-left:3px;
		
		transition:width 0.4s ease-in-out;
		
	}
	.btn-signup
	{
		border-radius: 4px;
		padding:5px 15px;
		font-weight:bold;
		margin-top:10px;
		
		cursor:pointer;
		color:#400040;
		
		
		border:1px solid aquamarine;;
		background-color:#fff;
	}
	.btn-signup:hover
	{
		color:#fff;
		background:#400040;
	}
	input[type="password"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:#E9967A;
			}	
			
			
			input[type="email"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:#E9967A;
			}	
			
			
			input[type="text"]:focus
			{
				width:50%;
				border:2px solid aquamarine;
				background-color:#E9967A;
			}	
			
			
			input[type="submit"]:focus
			{
				width:20%;
				border:2px solid aquamarine;
				background-color:#0000CD;
			}
	
				
			</style>
</head>
<body>
<?php  
	
		if(isset($_GET['userid']))
		{
			include("db.php");
			$getid=$_GET['userid'];
			
				$getaddress=$con->prepare("select * from newuser where id='$getid'");
				$getaddress->execute();
			
				$row=$getaddress->fetch();
		}


 ?>

	<div class="container-signup">
		<?php echo"<img src='userphotos/".$row['user_img']."'>";?>
		<form  method="post" enctype="multipart/form-data">
			
			
			<center>
			
			
			 <input type="text" name="name" required placeholder="Enter Username" value="<?php echo"".$row['username'].""; ?>">
		
			
		
		<input type="text" name="phoneno" required placeholder="Enter Phone Number" pattern="[7-9]{1}[0-9]{9}" value="<?php echo"".$row['phoneno'].""; ?>">
		
			
			
			 <input type="text" name="address" required placeholder="Enter Address" value="<?php echo"".$row['address'].""; ?>">
			
			 <input type="text" name="city" required placeholder="Enter City" value="<?php echo"".$row['city'].""; ?>">
			  <input type="text" name="pincode" required placeholder="Enter Pincode" pattern="[0-9]{6}" value="<?php echo"".$row['pincode'].""; ?>">
	
		<input type="email" name="email" required placeholder="Enter Email" value="<?php echo"".$row['email'].""; ?>">
		

			 <input type="password" name="password" required placeholder="Enter Password" value="<?php echo"".$row['password'].""; ?>"><br>
			
				<?php echo"	<input type='file' name='pro_img1' style='color:#fff;' /><br><br>
								
			
								
			";?>
		
			<input type="submit" name="submit" value="update" class="btn-signup">
			
			
			</center>
			
			
		</div>	
	</form>
</body>
</html>
<?php


if(isset($_POST['submit']))
{
	include("db.php");
	
	$username=$_POST['name'];
	$phone=$_POST['phoneno'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	setcookie('usernameget',$username,time()+60*60*7);
	
				if($_FILES['pro_img1']['tmp_name']=="")
				{
				
				}
				else
				{
					$pro_img1=$_FILES['pro_img1']['name'];
					$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];
					move_uploaded_file($pro_img1_tmp,"userphotos/$pro_img1");	
			
					$up_img1=$con->prepare("update newuser set user_img='$pro_img1' where ID='$getid'");
			
					$up_img1->execute();
			
				}
	
	
	$pdoResult=$con->prepare("update newuser set username='$username',phoneno='$phone',address='$address',city='$city',pincode='$pincode',email='$email',password='$password' where id='$getid'");
	
	
	if($pdoResult->execute())
	{
		echo "Data inserted";
		
		header("location:myaccount.php");
	}
	else
	{
		echo "data not inserted";
	}
}




?>