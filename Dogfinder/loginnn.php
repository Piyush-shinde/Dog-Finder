<?php

$message="";
	if(isset($_POST['delete']))
	{
		$s=0;
		try
		{
			$pdoconnect=new PDO("mysql:host=localhost;dbname=ilavarasi","root","");			
		}
		
		catch(PDOException $exc)
		{
			echo $exc->getMessage();
			exit();
		}
		
		$dd=$_POST['uname'];
		$ds=$_POST['pass'];
		$pdoResult=$pdoconnect->query("SELECT * FROM login where username='$dd' AND password='$ds'");
		foreach($pdoResult as $row)
		{
			$message=$_POST["uname"];
			echo "$row[0]- $row[1]- $row[2]<br>";
			$s=$s+1;
			setcookie("uname","$dd",time()+60*60*24*30);
			session_start();
				$time_now=mktime(date('h')+3,date('i')+30,date('s'));
				$date = date('d-m-Y H:i:sa', $time_now);
				$_SESSION['logintime1']=$date;		
				$insert_login_time=$pdoconnect->prepare("insert into session(time_in,setonoff,username)values(Now(),'1','$dd')");
				$insert_login_time->execute();
				header("location:");
		}
		
		if($s==0)
		{
			echo "<h1>username and password incorrect</h1>";
			$message='<label>wrong data</label>';	
		}
	}	
		
?>





<!DOCTYPE html>
<html>
	<head>
			<title>login</title>
	</head>

	
	<body> 
	<center>USER  LOGIN  </center>	<br><br><br>				
	 
    <center>
	<div class="container">
		<body background="images1.jpg">
				<form  method="post">
						<input type="text" name="uname"  placeholder="Enter Username"><br><br>
						<input type="password" name="pass"  placeholder="Enter Password"><br><br>
						<input type="submit" name="delete" value="login" class="btn-login"><br/><br/>
						<a href="newuser.html">New User</a><br>
						<a style="text-decoration:none;" href="#">
				</form>
	</div>
	</center>
	</body>
</html>
