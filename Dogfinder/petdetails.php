<html>
<head>
<style>

*{margin:0%;}

body{background:#425298;}
#mainact{width:1000px;height:auto;background:#fff;margin-left:160px;box-shadow:5px 5px 5px #400040;border:2px solid #400040;}

#mainact h1{text-align:center;color:#fff;background:#400040;border-radius:4px;border:2px solid #fff;}
#mainact table{margin-left:200px;}
#mainact table tr td{font-size:25px;padding:5px;font-weight:bold;}
#mainact table tr td input{font-size:20px;padding:5px;width:300px;height:40px;border-radius:4px;border:2px solid aquamarine;margin-left:50px;}

</style>


</head>
<body>
<?php include("menubaradmin.php")?>

<form method="post" enctype="multipart/form-data">
<div id="mainact">
	<h1>Add New Pet Details</h1>
	<table>
	<tr>
	<td>Enter Pet type  :</td>
	<td><input type="text" name="pettype" placeholder="Enter the pet type"></td>
	</tr>
	<tr>
	<td>Enter Pet name  :</td>
	<td><input type="text" name="petname" placeholder="Enter the pet name"></td>
	</tr>
	<tr>
	<td>Enter Pet color  :</td>
	<td><input type="text" name="petcolor" placeholder="Enter the pet color"></td>
	</tr>
	<tr>
	<td>Enter Pet Rate  :</td>
	<td><input type="text" name="petrate" placeholder="Enter the pet Rate"></td>
	</tr>
	<tr>
	<td>Enter Pet keywords  :</td>
	<td><input type="text" name="petkeyword" placeholder="Enter the pet keywords"></td>
	</tr>
	<tr>
	<td>Enter Pet Feature1  :</td>
	<td><input type="text" name="petfeature1" placeholder="Enter the pet feature1"></td>
	</tr>
	<tr>
	<td>Enter Pet Feature2  :</td>
	<td><input type="text" name="petfeature2" placeholder="Enter the pet feature2"></td>
	</tr>
	<tr>
	<td>Enter Pet image1  :</td>
	<td><input type="file" name="petimg1"></td>
	</tr>
	<tr>
	<td>Enter Pet image2  :</td>
	<td><input type="file" name="petimg2"></td>
	</tr>
	<tr>
	<td>Enter Pet image3  :</td>
	<td><input type="file" name="petimg3"></td>
	</tr>
	<tr>
	<td>Enter Pet image4  :</td>
	<td><input type="file" name="petimg4"></td>
	</tr>
	<tr>
	<td>Enter Pet Foods  :</td>
	<td><input type="text" name="petfoods" placeholder="Enter the pet foods"></td>
	</tr>
	
	</table>
		<input type="submit" name="click" value="Add details" style="margin-top:20px;margin-bottom:20px;font-size:20px;margin-left:500px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#fff;">
</div>

</form>
</body>
</html>
<?php

		if(isset($_POST['click']))
		{
		include("db.php");
		
		$pettype=$_POST['pettype'];
		$petname=$_POST['petname'];
		$petcolor=$_POST['petcolor'];
		
		$petrate=$_POST['petrate'];
		$petfeature1=$_POST['petfeature1'];
		$petfeature2=$_POST['petfeature2'];
		$petkeyword=$_POST['petkeyword'];
		$petimage1=$_FILES['petimg1']['name'];
			$pet_img1_temp=$_FILES['petimg1']['tmp_name'];
			
			
			
			
			move_uploaded_file($pet_img1_temp,"petphotos/$petimage1");	
			$petimage2=$_FILES['petimg2']['name'];
			$pet_img2_temp=$_FILES['petimg2']['tmp_name'];
			
			
			
			
			move_uploaded_file($pet_img2_temp,"petphotos/$petimage2");	
		
$petimage3=$_FILES['petimg3']['name'];
			$pet_img3_temp=$_FILES['petimg3']['tmp_name'];
			
			
			
			
			move_uploaded_file($pet_img3_temp,"petphotos/$petimage3");	
		
			$petimage4=$_FILES['petimg4']['name'];
			$pet_img4_temp=$_FILES['petimg4']['tmp_name'];
			
			
			
			
			move_uploaded_file($pet_img4_temp,"petphotos/$petimage4");	
			
			$petfoods=$_POST['petfoods'];
			
			$query=$con->prepare("insert into petdetails(pet_type,pet_name,pet_color,pet_Rate,pet_keywords,pet_features1,pet_features2,pet_img1,pet_img2,pet_img3,pet_img4,pet_foods)values('$pettype','$petname','$petcolor','$petrate','$petkeyword','$petfeature1','$petfeature2','$petimage1','$petimage2','$petimage3','$petimage4','$petfoods')");
			
			if($query->execute())
			{
				echo"<script>alert('stored pet details')</script>";
			}
			else
			{
				echo"<script>alert('not stored pet details')</script>";
			
			}
			
			
			
			
		

		

		}
?>