<?php
require_once("config.php");
require_once("data.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prio 3</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
<div id="container">


<table>
<h1>Saved Users</h1>
<?php
if($PUBLIC){
    echo '<a href="download.php">Download</a><br>';
}
if (($handle = fopen($LOOTFILE, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $list[$data[0]]=$data;
        
}

        foreach ($list as $data){
        
       echo '<tr><td>';
       echo '<span style="color:green">&#10003; </span> ';
       echo $data[0];
       if($PUBLIC){
       echo '</td><td style="color:'.findItem($data[1])[1].'"><a href="#" data-wowhead="domain=de.classic&item='.$data[1].'&domain=de.classic">';
       echo findItem($data[1])[2];
     
       echo '</a></td><td style="color:'.findItem($data[2])[1].'"><a href="#" data-wowhead="domain=de.classic&item='.$data[1].'">';
       echo findItem($data[2])[2];
     
       echo '<a/></td><td style="color:'.findItem($data[3])[1].'"><a href="#" data-wowhead="domain=de.classic&item='.$data[1].'">';
       echo findItem($data[3])[2];
     
       echo '</a>';

       }
       echo '</td></tr>';

    }
    fclose($handle);
}
?>
</table>
<script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
</body>
</html>