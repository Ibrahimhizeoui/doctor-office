<?php
require_once('connect.php');

$s0=$bdd->query("SELECT maladie,count(id) as nb FROM `consultation` GROUP BY maladie ORDER BY nb DESC limit 3");
$q=$s0->rowCount();
$r=$s0->fetchAll();

echo $q;

$s0->closeCursor();

?>
