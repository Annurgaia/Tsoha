<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Reseptin muokkaaminen</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Reseptin muokkaus </div>

<div id="navipalkki">
<ul id="navi">
  <!--<li><a href="kirjautumissivu.html">Kirjaudu sisään</a></li>
  <li><a href="rekisterointi.html">Rekisteröidy asiakkaaksi</a></li>-->
</br>
  <li><a href="index.html">Etusivu</a></li>
</br>
  <li><a href="hakusivu.html">Hae reseptejä ja ateriakokonaisuuksia</a></li>
</br>
  <li><a href="lisaaresepti.php">Lisää uusi resepti</a></li>
  <li><a href="lisaaateria.php">Lisää uusi ateriakokonaisuus</a></li>
</br>
  <li><a href="lisaajuoma.html">Lisää uusi juoma</a></li>
  <li><a href="raakaainelisays.html">Lisää uusi raaka-aine</a></li>

</ul>
</div>
<div id="sisalto">Muokkaa reseptiä:


<?php

include("yhteys.php");

$kysely =$yhteys->prepare("SELECT nimi, resepti, yleiskuvaus FROM resepti
 WHERE nimi like '%$_GET[nimi]%' ");
$kysely->execute();  
$tulos = $kysely->fetch();

echo '<form name="intput" action="ateriamuokkaus.php" method="POST">';
echo '<p>Nimi: </br><input type="text" name="nimi" value="'.$tulos[nimi].'" readonly></p>';

echo '<p>Resepti: </br><textarea name="resepti" cols=40 rows=7>';
echo $tulos[resepti];
echo '</textarea></p>';

echo '<p>Yleiskuvaus: </br><textarea name="kuvaus" cols=40 rows=7>';
echo $tulos[yleiskuvaus];
echo '</textarea>';
echo '<p>Raaka-Aineet: </br></br>';


$kysely =$yhteys->prepare("SELECT raakaaineid, nimi FROM raakaaine");
$kysely->execute();


echo '  <select name="raakaaineid[]" multiple>';

while ($rivi = $kysely->fetch()) {

echo '  <option value=' .$rivi[raakaaienid]. ' >'.$rivi[nimi]. '</option>';
  }
echo '</select></br> ';


//juomanlisays haku.. pitää muokata vielä
$kysely =$yhteys->prepare("SELECT juomaid, nimi FROM juoma");
$kysely->execute();
echo 'Valitse juoma: </br>';
echo '  <select  name="juomaid">';

while ($rivi = $kysely->fetch()) {

echo '  <option value=' .$rivi[juomaid]. ' >'.$rivi[nimi]. '</option>';
  }
echo ' </select></br> ';


echo '</br>';

echo '<input type="submit" value="muuta">';

echo '</form>';

?>
</div>

</div>
</body>
</html>
