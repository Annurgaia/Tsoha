<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type"
              content="text/html; charset=UTF-8">
        <title>Reseptinlisäys</title>
        <link href="tyyli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="otsikko">Reseptit</div>
        <div id="container">
            <div id="navipalkki">
                <?php include 'navi.html'; ?>
            </div>
<?php
include("yhteys.php");
try{
//tällä sivulla lisätään muutokset tietokantaan
//transaktion alku
$yhteys->beginTransaction();
$nimi = $_POST["nimi"];
$resepti = $_POST["reseptiid"];

$reseptiid = $yhteys->prepare ("SELECT ateriaid FROM ateriakokonaisuus WHERE nimi like '%$nimi' ");
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


	}catch (Exception $e) {
	$yhteys->rollBack();
	echo "failed: ". $e->getMessage();
	}

echo ' Ateriaa muokattu...siirry';
echo ' <a href=index.php>etusivulle</a>';

?>
</div>
</body>
</html>
