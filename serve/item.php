<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Wool Street: Joints</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/item.css">
    </head>
    <body>
        <?php if(!isset($_GET["iframe"])){include("../source/navbar.html");} ?>
        <div class="content">
            <?php
            include("../source/items.php");

            if(!isset($_GET["item"])){
                header('Location: /items.php');
                exit;
            }
            
            $item = getItemById($_GET["item"]);
            if($item === false){
                header('Location: /items.php');
                exit;
            }

            echo '
                <div class="item-div">
                    <div class="item-imageContainer">
                        <img class="item-image" src="'.getMainImagePath($item).'" />
                    </div>
                    <button class="item-closeButton" onclick="contract(this.parentElement)">x</button>
                    <div class="item-title">'.getTitle($item).'</div>
                    <div class="item-description">
                        <p>'.getSmallDetails($item).'</p>
                        <button class="item-infoButton" onclick="expand(this.parentElement.parentElement)">info</button>
                    </div>
                </div>
            ';
            ?>
        </div>  
    </body>
    <script src="/js/expand.js"></script>
</html>