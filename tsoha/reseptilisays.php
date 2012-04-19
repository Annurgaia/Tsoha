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
                try {
// yhteyden muodostus tietokantaan
                    include("yhteys.php");

//transaktion alku
                    $yhteys->beginTransaction();
                    $nimi = $_POST['nimi'];

                    $kysely = $yhteys->prepare("INSERT INTO resepti(nimi, yleiskuvaus, resepti, juomaid) VALUES (?,?,?,?)");
                    $kysely->execute(array($_POST["nimi"], $_POST["kuvaus"],
                        $_POST["resepti"], (int) $_POST["juomaid"]));

                    $reseptiid = $yhteys->prepare("SELECT reseptiid FROM resepti WHERE nimi like '%$nimi' ");
                    $reseptiid->execute();
                    $result = $reseptiid->fetchColumn();

//lisätään raaka-aineet reseptiin.


                    $kysely = $yhteys->prepare("INSERT INTO raakaainevalitaulu (raakaaineid, reseptiid)VALUES (?,?)");
                    $myarray = $_POST['raakaaineid'];
                    foreach ($myarray as $row) {

                        $kysely->execute(array($row, $result));
                    }

                    $yhteys->commit();
                } catch (Exception $e) {
                    $yhteys->rollBack();
                    echo "failed: " . $e->getMessage();
                }

//force siirtyminen vaikka etusivulle. 
                $URL = "lisaaresepti.php";
//header ("Location: $URL");
                echo 'Resepti lisätty...siirry ';
echo '<a href="index.php">etusivulle</a>';
                ?>
            </div>
        </div>
    </body>
</html>

