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

    <p class="p-none">None<p>
    <p class="p-coarse">coarse<p>
    <p class="p-fine">fine<p>
	
	<?php include("../source/footer.html")?>
</body>
    <script src="/js/navbar.js"></script>
	<script src="/js/expand.js"></script>
	<style>
		.navbar{
			background: black;
        }
        
		.p-none{
			display: none;
		}
		.p-coarse{
			display: none;
		}
		.p-fine{
			display: none;
		}

        @media (pointer: none){
            .p-none{
                display: initial;
            }
        }
        @media (pointer: coarse){
            .p-coarse{
                display: initial;
            }
        }
        @media (pointer: fine){
            .p-fine{
                display: initial;
            }
        }
	</style>
</html>