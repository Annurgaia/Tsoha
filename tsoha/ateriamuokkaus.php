<?php
include("yhteys.php");

//tällä sivulla lisätään muutokset tietokantaan
//transaktion alku
$yhteys->beginTransaction();
$nimi = $_POST[nimi];
$resepti = $_POST['reseptiid'];

/*
$kysely = $yhteys->prepare("UPDATE resepti SET yleiskuvaus ='$_POST[kuvaus]', resepti ='$_POST[resepti]', juomaid ='$_POST[juomaid]'  WHERE nimi like '$nimi' "); 
$kysely->execute();
*/

$reseptiid = $yhteys->prepare ("SELECT ateriaid FROM ateria WHERE nimi like '%$nimi' ");
$reseptiid->execute();
$result = $reseptiid->fetchColumn();


//poistetaan ensin vanhat 
$kysely = $yhteys->prepare("DELETE FROM ateriakokonaisuusvalitaulu WHERE ateriaid =$result ");
$kysely->execute();

//ja sitten lisätään uudet
$kysely = $yhteys->prepare("INSERT INTO ateriakokonaisuusvalitaulu (reseptiid, ateriaid) VALUES (?,?) ");
foreach ($resepti as $row){
$kysely->execute(array($row, $result));
}



$yhteys->commit();

}
	catch (Exception $e) {
	$yhteys->rollBack();
	echo "failed: ". $e->getMessage();
	}

//force siirtyminen vaikka etusivulle. 
//$URL="index.html";
//header ("Location: $URL");
echo ' ateriaa muokattu.. siirry etusivulle';
echo ' <a href=index.html>etusivulle</a>';

?>
</div>
</body>
</html>
