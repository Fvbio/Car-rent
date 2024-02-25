<?php require_once 'signOut.php'?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lobby</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
    <style>
        html, body {
            height: 95%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        img {
            max-width: 20%;
            max-height: 20%;
        }

        /* Centrer verticalement les cellules du tableau */
        /* .table tbody tr td, .table tbody tr th {
            vertical-align: middle;
            border-radius: 10px;
        } */
    </style>
</head>
<body style="background-color:#141414">

<?php
require_once '../class/Voiture.php';

$voiture = new Voiture();
$voiture->getVoituresBdd();
?>

</body>
</html>

