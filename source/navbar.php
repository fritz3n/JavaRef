<div class="navbar">
    <div class="brandcontainer">
        <button class="droparrow" onclick='toggleExpandNavbar(this)'><img src='/images/arrow.svg' alt='dropdown arrow' width=50 height=50/></button>
        <a class="brand" href="/">EAT IT</a>
    </div>
    <div class="navdropdown">
        <div class="backgroundcontainer">
            <div class="navcontainer">
            <a href='items.php'>Alle</a>
            <?php
                include_once(dirname(__FILE__)."/categories.php");

                function outputCategory($cat){
                    /*echo "<!--";
                    print_r($cat);
                    echo "-->";*/
                    $subCats = getSubCategoriesByPath($cat->path);
                    /*echo "<!--";
                    print_r($subCats);
                    echo "-->";*/

                    $level = substr_count($cat->path, "/");

                    if($subCats === false){
                        echo "<a href='items.php?path=".$cat->path."'>".$cat->name."</a>";
                    }else{
                        echo "<div class='dropdown'>
                            <div class='droparrow-container' onclick='toggleExpandDropdown(this)'><button class='droparrow small'><img src='/images/arrow.svg' alt='dropdown arrow'/></button></div>
                            <a class='dropbtn' href='items.php?path=".$cat->path."'>".$cat->name."</a>
                            <div class='dropdown-content'>";

                        foreach($subCats as $subCat){
                            if(substr_count($subCat->path, "/") == $level + 1)
                                outputCategory($subCat);
                        }

                        echo "</div>
                        </div>";
                    }
                }

                foreach(getCategories()->category as $cat){
                    if(substr_count($cat->path, "/") === 1){
                        outputCategory($cat);
                    }
                }
                
            ?>
            </div>
        </div>
    </div>
</div>