<?php


		
		
	
				
				
		if(isset($_COOKIE['email'])and isset($_COOKIE['pass']))
		{

			$email=$_COOKIE['email'];
			$pass=$_COOKIE['pass'];
			
			
			
			setcookie('email',$email,time()-1);
			setcookie('pass',$pass,time()-1);
		}
		
		if(isset($_COOKIE['usernameget']))
				{
					$getname=$_COOKIE['usernameget'];
					setcookie('usernameget',$getname,time()-1);
				}
					
					
					
					
					
				header("location:index.php");
			
?>