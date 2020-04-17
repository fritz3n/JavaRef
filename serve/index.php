<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wool Street</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/index.css">
</head>
<body>
	<?php include("../source/navbar.php") ?>

	<div class="banner-container">
		<video id="banner" autoplay loop muted>
			<source src="/video/v4.mp4" type="video/mp4" />
			Your browser does not support the video tag.
		</video>
		<div class="logo-container"><img class="banner-logo" src="/images/logo.png" alt="EAT IT" width=176 height=107></div>
	</div>
	
	<?php include("../source/footer.html")?>
</body>
    <script src="/js/navbar.js"></script>
	<script src="/js/expand.js"></script>
	<style>
		.navbar{
			background: black;
		}
	</style>
</html>