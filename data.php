<?php
require_once("config.php");
function findItem($itemID){
    global $RAID;
    if (($handle = fopen("data/".$RAID.".csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
         if($data[0]==$itemID){
            fclose($handle);
             return $data;
         }
    
        }
        fclose($handle);
    }
}

?>