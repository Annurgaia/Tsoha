<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type"
              content="text/html; charset=UTF-8">
        <title>Ateriakokonaisuus</title>
        <link href="tyyli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="otsikko">Ateriakokonaisuudet</div>
        <div id="container">
            <div id="navipalkki">
                <?php include 'navi.html'; ?>
            </div>
            <div id="sisalto">Kaikki ateriakokonaisuudet:

                <?php
// yhteyden muodostus tietokantaan

                include("yhteys.php");
                $tulos = $_GET["ateriahaku"]; //jotain häikkää
                echo $tulos;

// kyselyn suoritus
                $kysely = $yhteys->prepare("SELECT nimi FROM ateriakokonaisuus WHERE nimi like '%$tulos%' ");
                $kysely->execute();

//$result = $kysely->fetchAll();
//print_r($result);
// haettujen rivien tulostus
                echo "<table border>";
                echo '<tr><td>Nimi</td></tr>';

                while ($rivi = $kysely->fetch()) {

                    echo "<tr>";
                    echo '<td><a href="ateria.php?nimi=' . $rivi["nimi"] . '">' . $rivi["nimi"] . ' </td>';
                }
                echo "</table>";
                ?>

            </div>
        </div>
    </body>
</html>
