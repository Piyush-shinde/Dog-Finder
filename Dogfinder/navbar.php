<html>
<head>
	<title>onlie.store.com</title>
	
</head>

<style>
#navbar{overflow:hidden; width:100%;height:40px;background:#400040;}


#navbar ul{list-style-type:none;margin-left:1%;}

#navbar ul li{ float:left;width:13%;text-align:center;margin-top:-10px;}

#navbar ul li a{text-decoration:none;color:#fff;font-size:17px; text-shadow:5px 5px 5px #000;}


#navbar ul li:hover{background:#800080; border-top:3px solid #fff;}




#navbar ul{padding-left:2%;margin-top:20px;}
#navbar li ul{display:none !important;}

#navbar li:hover ul{box-shadow:5px 5px 5px #2e2e2e;margin-top:-3px;margin-left:0px;padding-left:0%;background:#400040;display:block !important;width:200px;z-index:999;position:absolute;}

#navbar li ul li{float:none;height:35px;width:190px;line-height:35px;padding-left:5%;margin-left:0%;text-align:left;}

#navbar li ul li a{display:block;}
#navbar li:hover li{display:block;animation:navmenu 500ms forwards;}
#navbar li:hover{display:block;animation:navmenu 500ms forwards;}
@keyframes navmenu
{
	0%
	{
		opacity:0;
		top:5px;
	}
	100%
	{
		opacity:1;
		top:0px;
	}
}



</style>

<body>
<div id="navbar">
				
					<ul>
					
						
							
							<li><a href="#">CATEGORIES</a>
							
								<ul>
									<?php
										include("db.php");
							
											$all_cat=$con->prepare("select * from categorie");

											$all_cat->setFetchMode(PDO:: FETCH_ASSOC);
											$all_cat->execute();

											while($row_id=$all_cat->fetch()):
												
												echo"<li><a href='catg_detail.php?catgeri_id=".$row_id['catname']."'>".$row_id['catname']."</a></li>";
											
											endwhile;
										
										
										?>

								</ul>
							</li>
						
						
						
						
								
								<li><a href="#">Birthday</a>
								
								<ul>
								
									<li><a href="cat_detail.php?bd_men">Men</a></li>
									<li><a href="cat_detail.php?bd_women">Women</a></li>
									<li><a href="cat_detail.php?bd_kids">kids</a></li>
								
								
								</ul>
								
								
								
								
								</li>
								
								
								<li><a href="#">Gift For Him</a>
								
								<ul>
								
									<li><a href="cat_detail.php?men_watch">Watch</a></li>
									<li><a href="cat_detail.php?men_belt">Belt</a></li>
									<li><a href="cat_detail.php?men_perfumes">Perfumes</a></li>
								
								
								</ul>
								
								
								</li>
								
								
								
								<li><a href="#">Gift For Her</a>
								
								<ul>
								
									<li><a href="cat_detail.php?women_watch">Watch</a></li>
									<li><a href="cat_detail.php?women_belt">Belt</a></li>
									<li><a href="cat_detail.php?women_perfumes">Perfumes</a></li>
								
								
								</ul>
								
								</li>
								<li><a href="#">Flowers</a></li>
								<li><a href="#">Gift For Kids</a>
							
								<ul>
								
									<li><a href="cat_detail.php?kids_watch">Watch</a></li>
									<li><a href="cat_detail.php?kids_belt">Belt</a></li>
									<li><a href="cat_detail.php?kids_game">Games</a></li>
								
								
								</ul>
								
								
								
								</li>
								<li><a href="#">Brand</a></li>
						
					</ul>
				
			</div><!--end of navbar-->
</body>
</html>