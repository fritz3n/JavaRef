<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>EAT IT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/favicon.png">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/index.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/slideShow.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/footer.css">
</head>

<body>
	<div class="all">
		<?php include("../source/navbar.php") ?>

		<div class="banner-container">
			<video id="banner" autoplay loop muted>
				<source src="/video/v4.mp4" type="video/mp4" />
				Your browser does not support the video tag.
			</video>
			<div class="logo-container"><img class="banner-logo" src="/images/logo.png" alt="EAT IT" width=176 height=107></div>
		</div>
		<div class="grid">
			<div class="about">
				<?php include("../source/werwirsind.html") ?>
			</div>
			<div class="slideshow-container">
				<div class="slideshow">
					<?php
					include("../source/items.php");
					$items = getItems();
					$first = true;
					foreach($items as $item){
						echo '<a href="/items.php?item='.((string)$item->id).'">
						<img class="slideshow-slide'.($first ? " show" : "") .'" src="'.getMainImagePath($item).'" />
						</a>';
						$first = false;
					}
					?>
					<a class="prev" onclick="cycleSlideshow(-1)">&#10094;</a>
  					<a class="next" onclick="cycleSlideshow()">&#10095;</a>
				</div>
			</div>
		</div>

	</div>
	<?php include("../source/footer.html") ?>
</body>
<script src="/js/navbar.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="/js/slideShow.js"></script>
<style>
	.navbar {
		background: black;
	}
</style>

</html>