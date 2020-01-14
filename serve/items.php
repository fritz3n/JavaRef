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
            <?php

            

            echo '<div class="item-container">
                <div class="item-div">
                    <div class="item-imageContainer">
                        <img class="item-image" src="/images/Gummibaeren/Haribo/haribo1.jpg" />
                    </div>
                    <button class="item-closeButton" onclick="contract(this.parentElement)">x</button>
                    <div class="item-title">Haribo 600g</div>
                    <div class="item-description">
                        <p class="bold">Feinste Haribo Gummibären</p>
                        <p>Nettogewicht 600g</p>
                        <button class="item-infoButton" onclick="expand(this.parentElement.parentElement)">info</button>
                    </div>
                </div>
            </div>';
            ?>
        </div>  
    </body>
    <script src="/js/expand.js"></script>
</html>