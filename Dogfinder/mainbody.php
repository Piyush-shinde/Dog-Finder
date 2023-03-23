<!DOCTYPE html>
<html>
<head>
<style>
body{background:#fff;}

#pet ul li{box-shadow:5px 5px 5px #400040;width:300px;height:350px;background:#fff;float:left;margin-top:30px;margin-left:20px;list-style-type:none;border:1px solid #000;border-radius:4px;}
#pet ul li a{text-decoration:none;color:#000;}
#pet1 ul li{box-shadow:5px 5px 5px #400040;width:300px;height:350px;background:#fff;float:left;margin-top:30px;margin-left:20px;list-style-type:none;border:1px solid #000;border-radius:4px;}
#pet1 ul li a{text-decoration:none;color:#000;}

</style>
</head>
<body>
<?php
		include("db.php");
		$query=$con->prepare("select *from petdetails where pet_type='pug' order by 1 desc LIMIT 0,4");
		$query->execute();
		echo"<div id='pet'>
<h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:20px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>Pug</h1>";
		while($row=$query->fetch()):
		
			echo"<ul>
				<li><a href='viewdetails.php?id=".$row['pet_id']."'>
					<h1 style='text-align:center;'>".$row['pet_name']."</h1>
					<img src='petphotos/".$row['pet_img1']."' style='width:260px;height:250px;margin-left:20px;border-radius:4px;'>
					<h1 style='text-align:center;font-size:20px;font-weight:normal;margin-top:10px;'>Rate (Rs.  ".$row['pet_rate'].")</h1>
				</a></li>
			</ul>";
		
		endwhile;
	


echo"</div><br>";
$query=$con->prepare("select *from petdetails where pet_type='labrador' order by 1 desc LIMIT 0,4");
		$query->execute();
		echo"<div id='pet1'>
<h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:400px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>Labrador</h1>";
		while($row=$query->fetch()):
		
			echo"<ul>
				<li><a href='viewdetails.php?id=".$row['pet_id']."'>
					<h1 style='text-align:center;'>".$row['pet_name']."</h1>
					<img src='petphotos/".$row['pet_img1']."' style='width:260px;height:250px;margin-left:20px;border-radius:4px;'>
					<h1 style='text-align:center;font-size:20px;font-weight:normal;margin-top:10px;'>Rate (Rs.  ".$row['pet_rate'].")</h1>
				</a></li>
			</ul>";
		
		endwhile;
	


echo"</div>";

$query=$con->prepare("select *from petdetails where pet_type='husky' order by 1 desc LIMIT 0,4");
		$query->execute();
		echo"<div id='pet1'>
<h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:400px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>Husky</h1>";
		while($row=$query->fetch()):
		
			echo"<ul>
				<li><a href='viewdetails.php?id=".$row['pet_id']."'>
					<h1 style='text-align:center;'>".$row['pet_name']."</h1>
					<img src='petphotos/".$row['pet_img1']."' style='width:260px;height:250px;margin-left:20px;border-radius:4px;'>
					<h1 style='text-align:center;font-size:20px;font-weight:normal;margin-top:10px;'>Rate (Rs.  ".$row['pet_rate'].")</h1>
				</a></li>
			</ul>";
		
		endwhile;
	


echo"</div>";

$query=$con->prepare("select *from petdetails where pet_type='dobermann' order by 1 desc LIMIT 0,4");
		$query->execute();
		echo"<div id='pet1'>
<h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:400px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>Dobermann</h1>";
		while($row=$query->fetch()):
		
			echo"<ul>
				<li><a href='viewdetails.php?id=".$row['pet_id']."'>
					<h1 style='text-align:center;'>".$row['pet_name']."</h1>
					<img src='petphotos/".$row['pet_img1']."' style='width:260px;height:250px;margin-left:20px;border-radius:4px;'>
					<h1 style='text-align:center;font-size:20px;font-weight:normal;margin-top:10px;'>Rate (Rs.  ".$row['pet_rate'].")</h1>
				</a></li>
			</ul>";
		
		endwhile;
	


echo"</div>";

?>
</body>
</html>