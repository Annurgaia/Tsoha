<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=ISO-8859-1">
  <title>Resepti</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Resepti</div>
<div id="container">
<div id="navipalkki">
<ul id="navi">
  <li><a href="index.html">Etusivu</a></li>
  <li><a href="kirjautumissivu.html">Kirjaudu sisään</a></li>
  <li><a href="rekisterointi.html">Rekisteröidy asiakkaaksi</a></li>
</ul>
</div>
<div id="sisalto">Tähän tulee reseptihaun tulokset 



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

// kyselyn suoritus
$kysely = $yhteys->prepare("SELECT nimi  FROM testiresepti 
WHERE aineet like '%herne%' "); 
$kysely->execute();



//$result = $kysely->fetchAll();
//print_r($result);

// haettujen rivien tulostus
echo "<table border>";
echo '<tr><td>Nimi</td><td>Resepti</td><td>juoma</td></tr>';
while ($rivi = $kysely->fetch()) {
    
echo "<tr>";
    echo '<td><a href="resepti.php?nimi=' . $rivi["nimi"] . '>' . $rivi["nimi"] . ' </td>';
   // echo '<td>' . $rivi["kuvaus"] .' </td>';
   // echo '<td>' . $rivi["resepti"] .' </td>';
   // echo '<td>' . $rivi["juoma"] .' </td>';
    echo "</tr>";
}
echo "</table>";

$kysely = $yhteys->prepare("SELECT nimi  FROM testiresepti
WHERE aineet like '%herne%' ");
$kysely->execute();
 
$result = $kysely->fetchColumn();

print("nimi = $result \n");

?>

</div>
</div>
</body>
</html>
