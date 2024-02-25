<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
</head>
<body>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <form method="post">
                    <input type="submit" class="btn col-1 btn-sm" name="lobby" value="LOBBY" />
                    <input type="submit" class="btn col-1 btn-sm" name="deconnecter" value="DECONNECTER" />
                    <input type="submit" class="btn col-1 btn-sm" name="historique" value="HISTORIQUE" />
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-start">
            </div>
        </div>
    </div>
</header>

</body>
</html>

<?php 
session_start();

if(isset($_POST['lobby'])){
    header('Location: lobby.php'); // Redirige vers la page lobby.php
} elseif(isset($_POST['deconnecter'])){
    // session_destroy(); // Détruit complètement la session
    header('Location: ../index.php'); // Redirige vers la page de connexion
} elseif(isset($_POST['historique'])){
    header('Location: historique.php'); // Redirige vers la page historique.php
}
?>
