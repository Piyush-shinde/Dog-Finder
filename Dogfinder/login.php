<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
	
	</head>
	
	<body >
	
	
	<div class="container">
		<img src="E:\anu\blood photos\Blood.jpg">
				<form  method="post">
<a href="main.html"> login </a>

					<input type="text" name="uname" required placeholder="Enter Username" id="username_id"><br><br>
						<input type="password" name="pass" required placeholder="Enter Password" id="password_id"><br>
						
						Show password:<input type="checkbox" onclick="myfunction()" value="Show password"><br><br>
						
						<input type="submit" name="delete" value="login" class="btn-login" onclick="myfunction1()"   ><br/><br>
<a href="forgetpassword_working.php"><U>Forget Password?</U></a><br>
						<a style="text-decoration:none;" href="newuser_pdo_code.php"><input   type="button"   value="New User"  class="btn-newuser" ></a>
				</form>
	</div>
	
	<script>
	
		function myfunction()
		{
			var x=document.getElementById("password_id");
			if(x.type =="password")
			{
				x.type="text";
			}
			
			else
			{
				x.type="password";
			}
		}
		
		function myfunction1()
		{
				var ds=["admin","admin"];
                var dr=["anu","123"];
				var a,b;
				var c=1;
			
			  a=document.getElementById("username_id").value;
			  b=document.getElementById("password_id").value;
				
				
			if(a==ds[0])
			{
				if(b==ds[1])
				{
					alert("login successfully...! ");
					c=c+1;
				}
			}
			if(c==1)
			{
			alert("incorrect...!");
			}
			
		}
	
	
	</script>
	
	</body>
</html>
