<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Projektmunka design</title>
</head>
<body>
    <?php 
        require "menu.php";
    ?>
   


    <?php
    /*
        kell egy tömb amiben eltárolom az include-olható oldalat, hogy csak azokat lehessen meghívni, ne lehessen "exploit-olni a szerver fájlokat"
    */

    
      if (isset($_GET['s'])) {
          include $_GET['s'];
      } else include("fooldal.php");
      ?>
      
    
</body>
</html>