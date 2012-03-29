<?php
$db = pg_connect("dbname=annahiet user=annahiet") || die();

$res = pg_query($db, "SELECT reseptid FROM raakaaine ");

$val = pg_fetch_result($res, 0, 0);

echo "First field in the second row is: ", $val, "\n";
?>
