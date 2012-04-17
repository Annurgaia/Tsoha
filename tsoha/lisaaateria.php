<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type"
 content="text/html; charset=UTF-8">
  <title>Ateriakokonaisuuden lisääminen</title>
  <link href="tyyli.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="otsikko">Ateriakokonaisuuden lisääminen </div>

<!--#include virtual="navi.html" --> 
<div id="sisalto">Lisää uusi ateriakokonaisuus järjestelmään



<form action="aterialisays.php" method="POST">
<p>Nimi: </br>
<input type="text" name="nimi" ></p>


<p>Reseptit: </br></br>
<?php

include("yhteys.php");

$kysely =$yhteys->prepare("SELECT reseptiid, nimi FROM resepti");  
$kysely->execute();


echo '  <select multiple="multiple" name="ateriaid[]">';

while ($rivi = $kysely->fetch()) {

echo '  <option value=' .$rivi[reseptiid]. ' >'.$rivi[nimi]. '</option>';
  }
echo '</select></br> ';

echo '<input type="submit" value="luo">';
echo '</form>';

?>
</div>

</div>
</body>
</html>



