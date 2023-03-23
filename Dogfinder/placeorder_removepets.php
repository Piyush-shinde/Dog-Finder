<?php

	if(isset($_GET['cart_id']))
	{
		
			include("db.php");
			$petid=$_GET['cart_id'];
			$query=$con->prepare("delete from addcart where cart_id='$petid'");
			
			if($query->execute())
			{
				echo"<script>alert('deleted Succefully')</script>";
				echo"<script>window.open('placeorder.php?method=cod','_self')</script>";
			}
			else
			{
				echo"<script>alert('deleted not Succefully')</script>";
			}
			
	}






?>