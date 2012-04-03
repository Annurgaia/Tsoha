<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Resepti</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Reseptit</div>
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
<div id="sisalto">Kaikki reseptit:


<?php

// yhteyden muodostus tietokantaan

include("yhteys.php");
$tulos = $_GET['reseptihaku'];
echo $tulos;
// kyselyn suoritus
$kysely = $yhteys->prepare("SELECT nimi, yleiskuvaus FROM resepti WHERE 
nimi like '%$tulos%' "); 

$kysely->execute();

//$result = $kysely->fetchAll();
//print_r($result);

// haettujen rivien tulostus
echo "<table border>";
echo '<tr><td>Nimi</td><td>Resepti</td></tr>';

while ($rivi = $kysely->fetch()) {
    
echo "<tr>";
      echo '<td><a href="resepti.php?nimi=' .$rivi["nimi"]. '">' . $rivi["nimi"] . ' </td>';
    echo '<td>' . $rivi["yleiskuvaus"] .' </td>';
   // echo '<td>' . $rivi["resepti"] .' </td>';
   // echo '<td>' . $rivi["juoma"] .' </td>';
    echo "</tr>";
}
echo "</table>";

?>

</div>
</div>
</body>
</html>
