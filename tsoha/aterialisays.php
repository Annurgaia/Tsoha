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

