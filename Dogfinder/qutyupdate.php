<?php

	if(isset($_GET['id']) && isset($_GET['qty']))
	{
		
			include("db.php");
			$petid=$_GET['id'];
			$qty=$_GET['qty'];
			$query=$con->prepare("update addcart set qty='$qty' where cart_id='$petid'");
			
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






?>