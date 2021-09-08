<?php
session_start();

?>





<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->

<!-- //Custom Theme files -->
<!-- web font -->
<link href="style/font.css" rel="stylesheet">
<link href="style/style.css" rel="stylesheet" type="text/css" media="all">
<link href="style/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">





<!-- //web font -->
</head>
<body>
    <style>
        input{
            margin: 2em;
        }
    </style>

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>
            Upload Your Product
			<?php
				echo $_SESSION['username'];
			?>
		</h1>
		
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="php/uploaditem.php" method="post" id="uploadform">
					<input id="title" class="text"  type="text" name="title" placeholder="title" required="">
					<input id="description" class="text" type="text" name="description" placeholder="description" required="">
					<input id="customFile" type="file" class="text-white btn" name="image"  />
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input id="submit"type="submit" value="UPLOAD">
				</form>
				<p><a href="home.php"> BACK </a>To My Lands </p>
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
	<script src="js/jquery.min.js"></script>
	<script src="js/signup.js" type="text/javascript"></script>
	

	
</body>
</html>