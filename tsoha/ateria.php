<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=ISO-8859-1">
  <title>Ateriakokonaisuus</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Ateriakokonaisuus</div>
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
<div id="sisalto">Ateriahaun tulokset:

<?php

// yhteyden muodostus tietokantaan

try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");
}
 catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$v = $_GET['nimi'];
// kyselyn suoritus.. tässä on vielä vähän häikkää miten pitäisi toimia. 


$kysely = $yhteys->prepare("SELECT nimi FROM ateria WHERE nimi like '%$v%' "); 
$kysely->execute();

// haettujen rivien tulostus

while ($rivi = $kysely->fetch()) {
    
    	echo '</br>Nimi:</br> ';
    	echo  $rivi["nimi"] ;
	echo '</br>';    
	echo '</br>';
 }

$kyselyb = $yhteys->prepare ("SELECT nimi FROM resepti WHERE reseptiid IN 
(SELECT reseptiid FROM ateriakokonaisuusvalitaulu WHERE ateriaid IN (SELECT ateriaid FROM ateria WHERE 
nimi like '$v' ) ) ");

$kyselyb->execute();

echo 'Reseptit: ';
echo '</br>';
while($rivib = $kyselyb->fetch()) {
 
//näistä pitäisi tehdä linkit!
echo  $rivib["nimi"]  ;
echo '</br> ';
}

    echo '</br></br>';      
    echo '<td><a href="poistaateria.php?nimi='.$v.'  ">Poista ateriakokonaisuus </td>';
    echo '</br>';
    echo '<td><a href="muokkaaateriaa.php?nimi=' .$v.' " >Muokkaa ateriakokonaisuutta </td>';

?>
</div>
</div>
</body>
</html>
