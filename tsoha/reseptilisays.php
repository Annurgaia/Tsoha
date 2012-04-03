<?php
try{
// yhteyden muodostus tietokantaan
include("yhteys.php");

//transaktion alku
$yhteys->beginTransaction();
$nimi=$_POST[nimi];

$kysely = $yhteys->prepare("INSERT INTO resepti(nimi, yleiskuvaus, resepti, juomaid) VALUES (?,?,?,?)"); 
$kysely->execute(array($_POST["nimi"], $_POST["kuvaus"], 
 $_POST["resepti"], $_POST["juomaid"] ));

$reseptiid = $yhteys->prepare ("SELECT reseptiid FROM resepti 
WHERE nimi like '%$nimi' ");
$reseptiid->execute();
$result = $reseptiid->fetchColumn();

//lisätään raaka-aineet reseptiin.


$kysely = $yhteys->prepare("INSERT INTO raakaainevalitaulu (raakaaineid, 
reseptiid)VALUES (?,?)");
$myarray = $_POST['raakaaineid'];
foreach ($myarray as $row){

$kysely->execute(array($row, $result ));
}

/*
//lisätään juoma reseptiin
$kysely = $yhteys->prepare("INSERT INTO juoma (juomaid,
reseptiid)VALUES (?,?)");
$myarray = $_POST["juomaid"];
foreach($myarray as $row){
$kysely->execute(array($_POST["juomaid"], $result ));
*/

$yhteys->commit();

}
	catch (Exception $e) {
	$yhteys->rollBack();
	echo "failed: ". $e->getMessage();
	}

//force siirtyminen vaikka etusivulle. 
$URL="lisaaresepti.php";
header ("Location: $URL");

?>
</div>
</body>
</html>
