<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Wool Street: Joints</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    </head>
    <body>
        <?php include("../source/navbar.html") ?>
        <div class="content">
            <iframe id="item-frame"></iframe>
            <?php
            include("../source/items.php");
            foreach(getItems()->item as $item){
                echo '<div class="item-container">
                    <div class="item-div">
                        <div class="item-imageContainer">
                            <img class="item-image" src="'.getMainImagePath($item).'" />
                        </div>
                        <button class="item-closeButton" onclick="contract(this.parentElement)">x</button>
                        <div class="item-title">'.getTitle($item).'</div>
                        <div class="item-description">
                            <p>'.getSmallDetails($item).'</p>
                            <button class="item-infoButton" onclick=\'expand("'.((string)$item->id).'")\'>info</button>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>  
    </body>
    <script src="/js/expand.js"></script>
</html>