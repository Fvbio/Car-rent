<?php 


require_once '../class/Voiture.php';
require_once '../class/Template.php'; 

echo "<br><br>";

$voiture = new Voiture();
$voiture->getVoitureBdd($_SESSION['modeleChoisi']);
echo $_SESSION['idVoiture'];
