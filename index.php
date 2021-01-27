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
<form action="save.php" method="POST">
<div style="position: fixed;background:black;width:100%;max-width:600px;top:0;padding:20px;text-align:left">
<h1>Prio 3</h1>
<table >
  
    <tbody>
        <tr>
            <td>Name:</td>
            <td ><input required name="name"></td>
        </tr>
        <tr>
        <tr>
            <td>Prio1:</td>
            <td ><a href="#" id="prio1">keine Prio</a></td>
        </tr>
        <tr>
            <td>Prio2:</td>
            <td ><a href="#" id="prio2">keine Prio</a></td>
        </tr>
        <tr>
            <td>Prio3:</td>
            <td ><a href="#" id="prio3">keine Prio</a></td>
        </tr>
        <tr><td></td><td>
        <input name="prio1" type="hidden">
    <input name="prio2" type="hidden">
    <input name="prio3" type="hidden">
<input type="submit" name="Speichern">
        </td></tr>
    </tbody>
</table>
</div>

</form>

<table style="margin-top:130px">
<?php 
require_once("config.php");
function prioButton($item,$slot){
    echo '<button onClick="add('.$item[0].','.$slot.',\''.$item[1].'\',\''.$item[2].'\')">';
    echo "Prio ".$slot;
    echo "</button>";
}


if (($handle = fopen("data/".$RAID.".csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
       echo '<tr><td><a href="#" style="color:'.$data[1].'"data-wowhead="domain=de.classic&item='.$data[0].'">';
       echo $data[2];
       echo '</a></td><td>';
       prioButton($data,1);
       prioButton($data,2);
       prioButton($data,3);
       echo "</td></tr>";

    }
    fclose($handle);
}
?>
</table>
</div>
<a href="admin.php">admin</a>
</body>
<script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
<script>
    function add(itemId,slot,color,name){
        document.getElementById("prio"+slot).innerHTML=name
        document.getElementById("prio"+slot).setAttribute("data-wowhead","domain=de.classic&item="+itemId)
        document.getElementById("prio"+slot).style="color:"+color
        document.getElementsByName("prio"+slot)[0].value=itemId
    }
</script>
</html>


