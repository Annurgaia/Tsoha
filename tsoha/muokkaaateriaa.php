<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Reseptin muokkaaminen</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Aterian muokkaus </div>

<div id="navipalkki">
<ul id="navi">
  <!--<li><a href="kirjautumissivu.html">Kirjaudu sis‰‰n</a></li>
  <li><a href="rekisterointi.html">Rekisterˆidy asiakkaaksi</a></li>-->
</br>
  <li><a href="index.html">Etusivu</a></li>
</br>
  <li><a href="hakusivu.html">Hae reseptej‰ ja ateriakokonaisuuksia</a></li>
</br>
  <li><a href="lisaaresepti.php">Lis‰‰ uusi resepti</a></li>
  <li><a href="lisaaateria.php">Lis‰‰ uusi ateriakokonaisuus</a></li>
</br>
  <li><a href="lisaajuoma.html">Lis‰‰ uusi juoma</a></li>
  <li><a href="raakaainelisays.html">Lis‰‰ uusi raaka-aine</a></li>

</ul>
</div>
<div id="sisalto">Muokkaa aterioita:


<?php

try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tulos = $_GET[nimi];

echo '<form name="intput" action="ateriamuokkaus.php" method="POST">';
echo '<p>Nimi: </br><input type="text" name="nimi" value='.$tulos.' readonly></p>';
/*
echo '<p>Resepti: </br><textarea name="resepti" cols=40 rows=7>';
echo $tulos[resepti];
echo '</textarea></p>';

echo '<p>Yleiskuvaus: </br><textarea name="kuvaus" cols=40 rows=7>';
echo $tulos[yleiskuvaus];
echo '</textarea>';
echo '<p>Raaka-Aineet: </br></br>';

*/
$nimi = $_GET[nimi];

$kysely =$yhteys->prepare("SELECT reseptiid, nimi FROM resepti ");  
$kysely->execute();

echo '  <select name="reseptiid[]" multiple>';

while ($rivi = $kysely->fetch()) {

echo '  <option value=' .$rivi[reseptiid]. ' >'.$rivi[nimi]. '</option>';
  }
echo '</select></br> ';
echo '</br>';
echo '<input type="submit" value="muuta">';
echo '</form>';

?>
</div>

</div>
</body>
</html>
