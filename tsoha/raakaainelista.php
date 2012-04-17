<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Raaka-aineet</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Raaka-aineet</div>
<div id="container">
<div id="navipalkki">
<ul id="navi">
  <li><a href="index.html">Etusivu</a></li>
</br>
  <li><a href="hakusivu.html">Hae reseptejä ja ateriakokonaisuuksia</a></li>
</br>
  <li><a href="lisaaresepti.php">Lisää uusi resepti</a></li>
  <li><a href="lisaaateria.php">Lisää uusi ateriakokonaisuus</a></li>
</br>
  <li><a href="lisaajuoma.html">Lisää uusi juoma</a></li>
  <li><a href="raakaainelisays.html">Lisää uusi raaka-aine</a></li>
  <!--<li><a href="kirjautumissivu.html">Kirjaudu sisään</a></li>
  <li><a href="rekisterointi.html">Rekisteröidy asiakkaaksi</a></li>-->


</ul>
</div>
<div id="sisalto"> Kaikki raaka-aineet:


<?php

// yhteyden muodostus tietokantaan
include("yhteys.php");

// kyselyn suoritus
$kysely = $yhteys->prepare("SELECT nimi FROM raakaaine ");
$kysely->execute();

// haettujen rivien tulostus
echo "<table border>";
while ($rivi = $kysely->fetch()) {
    echo "<tr>";
    echo "<td>" . $rivi["nimi"] . "</td>";
   // echo "<td>" . $rivi["raakaaineid"] . "</td>";
     echo "</tr>";
}
echo "</table>";

?>

</body>
</html>
