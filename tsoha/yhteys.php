<?php
try {
    $yhteys = new PDO("mysql:host=localhost;dbname=annahiet", "annahiet", "eb7e53f691791852");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$yhteys->exec("SET NAMES latin1");
?>
