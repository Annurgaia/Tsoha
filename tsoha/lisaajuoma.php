<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Juoman lisääminen</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Juoman lisääminen </div>

<div id="navipalkki">
<?php include 'navi.html'; ?>
</div>

<?php
//lisataan juoma
// yhteyden muodostus tietokantaan
include("yhteys.php");

// kyselyn suoritus
$kysely = $yhteys->prepare("INSERT INTO juoma (nimi, alc) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["alc"]));

//$URL="index.html";
//header ("Location: $URL");
echo 'Juoma lisatty...siirry etusivulle.';
//echo '<a href="index.php">Etusivu</a>';
?>
</div>

</div>
</body>
</html>

