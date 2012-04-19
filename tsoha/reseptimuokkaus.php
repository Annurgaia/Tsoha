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
//tällä sivulla lisätään muutokset tietokantaan
//transaktion alku
            $yhteys->beginTransaction();
            $nimi = $_POST[nimi];
            $raakaaine = $_POST['raakaaineid'];


            $kysely = $yhteys->prepare("UPDATE resepti SET yleiskuvaus ='$_POST[kuvaus]', resepti ='$_POST[resepti]', juomaid ='$_POST[juomaid]' WHERE nimi like '$nimi' ");
            $kysely->execute();


            $reseptiid = $yhteys->prepare ("SELECT reseptiid FROM resepti WHERE nimi like '%$nimi' ");
            $reseptiid->execute();
            $result = $reseptiid->fetchColumn();


//poistetaan ensin vanhat
            $kysely = $yhteys->prepare("DELETE FROM raakaainevalitaulu WHERE reseptiid =$result ");
            $kysely->execute();

//ja sitten lisätään uudet
            $kysely = $yhteys->prepare("INSERT INTO raakaainevalitaulu (raakaaineid, reseptiid) VALUES (?,?) ");
            foreach ($raakaaine as $row){
            $kysely->execute(array($row, $result));
            }

            $yhteys->commit();

            } catch (Exception $e) {
            $yhteys->rollBack();
            echo "failed: ". $e->getMessage();
            }
//force siirtyminen vaikka etusivulle. 
            $URL = "index.php";
            header ("Location: $URL");
            ?>
        </div>
    </body>
</html>
