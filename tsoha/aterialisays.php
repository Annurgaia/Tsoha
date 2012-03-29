<?php
try{
// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//transaktion alku
$yhteys->beginTransaction();
$nimi=$_POST["nimi"];

$kysely = $yhteys->prepare("INSERT INTO ateria (nimi) VALUES (?)"); 
$kysely->execute(array($_POST["nimi"]));

$reseptiid = $yhteys->prepare ("SELECT ateriaid FROM ateria 
WHERE nimi like '%$nimi' ");
$reseptiid->execute();

//haetaan resepti id 
$tulos = $reseptiid->fetchColumn();


//WE NEED ATERIAID
/*
$kysely = $yhteys->prepare("INSERT INTO raakaainevalitaulu (raakaaineid,
reseptiid)VALUES (?,?)");
$myarray = $_POST['reseptiid'];
foreach ($myarray as $row){

$kysely->execute(array($row, $result ));
}
Nämä ovat esimerkkiä
*/


$kysely = $yhteys->prepare("INSERT INTO ateriakokonaisuusvalitaulu (ateriaid, reseptiid) VALUES (?,?)");
$myarray = $_POST['ateriaid'];
foreach ($myarray as $row) {

$kysely->execute(array($tulos, $row));
}

$yhteys->commit();

}
	catch (Exception $e) {
	$yhteys->rollBack();
	echo "failed: ". $e->getMessage();
	}

//force siirtyminen vaikka etusivulle. 
$URL="lisaaateria.php";
header ("Location: $URL");

?>
</div>
</body>
</html>
