<?php

	if(isset($_GET['feedback_id']))
	{
		include("db.php");
		$feedback_id=$_GET['feedback_id'];
		$query=$con->prepare("select *from feedback where feedback_id='$feedback_id'");
		
		$query->execute();
		
		$row21=$query->fetch();
		
		$query1=$con->prepare("select *from petdetails where pet_id='".$row21['pet_id']."'");
		
		$query1->execute();
		$row1=$query1->fetch();
		
		$query11=$con->prepare("select *from newuser where id='".$row21['user_id']."'");
		
		$query11->execute();
		$row11=$query11->fetch();
	}


?>
<!DOCTYPE html>
<html>
<head>
<style>
#feedback{border:2px solid #425298;width:400px;height:200px;background:#fff;margin-left:80px;margin-top:auto;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;}
#feedback textarea{margin-top:20px;margin-left:30px;width:250px;height:70px;border-radius:4px;}

#feedback input[type=submit]{margin-top:25px;margin-left:130px;padding:10px;border-radius:4px;background:#425298;color:#fff;border:1px solid #fff;}

#feedback input[type=submit]:hover{margin-top:25px;margin-left:130px;padding:10px;border-radius:4px;background:#fff;color:#425298;border:1px solid #425298;}

#reply{width:100%;height:230px;background:#fff;margin-top:5px;border-radius:4px;text-shadow: 5px 5px 5px #fff;box-shadow: 3px 3px 3px #000;font-size:20px;font-weight:bold;}
#reply ul li{list-style-type:none;}
</style>
</head>
<body>
<?php

		include("header_index.php");
?>
	<h1>Comment for <b style="color:red;"><?php echo"".$row1['pet_name'].""; ?></b></h1>
	<a href="petphotos/<?php echo"".$row1['pet_img1']."";?>"><img src="petphotos/<?php echo"".$row1['pet_img1']."";?>" style="margin-left:20px;margin-top:20px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;"></a>
	<hr>
	<div id="commentbox">
		<img src="userphotos/<?php echo"".$row11['user_img'].""; ?>" style="width:200px;height:200px;border-radius:90px;margin-left:20px;margin-top:20px;">
	<br>	<label style="float:left;padding-left:100px;font-size:20px;"><?php echo"".$row11['username']."";?></label>
			
			<br><label style="margin-left:150px;"><?php echo"".$row21['rating']."";?> Star <b style="margin-left:20px;"><?php echo"".$row21['feed_date']."";?></b> <b style="margin-left:20px;"><?php echo"".$row21['feed_desc']."";?></b></label>
	<br>
	<a href="feedback/<?php echo"".$row21['feed_img']."";?>"><img src="feedback/<?php echo"".$row21['feed_img']."";?>" style="width:300px;height:200px;border-radius:4px;text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;float:right;margin-right:40px;margin-top:-220px;"></a>
	
	<br>
			
			
			
			
			<hr></div><br>
			
			<div id="reply_box">
			<?php
						
					$query123=$con->prepare("select *from feedback_reply where feedback_id='$feedback_id'");
					
					$query123->execute();
					
					while($row25=$query123->fetch()):
					
						$getuseid=$row25['user_id'];
					$query1233=$con->prepare("select *from newuser where id='$getuseid'");
					
					$query1233->execute();
					while($row255=$query1233->fetch()):
								echo"<div id='reply'>
									<ul>
									<li style='text-align:center;'>
										".$row25['reply_desc']."
									</li>
									<li><img src='userphotos/".$row255['user_img']."' style='width:150px;height:150px;border-radius:90px;'></li>
									<li style='text-align:left;margin-left:40px;'>".$row255['username']."</li>
									<li style='text-align:center;'>".$row25['reply_date']."</li>
									</ul>
								
								
								</div>";
					
					endwhile;
					endwhile;
			?>
			</div>
	
	<form method="post" enctype="multipart/form-data">
	<br><div id="feedback">
	<h1 style="color:#425298;text-align:center;text-shadow:none;">Reply box</h1>
	<textarea name="desc" placeholder="give feedback for this pets"></textarea>
	<br>
	<input type="submit" name="insert_feedback" value="Reply">

</div>
</form>

	

</body>
</html>
<?php
if(isset($_POST['insert_feedback']))
	{	

				if(isset($_COOKIE['usernameget']))
				{
					
					$query12=$con->prepare("select *from newuser where username='".$_COOKIE['usernameget']."'");
						$query12->execute();
				
						$row22=$query12->fetch();
						
						$userid=$row22['id'];
					
						
						$desc=$_POST['desc'];
				
						
						
						
						$query=$con->prepare("insert into feedback_reply(user_id,feedback_id,reply_desc,reply_date)values('$userid','$feedback_id','$desc',Now())");
						if($query->execute())
						{
						
							echo"<script>alert('Feedback inserted')</script>";
							echo"<script>window.open('comment.php?feedback_id=".$_GET['feedback_id']."','_self')</script>";
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