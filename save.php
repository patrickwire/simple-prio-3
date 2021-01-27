<?php
require_once("config.php");
require_once("data.php");
file_put_contents($LOOTFILE, $_POST["name"].",".$_POST["prio1"].",".$_POST["prio2"].",".$_POST["prio3"]."\n", FILE_APPEND | LOCK_EX);
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
    <h1>Loot Gespeichert</h1>
    <tbody>
        <tr>
            <td>Name:</td>
            <td><?php echo $_POST["name"]?></td>
        </tr>
        <tr>
        <tr>
            <td>Prio1:</td>
            <td id="prio1">
                <a href="#"  data-wowhead="domain=de.classic&item=<?php echo  $_POST["prio1"] ?>">
                <?php 
            echo findItem($_POST["prio1"])[2]; 
            ?></a></td>
        </tr>
        <tr>
            <td>Prio2:</td>
            <td id="prio1">
            <a href="#"  data-wowhead="domain=de.classic&item=<?php echo  $_POST["prio2"] ?>">
                <?php 
            echo findItem($_POST["prio2"])[2]; 
            ?></a></td>
        </tr>
        <tr>
            <td>Prio3:</td>
            <td id="prio1">
            <a href="#"  data-wowhead="domain=de.classic&item=<?php echo  $_POST["prio3"] ?>">
                <?php 
            echo findItem($_POST["prio3"])[2]; 
            ?></a></td>
        </tr>
    </tbody>
</table>

<table>
<a href="overview.php">zur Übersicht</a>
<script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
</body>
</html>