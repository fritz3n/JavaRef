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
                <div class="item-imageContainer" id="horizontalScroll">
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
    <script>
        function isHover(e) {
            return (e.parentElement.querySelector(':hover') === e);
        }
        (function() {
            function scrollHorizontally(e) {
                e = window.event || e;
                var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
                document.getElementById('horizontalScroll').scrollLeft -= (delta*40 * (isHover(document.getElementById('horizontalScroll')) ? 10 : 1)); // Multiplied by 40
                e.preventDefault();
            }
            if (document.getElementById('horizontalScroll').addEventListener) {
                // IE9, Chrome, Safari, Opera
                document.getElementById('horizontalScroll').addEventListener("mousewheel", scrollHorizontally, false);
                // Firefox
                document.getElementById('horizontalScroll').addEventListener("DOMMouseScroll", scrollHorizontally, false);
            } else {
                // IE 6/7/8
                document.getElementById('horizontalScroll').attachEvent("onmousewheel", scrollHorizontally);
            }
        })();
    </script>
</html>