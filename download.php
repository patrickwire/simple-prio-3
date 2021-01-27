<?php
session_start();
require_once("config.php");

if (($_SESSION["admin"]||$PUBLIC)&&($handle = fopen($LOOTFILE, "r")) !== FALSE) {
    $list=[];
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $list[$data[0]]=$data;
            
    }
    
    foreach ($list as $value){
        foreach($value as $item){
            echo $item;
            echo ",";
        }
        echo "\n";
    }
}else{
    echo "error";
}