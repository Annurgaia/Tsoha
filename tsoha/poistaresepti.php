<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type"
              content="text/html; charset=UTF-8">
        <title>Reseptinlisäys</title>
        <link href="tyyli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="otsikko">Reseptit</div>
        <div id="container">
            <div id="navipalkki">
                <?php include 'navi.html'; ?>
            </div>
            
<?php
//poistetaan ko. resepti kannasta

// yhteyden muodostus tietokantaan
include("yhteys.php");

$nimi = $_GET["nimi"];

// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM resepti WHERE nimi like '$nimi' ");
$kysely->execute();

echo ' Resepti poistettu...siirry';
echo ' <a href=index.php>etusivulle</a>';
?>
  </div>
        </div>
    </body>
</html>
