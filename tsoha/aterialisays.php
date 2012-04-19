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
try {

//transaktion alku
    $yhteys->beginTransaction();
    $nimi = $_POST["nimi"];

    $kysely = $yhteys->prepare("INSERT INTO ateria (nimi) VALUES (?)");
    $kysely->execute(array($_POST["nimi"]));

    $reseptiid = $yhteys->prepare("SELECT ateriaid FROM ateria 
WHERE nimi like '%$nimi' ");
    $reseptiid->execute();

//haetaan resepti id 
    $tulos = $reseptiid->fetchColumn();

    $kysely = $yhteys->prepare("INSERT INTO ateriakokonaisuusvalitaulu (ateriaid, reseptiid) VALUES (?,?)");
    $myarray = $_POST['ateriaid'];
    foreach ($myarray as $row) {

        $kysely->execute(array($tulos, $row));
    }

    $yhteys->commit();
} catch (Exception $e) {
    $yhteys->rollBack();
    echo "failed: " . $e->getMessage();
}

//force siirtyminen vaikka etusivulle. 
$URL = "lisaaateria.php";
header("Location: $URL");
?>
</div>
</body>
</html>

