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
            <div id="sisalto">Kaikki reseptit:

                <?php
// yhteyden muodostus tietokantaan

                include("yhteys.php");
                $tulos = $_GET['reseptihaku'];
                echo $tulos;
// kyselyn suoritus
                $kysely = $yhteys->prepare("SELECT nimi, yleiskuvaus FROM resepti WHERE nimi like '%$tulos%' ");

                $kysely->execute();

// haettujen rivien tulostus
                echo "<table border>";
                echo '<tr><td>Nimi</td><td>Resepti</td></tr>';

                while ($rivi = $kysely->fetch()) {

                    echo "<tr>";
                    echo '<td><a href="resepti.php?nimi=' . $rivi["nimi"] . '">' . $rivi["nimi"] . ' </td>';
                    echo '<td>' . $rivi["yleiskuvaus"] . ' </td>';
                    echo "</tr>";
                }
                echo "</table>";
                ?>

            </div>
        </div>
    </body>
</html>
