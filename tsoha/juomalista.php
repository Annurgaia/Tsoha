<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Juomalisays</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Juomat</div>
<div id="container">
<div id="navipalkki">
<?php include 'navi.html'; ?>
</div>
<div id="sisalto"> Kaikki juomat:

<?php

// yhteyden muodostus tietokantaan
include("yhteys.php");

// kyselyn suoritus     
$kysely = $yhteys->prepare("SELECT * FROM juoma ");
$kysely->execute();

// haettujen rivien tulostus
echo "<table border>";
while ($rivi = $kysely->fetch()) {
    echo "<tr>";
    echo "<td>" . $rivi["nimi"] . "</td>";
    echo "<td>" . $rivi["alc"] . "</td>";
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>
