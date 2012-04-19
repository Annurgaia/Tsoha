<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Aterian muokkaaminen</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Aterian muokkaus </div>

<div id="navipalkki">
<?php include 'navi.html'; ?>
</div>
<div id="sisalto">Muokkaa aterioita:


<?php

include("yhteys.php");

$tulos = $_GET["nimi"];

echo '<form name="intput" action="ateriamuokkaus.php" method="POST">';
echo '<p>Nimi: </br><input type="text" name="nimi" value='.$tulos.' readonly></p>';

$nimi = $_GET["nimi"];

$kysely =$yhteys->prepare("SELECT reseptiid, nimi FROM resepti ");  
$kysely->execute();

echo '  <select name="reseptiid[]" multiple>';

while ($rivi = $kysely->fetch()) {

echo '  <option value=' .$rivi["reseptiid"]. ' >'.$rivi["nimi"]. '</option>';
  }
echo '</select></br> ';
echo '</br>';
echo '<input type="submit" value="muuta">';
echo '</form>';

?>
</div>

</div>
</body>
</html>
