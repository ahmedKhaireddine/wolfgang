<?php

if(! function_exists('page_title')){
    function page_title($title){
        $baseName = "WolfGang - Boutique Moto";
        if($title != ''){
            return $title . ' | ' . $baseName;
        }else{
            return $baseName;
        }
    }
}

if(! function_exists('set_active_route')){
    function set_active_route($route){

        return Route:: is($route) ? 'active' : '';
        
    }
}