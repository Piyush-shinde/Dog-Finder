<?php

	if(isset($_GET['id']))
	{
		
			include("db.php");
			$petid=$_GET['id'];
			$query=$con->prepare("delete from petdetails where pet_id='$petid'");
			
			if($query->execute())
			{
				echo"<script>alert('deleted Succefully')</script>";
				echo"<script>window.open('viewallpetdetails.php','_self')</script>";
			}
			else
			{
				echo"<script>alert('deleted not Succefully')</script>";
			}
			
	}






?>