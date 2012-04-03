<?php

// yhteyden muodostus tietokantaan
include("yhteys.php");


// kyselyn suoritus
$kysely = $yhteys->prepare("SELECT * FROM reseptit");
$kysely->execute();

//Haettujen rivien tulostus
echo "<table border>";
while ($rivi = kysely->fetch()) {
	echo "<tr>";
	echo "<td>" , $rivi["nimi"] , "</td>";
	echo "<td>" , $rivi["kuvaus"] , "</td>";
	echo "</tr>";
}
echo "</table>";

?>
