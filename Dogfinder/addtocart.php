<?php

			if(isset($_COOKIE['usernameget']))
			{
				include("db.php");
				$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
				$query->execute();
				
				$row=$query->fetch();
				
				if(isset($_GET['id']))
				{
						$query22=$con->prepare("select *from petdetails where pet_id='".$_GET['id']."'");
						$query22->execute();
						$row1=$query22->fetch();
						
						$query21=$con->prepare("select *from addcart where pet_id='".$row1['pet_id']."' and user_id='".$row['id']."'");
						$query21->execute();
						$row21=$query21->rowCount();
						
						if($row21==0)						
						{
								$query1=$con->prepare("insert into addcart(pet_id,user_id,qty)values('".$row1['pet_id']."','".$row['id']."','1')");
								if($query1->execute())
								{
									echo"<script>alert('product add your cart')</script>>";
									echo"<script>window.open('carttable.php?id=".$row1['pet_id']."','_self')</script>";
				
								}
						}
						else
						{
							echo"<script>alert('product already in ur cart')</script>>";
							echo"<script>window.open('viewdetails.php?id=".$row1['pet_id']."','_self')</script>";
				
						}						
						
				
				
				}
			}
			else
			{
				if(isset($_GET['id']))
				{
					include("db.php");
						$query22=$con->prepare("select *from petdetails where pet_id='".$_GET['id']."'");
						$query22->execute();
						$row1=$query22->fetch();
				}
				echo"<script>alert('please login and add cart')</script>>";
				echo"<script>window.open('viewdetails.php?id=".$row1['pet_id']."','_self')</script>";
						
			}














?>