<?php

require_once "signOut.php"; 
require_once "../class/Reserver.php";

$reserver = new Reserver();

$historique = $reserver->getReservationHistorique($_SESSION["idUser"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Réservations</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
</head>
<body>

<header>
    
        
</header>

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($historique as $reservation): ?>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $reservation['Marque'] . ' ' . $reservation['Modele']; ?></h5>
                    <p class="card-text">Date de début : <?php echo $reservation['DateReservationDebut']; ?></p>
                    <p class="card-text">Date de fin : <?php echo $reservation['DateReservationFin']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
