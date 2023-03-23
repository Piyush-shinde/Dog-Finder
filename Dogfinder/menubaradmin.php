<style>

.navigationDeskop
{
background:#d33a2c;
margin-left:2px;margin-right:2px;margin-top:20px;
border-bottom:1px solid #fff;border-top:1px solid #fff;
border-radius:4px;
}

nav
{
	height:40px;
	
	display:block;
	margin:0 auto;
	text-align:left;
	text-transform:uppercase;
	text-shadow:15px 15px 15px #d33a2c;
}

nav a
{
	display:block;
	text-decoration:none;
	font-family:monospace;
	font-weight:bold;
	font-size:20px;
	color:#fff;

	padding-left:20px;
}

nav a:hover
{
	background:#223433;
	color:#f0f1f5;
	position:relative;
}

nav ul
{
	list-style:none;
}

nav ul li
{
	float:left;
	width:auto;
	height:40px;
	line-height:40px;
	background:none;
	margin:0%;
	margin-left:35px;
	
	
	
	
}

nav ul ul li
{
	position:relative;
	display:none;
	margin-left:0px;
	border-bottom:1px solid #000;
}

nav ul ul ul
{
	display:none;
	position:relative;
}


 nav ul li:hover ul li
 {
	display:block;
	animation:navmenu 500ms forwards;
	width:230px;
	position:relative;
	
 }

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

nav ul ul li:hover ul
{
	display:block;
	
	width:140px;
	left:230px;
	top:-40px;
	position:relative;
}
</style>
<div class="navigationDeskop">
			<nav>
				<ul>
					<li><a href="#">Home</a>					
					</li>
					<li><a href="petdetails.php">Add new </a>
						
					</li>
					<li><a href="viewallpetdetails.php">ViewAll</a>
						
					</li>
					<li><a href="index.php">Logout</a>
						
					</li>
					
				
				</ul>
			</nav>
		</div>