<?php

$category_path = "/data/categories.xml";


/**
 * @return SimpleXmlElement
 */
function getCategories(){
    global $category_path;
    return simplexml_load_file(dirname(__FILE__).$category_path);
}

function getCategoryByPath($path){
    $categories = getCategories()->xpath("/categories/category[path='" . $path ."']");
    if($categories === false){
        return false;
    }else{
        return $categories[0];
    }
}

function getSubCategoriesByPath($path){
    if(substr($path, -1) !== "/")
        $path .= "/";
    $categories = getCategories()->xpath("/categories/category[starts-with(path,'" . $path ."') and path!='".$path."']");
    if(count($categories) == 0)
        return false;
    else    
        return $categories;
}

