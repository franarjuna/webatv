<?php
if(! empty(DEBUG)){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}else{
    error_reporting(0);
}

function printMetaTags($meta_tags)
{
    foreach($meta_tags as $key => $meta){ 
        $properties = '';
        foreach($meta as $name => $value){
            $properties .= ' '.$name.'="'.$value.'"';
        }   
        if(! empty($properties)) 
            echo '	<meta'.$properties.">\r\n"; 
    } 	   
}