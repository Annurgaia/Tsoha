<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type"
              content="text/html; charset=UTF-8">
        <title>Reseptin lisääminen</title>
        <link href="tyyli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="otsikko">Reseptin lisääminen </div>

        <div id="navipalkki">
            <?php include 'navi.html'; ?>
        </div>
        <div id="sisalto">Lisää uusi resepti järjestelmään

            <form action="reseptilisays.php" method="POST">
                <p>Nimi: </br>
                    <input type="text" name="nimi" ></p>

                <p>Resepti: </br>
                    <textarea name="resepti" cols=40 rows=7> </textarea></p>

                <p>Yleiskuvaus: </br>
                    <textarea name="kuvaus" cols=40 rows=7> </textarea></p>
                <p>Raaka-Aineet: </br></br>
                    <?php
                    include("yhteys.php");
                    $kysely = $yhteys->prepare("SELECT raakaaineid, nimi FROM raakaaine");
                    $kysely->execute();


                    echo '  <select multiple="multiple" name="raakaaineid[]">';

                    while ($rivi = $kysely->fetch()) {

                        echo '  <option value=' . $rivi['raakaaineid'] . ' >' . $rivi['nimi'] . '</option>';
                    }
                    echo '</select></br> ';
                    echo '</br>';


                    $kysely = $yhteys->prepare("SELECT juomaid, nimi FROM juoma");
                    $kysely->execute();
                    echo 'Valitse juoma: </br>';
                    echo '  <select  name="juomaid">';

                    while ($rivi = $kysely->fetch()) {

                        echo '  <option value=' . $rivi['juomaid'] . ' >' . $rivi['nimi'] . '</option>';
                    }
                    echo '</select></br> ';

                    echo '<input type="submit" value="luo">';

                    echo '</form>';
                    ?>
                    </div>

                    </div>
                    </body>
                    </html>

