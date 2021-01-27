<?php
session_start();
require_once("config.php");
require_once("data.php");
if($_POST["reset"]=="yes"&&$_SESSION["admin"]){
    file_put_contents ($LOOTFILE,"");
    echo "reseted";
}
if(isset($_POST["raid"])&&$_SESSION["admin"]){
    file_put_contents ($LOOTFILE,"");
    file_put_contents ("config.php","\$RAID='".$_POST["raid"]."';",FILE_APPEND | LOCK_EX);
    echo "changed";
}
if(isset($_POST["show"])&&$_SESSION["admin"]){
   
    file_put_contents ("config.php","\$PUBLIC=".$_POST["show"].";",FILE_APPEND | LOCK_EX);
    echo "changed";
}
if($_POST["password"]==$PASSWORD){
    $_SESSION["admin"]=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php 
  if(!$_SESSION["admin"]){
?><h4>Password</h4>
     <form method="post">
     <input name="password">
     <input type="submit">
     </form>
      <?php
     } else{

        ?>
        <div id="container">
        <form method="post"> 
       
            <select name="raid">
                <option><?php echo $RAID; ?></option>
                <option>zg</option>
                <option>aq20</option>
                <option>aq40</option>
                <option>bwl</option>
                <option>mc</option>
                <option>nax</option>
                <option>ony</option>
            </select>
            <input type="submit" onclick="return confirm('Are you sure?')" value="Raid Ändern"> 
        </form>
        <form method="post"> 
       
            <select name="show">
                
                <option value="true">Anzeigen</option>
                <option <?php echo $PUBLIC?"":"selected" ?> value="false">Verbergen</option>
              
            </select>
            <input type="submit" onclick="return confirm('Are you sure?')" value="Ändern"> 
        </form>
        <form method="post">
            <input type="hidden" name="reset" value="yes">
            <input type="submit" onclick="return confirm('Are you sure?')" value="Liste zurücksetzen">
        </form>
        <?php
         echo "<table><h1>Prios</h1>";

         echo '<a href="download.php">Download</a><br>';
        
        if (($handle = fopen($LOOTFILE, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                
               echo '<tr><td>';
               echo $data[0];
               echo '</td><td style="color:'.findItem($data[1])[1].'"><a href="#" data-wowhead="domain=de.classic&item='.$data[1].'&domain=de.classic">';
               echo findItem($data[1])[2];
             
               echo '</a></td><td style="color:'.findItem($data[2])[1].'"><a href="#" data-wowhead="domain=de.classic&item='.$data[1].'">';
               echo findItem($data[2])[2];
             
               echo '<a/></td><td style="color:'.findItem($data[3])[1].'"><a href="#" data-wowhead="domain=de.classic&item='.$data[1].'">';
               echo findItem($data[3])[2];
             
               echo '</a></td>';
              
               
               echo "</tr>";
        
            }
            fclose($handle);
        }

     }
      ?>
   <script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
</body>
</html>