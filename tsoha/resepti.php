<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type"
              content="text/html; charset=UTF-8">
        <title>Resepti</title>
        <link href="tyyli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="otsikko">Reseptit</div>
        <div id="container">
            <div id="navipalkki">
                <?php include 'navi.html'; ?>
            </div>
            <div id="sisalto">Reseptihaun tulokset: 

                <?php
// yhteyden muodostus tietokantaan

                include("yhteys.php");

                $v = $_GET['nimi'];

// kyselyn suoritus.. tässä on vielä vähän häikkää miten pitäisi toimia.
                $kysely = $yhteys->prepare("SELECT nimi, resepti, yleiskuvaus FROM resepti
WHERE nimi like '%$v%' ");

                $kysely->execute();

// haettujen rivien tulostus

                while ($rivi = $kysely->fetch()) {

                    echo '</br>Nimi:</br> ';
                    echo $rivi["nimi"];
                    echo '</br>';
                    echo 'Kuvaus: </br>';
                    echo $rivi["yleiskuvaus"];
                    echo '</br>Resepti: </br>';
                    echo $rivi["resepti"];
                    echo '</br>';
                }

                $nimi = $kysely->fetchColumn();

                $kyselyb = $yhteys->prepare("SELECT nimi FROM juoma 
WHERE juomaid = (SELECT juomaid FROM resepti WHERE nimi like '%$v%' ) ");
                $kyselyb->execute();


                while ($rivib = $kyselyb->fetch()) {
                    echo '</br>';
                    echo 'Suositeltava ruokajuoma: </br>';
                    echo $rivib["nimi"];
                    echo '</br></br> ';
                }

                $nimi = $_GET["nimi"];

                $kyselyc = $yhteys->prepare("SELECT raakaaine.nimi AS raakaaine FROM raakaaine WHERE raakaaineid in
(SELECT raakaaineid FROM raakaainevalitaulu WHERE reseptiid in(SELECT reseptiid 
FROM resepti WHERE nimi like '$v' ) ) ");
                $kyselyc->execute();

                echo 'Tarvittavat raaka-aineet: </br> ';

                while ($rivi = $kyselyc->fetch()) {

                    echo ' <br>';
                    echo $rivi["raakaaine"];
                }

                echo '</br></br>';
                echo '<td><a href="poistaresepti.php?nimi=' . $nimi . '  ">Poista resepti </td>';
                echo '</br>';
                echo '<td><a href="muokkaareseptia.php?nimi=' . $nimi . '">Muokkaa reseptiä </td>';

                echo '</br>';



                echo '</table>';
                ?>
            </div>
        </div>
    </body>
</html>
