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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Wool Street: <?=getTitle($item)?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/item.css">
    </head>
    <body>
        <?php if(!isset($_GET["iframe"])){include("../source/navbar.html");} ?>
        <div class="content">
            
            <div class="item-div">
                <div class="item-imageContainer">
                    <?php
                        foreach(getAllImagePaths($item) as $key => $image){
                            echo "<img class='item-image' src='$image' alt='Item image number $key'>";
                        }
                    ?>
                </div>
                <button class="item-closeButton" onclick="window.top.postMessage('close', '*')">x</button>
                <div class="item-textContainer">
                    <div class="item-title"><?=getTitle($item)?></div>
                    <div class="item-description">
                        <p><?=getSmallDetails($item)?></p>
                    </div>
                </div>
            </div>

        </div>  
    </body>
    <script src="/js/expand.js"></script>
</html>