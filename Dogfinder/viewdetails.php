<?php if(isset($_POST['addcart']))
{
	header("location:addtocart.php?id=".$row['pet_id']."");
		
}?>

<?php
	if(isset($_POST['insert_feedback']))
	{	

				if(isset($_COOKIE['usernameget']))
				{
					
					$query=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query->execute();
				
						$row=$query->fetch();
						
						$userid=$row['id'];
						$pet_id=$_GET['id'];
						
						$desc=$_POST['desc'];
						$rating=$_POST['rating'];
						
						$feed_img=$_FILES['feedimg']['name'];
						$feed_img_temp=$_FILES['feedimg']['tmp_name'];								
						move_uploaded_file($feed_img_temp,"feedback/$feed_img");	
						
						$query=$con->prepare("insert into feedback(user_id,pet_id,rating,feed_desc,feed_img,feed_date)values('$userid','$pet_id','$rating','$desc','$feed_img',Now())");
						if($query->execute())
						{
						
							echo"<script>alert('Feedback inserted')</script>";
							echo"<script>window.open('viewdetails.php?id=".$_GET['id']."','_self')</script>";
						}
						else 
						{
							echo"<script>alert('Feedback not inserted')</script>";
						}
				}
				
				else
				{
					echo"<script>alert('!...Please login and Give feedback...!')</script>";
				}
		
	}


?>
<html>
<head>
<style>
#pet{margin-top:32%;}
#pet ul li{box-shadow:5px 5px 5px #400040;width:300px;height:350px;background:#fff;float:left;margin-top:30px;margin-left:20px;list-style-type:none;border:1px solid #000;border-radius:4px;}
#pet ul li a{text-decoration:none;color:#000;}
#pet1 ul li{width:300px;height:335px;background:red;float:left;margin-top:20px;margin-right:20px;list-style-type:none;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;}

#pet1 ul li img{width:300px;height:335px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;}
#pet2 ul li{background:#fff;color:#400040;float:left;margin-top:10px;margin-right:20px;list-style-type:circle;font-size:24px;border:1px solid #40040;margin-left:20px;}

#feedback{border:2px solid #425298;width:400px;height:270px;background:#fff;margin-left:80px;margin-top:20px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;}
#feedback textarea{margin-top:20px;margin-left:30px;width:250px;height:70px;border-radius:4px;}
#feedback input[type=file]{margin-top:20px;margin-left:30px;}
#feedback select{margin-top:20px;margin-left:30px;width:100px;height:40px;border-radius:4px;}
#feedback select option{padding:5px;}
#feedback input[type=submit]{margin-top:25px;margin-left:130px;padding:10px;border-radius:4px;background:#425298;color:#fff;border:1px solid #fff;}

#feedback input[type=submit]:hover{margin-top:25px;margin-left:130px;padding:10px;border-radius:4px;background:#fff;color:#425298;border:1px solid #425298;}

#img_container{width:800px;height:270px;background:#fff;margin-left:38%;margin-top:-270px;border:2px solid #425298;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;}
#img_container ul li{float:left;list-style-type:none;margin-right:50px;margin-top:10px;}


#review{margin-top:20px;width:91.5%;height:auto;background:#fff;margin-left:80px;border:2px solid #425298;border-radius:4px;box-shadow: 3px 3px 3px #000;}

#review ul{width:96%;height:190px;margin-top:10px;background:#fff;border-bottom:2px solid #425298;}
#review ul li{width:100%;list-style-type:none;}
</style>
</head>
<body>
<?php include("header_index.php");?> 

<?php if(isset($_GET['id']))
		{
			include("db.php");
			$id=$_GET['id'];
			$query=$con->prepare("select *from petdetails where pet_id='$id'");
			$query->execute();
			$row23=$query->rowCount();
			
			$row=$query->fetch();
			
		}?>
<form method="post">
<h1 style="text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;margin-top:5px;width:95%;height:40px;line-height:40px;background:#425298;color:#fff;text-align:center;margin-left:20px;padding-left:10px;border-radius:4px;border:1px solid aquamrine;"><?php echo"".$row['pet_name']."";?></h1>
		<div id="pet1">
			<ul>
				<li><a href="petphotos/<?php echo"".$row['pet_img1']."";?>"><img src="petphotos/<?php echo"".$row['pet_img1']."";?>"></a></li>
				<li><a href="petphotos/<?php echo"".$row['pet_img2']."";?>"><img src="petphotos/<?php echo"".$row['pet_img2']."";?>"></a></li>
		<li><a href="petphotos/<?php echo"".$row['pet_img3']."";?>"><img src="petphotos/<?php echo"".$row['pet_img3']."";?>"></a></li>
		
		<li><a href="petphotos/<?php echo"".$row['pet_img4']."";?>"><img src="petphotos/<?php echo"".$row['pet_img4']."";?>"></a></li>
		
		</ul>
		</div><br>
		<div id="pet2">
		<ul>
				<li>Pet Type:  <?php echo"".$row['pet_type']."";?></li>
				<li style="margin-left:110px;">Pet Color:  <?php echo"".$row['pet_color']."";?></li>
		<li style="margin-left:150px;">Pet Rate:  <?php echo"".$row['pet_rate']."";?></li>
		
		<li style="margin-left:150px;">Pet features:  <?php echo"".$row['pet_features1']."";?></li>
		
		<li style="margin-left:20px;margin-top:20px;">Pet features:  <?php echo"".$row['pet_features2']."";?></li>
		<li style="margin-left:100px;margin-top:30px;"><a href="addtocart.php?id=<?php echo"".$row['pet_id']."";?>" style="width:100px;height:40px;background:#fff;color:#400040;border:1px solid #400040;text-decoration:none;padding:10px;">Addtocart</a></li>
		</ul>
			</form></div><br><br>
		<?php
		$query=$con->prepare("select *from petdetails where pet_type='".$row['pet_type']."' and pet_id!='".$row['pet_id']."' order by 1 desc LIMIT 0,4");
		$query->execute();
		echo"<div id='pet'>
		<h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:20px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>Relative Pets</h1>";
		while($row1=$query->fetch()):
		
			echo"<ul>
				<li><a href='viewdetails.php?id=".$row1['pet_id']."'>
					<h1 style='text-align:center;'>".$row1['pet_name']."</h1>
					<img src='petphotos/".$row1['pet_img1']."' style='width:260px;height:250px;margin-left:20px;border-radius:4px;'>
					<h1 style='text-align:center;font-size:20px;font-weight:normal;margin-top:10px;'>Rate (Rs.  ".$row1['pet_rate'].")</h1>
				</a></li>
			</ul>";
		
		endwhile;
	


echo"</div><br>";
?>

<h1 style="text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:28%;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;">Feedbacks</h1>
<form method="post" enctype="multipart/form-data">
<div id="feedback">
	
	<textarea name="desc" placeholder="give feedback for this pets"></textarea>
	<input type="file" name="feedimg"><br>
	<select name="rating">
		<option value="1">1(poor)</option>
		<option value="2">2(not ok)</option>
		<option value="3">3(ok)</option>
		<option value="4">4(good)</option>
		<option value="5">5(excellent)</option>
	
	</select><br>
	<input type="submit" name="insert_feedback" value="feedback">

</div>
</form>
		<div id="img_container">
		<h3 style="color:#425298;4px;text-shadow:none;">Customer images</h3>
			<?php
					$query=$con->prepare("select *from feedback where pet_id='".$_GET['id']."' order by 1 desc LIMIT 0,10");
					$query->execute();
					
					while($row1=$query->fetch()):
					
						echo"<ul>
							<li>
							
								<a href='feedback/".$row1['feed_img']."'><img src='feedback/".$row1['feed_img']."' style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;width:100px;height:100px;border-radius:4px;'></a>
								</li>
						</ul>";
					
					endwhile;
	

		?>
		
		
		</div>
		<div id="review">
			<?php
					$query=$con->prepare("select *from feedback where pet_id='".$_GET['id']."' order by 1 desc");
					$query->execute();
					
					while($row1=$query->fetch()):
						$usrid=$row1['user_id'];
						
						$getfeedbackid=$row1['feedback_id'];
						$query222=$con->prepare("select *from feedback_reply where feedback_id='$getfeedbackid'");
							$query222->execute();
							$countfeedback=$query222->rowCount();
						$query1=$con->prepare("select *from newuser where id='$usrid'");
						$query1->execute();
								while($row2=$query1->fetch()):
							echo"<ul>
							<li>
								<img src='userphotos/".$row2['user_img']."' style='width:140px;height:140px;border-radius:90px;margin-top:10px;float:left;margin-left:-10px;'>
								</li>
								<li><label style='float:left; margin-top:160px;margin-left:-100px;font-size:20px;'>".$row2['username']."</label></li>
							
							<li style='padding-top:50px;padding-left:200px;font-size:20px;'>".$row1['rating']." Star <b style='margin-left:20px;'>".$row1['feed_date']."</b></li>
							<li style='padding-top:10px;padding-left:200px;font-size:20px;'>".$row1['feed_desc']."</li>
							<li style='padding-top:55px;padding-left:200px;'><a href='comment.php?feedback_id=".$row1['feedback_id']."' style='text-decoration:none;font-size:20px;color:#400040;border:1px solid #425298;padding:5px;border-radius:4px;'>Comment($countfeedback)</a>  <b style='margin-left:20px;'>||</b> <a href='helpful.php?feedback_id=".$row1['feedback_id']."' style='text-decoration:none;font-size:20px;color:#400040;margin-left:20px;border:1px solid #425298;padding:5px;border-radius:4px;'>Helpful</a></li>
							<li><a href='feedback/".$row1['feed_img']."'><img src='feedback/".$row1['feed_img']."' style='width:320px;height:190px;float:right;margin-top:-190px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;'></a></li>
							</ul>";
					
					endwhile;
					endwhile;
	

		?>
		
		</div>
		
</body>
</html>
