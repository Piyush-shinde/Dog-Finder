<html>
<head>

<style>
*{margin:0%;}

body{background:#425298;}
h1{text-align:center;color:#fff;background:#400040;border-radius:4px;border:2px solid #fff;margin-top:50px;}


table{width:90%;height:auto;margin-left:30px;border-radius:10px;margin-top:5px;background:#fff;}
table,th,tr,td{border-collapse:collapse;border:1px solid #400040;padding:5px;}
table td{text-align:center;font-size:20px;color:#400040;}
table th{font-size:23px;color:#400040;}
img{width:50px;height:50px;}
</style>
</head>
<body>
<?php include("menubaradmin.php")?>

	<h1>View All Pet Details</h1>
	<form method="post">
	<input type="text" name="search" placeholder="enter the name to search..." style="margin-left:60px;margin-top:10px;border-radius:4px;border:1px solid aquamarine;width:300px;height:40px;padding-left:5px;font-size:20px;">
	<input type="submit" name="search_btn" value="search" style="background:#fff;margin-left:10px;margin-top:10px;border-radius:4px;border:1px solid aquamarine;width:100px;height:40px;font-size:20px;">
	</form>
	<table>
<tr>
<th>Serial No</th>
<th>Edit</th>
<th>Delete</th>
	<th>PetName</th>
	<th>petType</th>
	<th>petColor</th>
	<th>petRate</th>
	<th>petKeywords</th>
	<th>petFeature1</th>
	<th>petFeature2</th>
	<th>petImages</th>
	<th>petFoods</th>

</tr>
<?php
			include("db.php");
			
			if(!isset($_POST['search_btn']))
			{
				$query=$con->prepare("select * from petdetails order by 1 desc");
			
				$query->execute();
			}
			if(isset($_POST['search_btn']))
			{
				$getdata=$_POST['search'];
				$query=$con->prepare("select * from petdetails where pet_name like '%$getdata%'");
			
				$query->execute();
			}
			$i=1;
			while($row=$query->fetch()):
			
			echo"<tr><td>".$i++."</td>
			<td><a href='edit_petdetils.php?id=".$row['pet_id']."'>Edit</td>
				
				<td><a href='delete_petdetils.php?id=".$row['pet_id']."'>Delete</td>
			
				<td>'".$row['pet_name']."'</td>
			<td>'".$row['pet_type']."'</td>
			<td>'".$row['pet_color']."'</td>
			<td>'".$row['pet_rate']."'</td>
			<td>'".$row['pet_keywords']."'</td>
			<td>'".$row['pet_features1']."'</td>
			<td>'".$row['pet_features2']."'</td>
			<td><img src='petphotos/".$row['pet_img1']."'><img src='petphotos/".$row['pet_img2']."'><img src='petphotos/".$row['pet_img3']."'><img src='petphotos/".$row['pet_img4']."'></td>
			<td>'".$row['pet_foods']."'</td>
			
			
			
			</tr>";
			
			
			endwhile;



?>
</table>
</body>
</html>