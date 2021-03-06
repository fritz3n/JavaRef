<?php

$item_path = "/data/items.xml";
$missing_image_path = "missing.png";



/**
 * @return SimpleXmlElement
 */
function getItems(){
    global $item_path;
    return simplexml_load_file(dirname(__FILE__).$item_path);
}

function getItemsByPath($path){
    if(substr($path, -1) !== "/")
        $path .= "/";
    return getItems()->xpath("/items/item[starts-with(category,'" . $path ."')]");
}

function getItemById($id){
    $items = getItems()->xpath("/items/item[id='" . $id ."']");
    if($items === false){
        return false;
    }else{
        return $items[0];
    }
}

function getTitle($item){
    if(!isset($item->title))
        return "NO TITLE";
    else
        return $item->title;
}

function getMainImagePath($item){
    global $missing_image_path;

    $image = "/images/";
    if(isset($item->main_image)){
        $image .= $item->main_image; 
    }elseif(isset($item->images)){
        if(isset($item->images[0])){
            $image .= $item->images[0];
        }else{
            $image .= $missing_image_path;
        }
    }else{
        $image .= $missing_image_path;
    }
    return $image;
}
/**
 * @param SimpleXmlElement $item
 */
function getAllImagePaths($item){
    global $missing_image_path;


    $images = array();

    if(isset($item->include_main_image) && $item->include_main_image == true && isset($item->main_image)){
        array_push($images, "/images/".((string)$item->main_image));
    }
    
    if(isset($item->images) && $item->images->count() > 0){
        foreach($item->images->image as $image){
            array_push($images, "/images/".((string)$image));
        }
    }

    if(count($images) == 0){
        array_push($images, "/images/".$missing_image_path);
    }

    return $images;
}

/**
 * Returns a small description of the item.
 * @param SimpleXmlElement $item
 */
function getSmallDetails($item){
    if(isset($item->small_detail))
        return $item->small_detail;
    elseif(isset($item->large_detail))
        return $item->large_detail;
    else 
        return "NO DESCRIPTION AVAILABLE";
}

/**
 * Returns a large description of the item.
 * @param SimpleXmlElement $item
 */
function getLargeDetails($item){
    if(isset($item->large_detail))
        return (string)$item->large_detail;
    elseif(isset($item->small_detail))
        return (string)$item->small_detail;
    else 
        return "NO DESCRIPTION AVAILABLE";
}