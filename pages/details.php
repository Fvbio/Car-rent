<?php 


require_once '../class/Voiture.php';
require_once '../class/Template.php'; 

echo "<br><br>";

$voiture = new Voiture();
$voiture->getVoitureBdd('RAV4');
// echo $_SESSION['idVoiture'];
