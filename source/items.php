<?php

$item_path = "data/items.xml";
$missing_image_path = "missing.png";

function getItems(){
    global $item_path;
    return simplexml_load_file($item_path);
}

function getTitle($item){
    if(!isset($item->title))
        return "NO TITLE";
    else
        return $item->title;
}

function getMainImagePath($item){
    global $missing_image_path;

    $image = "/images";
    if(isset($item->main_image)){
        $image += $item->main_image; 
    }elseif(isset($item->images)){
        if(isset($item->images[0])){
            $image += $item->images[0];
        }else{
            $image += $missing_image_path;
        }
    }else{
        $image += $missing_image_path;
    }
    return $image;
}

function getAllImagesPath($item){
    global $missing_image_path;

    $image = "/images";
    if(isset($item->main_image)){
        $image += $item->main_image; 
    }elseif(isset($item->images)){
        if(isset($item->images[0])){
            $image += $item->images[0];
        }else{
            $image += $missing_image_path;
        }
    }else{
        $image += $missing_image_path;
    }
    return $image;
}

function getSmallDetails($item){
    if(isset($item->small_detail))
        return $item->small_detail;
    elseif(isset($item->large_detail))
        return $item->large_detail;
    else 
        return "NO DESCRIPTION AVAILABLE";
}

function getLargeDetails($item){
    if(isset($item->large_detail))
        return $item->large_detail;
    elseif(isset($item->small_detail))
        return $item->small_detail;
    else 
        return "NO DESCRIPTION AVAILABLE";
}