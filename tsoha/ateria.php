<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type"
              content="text/html; charset=UTF-8">
        <title>Ateriakokonaisuus</title>
        <link href="tyyli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="otsikko">Ateriakokonaisuus</div>
        <div id="container">
            <div id="navipalkki">
                <?php include 'navi.html'; ?>
            </div>
            <div id="sisalto">Ateriahaun tulokset:
                <?php
// yhteyden muodostus tietokantaan

                include("yhteys.php");

                $v = $_GET['nimi'];
// kyselyn suoritus.. tässä on vielä vähän häikkää miten pitäisi toimia. 


                $kysely = $yhteys->prepare("SELECT nimi FROM ateriakokonaisuus WHERE nimi like '%$v%' ");
                $kysely->execute();

// haettujen rivien tulostus

while ($rivi = $kysely->fetch()) {
    
     echo '</br>Nimi:</br> ';
     echo $rivi["nimi"] ;
echo '</br>';
echo '</br>';
 }

$kyselyb = $yhteys->prepare ("SELECT nimi FROM resepti WHERE reseptiid IN
(SELECT reseptiid FROM ateriakokonaisuusvalitaulu WHERE ateriaid IN (SELECT ateriaid FROM ateriakokonaisuus WHERE
nimi like '$v' ) ) ");

$kyselyb->execute();

echo 'Reseptit: ';
echo '</br>';
while($rivib = $kyselyb->fetch()) {
 
//näistä pitäisi tehdä linkit!
echo $rivib["nimi"] ;
echo '</br> ';
}

    echo '</br></br>';
    echo '<td><a href="poistaateria.php?nimi='.$v.' ">Poista ateriakokonaisuus </td>';
    echo '</br>';
    echo '<td><a href="muokkaaateriaa.php?nimi=' .$v.' " >Muokkaa ateriakokonaisuutta </td>';

?>
</div>
</div>
</body>
</html>
