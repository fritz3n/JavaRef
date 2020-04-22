<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ITEMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/favicon.png">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/navbar.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/path.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/footer.css">
    </head>
    <body>
        <?php include("../source/navbar.php") ?>
        <div class="content">
            <div class="path-container">
                <?php
                    include_once("../source/categories.php");

                    if(isset($_GET["path"]))
                        $segments = explode("/", filter_var($_GET["path"], FILTER_SANITIZE_STRING));
                    else
                        $segments = array("");

                    $fullpath = "";

                    foreach($segments as $index=>$segment){
                        $fullpath .= $segment;
                        $category = getCategoryByPath($fullpath);

                        if($category !== false)
                            echo "<a class='path' href='?path=".$category->path."'>".$category->name."</a>";

                        $fullpath .= "/";
                    }
                ?>
            </div>
            <div class="item-container">
                <iframe id="item-frame"></iframe>

                <?php
                include("../source/items.php");

                if(isset($_GET["path"]))
                    $items = getItemsByPath(filter_var($_GET["path"], FILTER_SANITIZE_STRING));
                else
                    $items = getItems();
                

                foreach($items as $item){
                    echo '
                    <div class="item-div" onclick=\'expand("'.((string)$item->id).'")\'>
                        <div class="item-imageContainer">
                            <img class="item-image" src="'.getMainImagePath($item).'" />
                        </div>
                        <button class="item-closeButton" onclick="contract(this.parentElement)">x</button>
                        <div class="item-title">'.getTitle($item).'</div>
                        <div class="item-description">
                            <p>'.getSmallDetails($item).'</p>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>  
        <?php include("../source/footer.html")?>
    </body>
    <script src="/js/expand.js"></script>
    <script src="/js/navbar.js"></script>
    <script>
        <?php 
            if(isset($_GET["item"])){
                $item = filter_var($_GET["item"], FILTER_SANITIZE_STRING);
                echo "expand('".$item."', false);";
            }
        ?>
    </script>
</html>