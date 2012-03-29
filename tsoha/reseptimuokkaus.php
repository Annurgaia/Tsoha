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
//t�ll� sivulla lis�t��n muutokset tietokantaan
//transaktion alku
$yhteys->beginTransaction();
$nimi = $_POST[nimi];
$raakaaine = $_POST['raakaaineid'];


$kysely = $yhteys->prepare("UPDATE resepti SET yleiskuvaus ='$_POST[kuvaus]', resepti ='$_POST[resepti]', juomaid ='$_POST[juomaid]'  WHERE nimi like '$nimi' "); 
$kysely->execute();


$reseptiid = $yhteys->prepare ("SELECT reseptidi FROM resepti 
WHERE nimi like '%$nimi' ");
$reseptiid->execute();
$result = $reseptiid->fetchColumn();


//poistetaan ensin vanhat 
$kysely = $yhteys->prepare("DELETE FROM raakaainevalitaulu WHERE reseptiid =$result ");
$kysely->execute();

//ja sitten lis�t��n uudet
$kysely = $yhteys->prepare("INSERT INTO raakaainevalitaulu (raakaaineid, reseptiid) VALUES (?,?) ");
foreach ($raakaaine as $row){
$kysely->execute(array($row, $result));
}



$yhteys->commit();

}
	catch (Exception $e) {
	$yhteys->rollBack();
	echo "failed: ". $e->getMessage();
	}

//force siirtyminen vaikka etusivulle. 
$URL="index.html";
header ("Location: $URL");


?>
</div>
</body>
</html>
