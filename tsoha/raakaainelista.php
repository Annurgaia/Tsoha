<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=ISO-8859-1">
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
  <li><a href="hakusivu.html">Hae reseptej‰ ja ateriakokonaisuuksia</a></li>
</br>
  <li><a href="lisaaresepti.php">Lis‰‰ uusi resepti</a></li>
  <li><a href="lisaaateria.php">Lis‰‰ uusi ateriakokonaisuus</a></li>
</br>
  <li><a href="lisaajuoma.html">Lis‰‰ uusi juoma</a></li>
  <li><a href="raakaainelisays.html">Lis‰‰ uusi raaka-aine</a></li>
  <!--<li><a href="kirjautumissivu.html">Kirjaudu sis‰‰n</a></li>
  <li><a href="rekisterointi.html">Rekisterˆidy asiakkaaksi</a></li>-->


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
