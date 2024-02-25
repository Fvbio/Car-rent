<?php
require_once "class/Connection.php";
// session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car-Rent</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">

    <style>
            .container {
            margin-top: 19%;
            }
    </style>
</head>

<body style="background-color:#141414">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                    <form method="post" action="">
                    <h4 class="card-title text-center mb-4">Connexion</h4>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                        </div>
                        <div class="text-center"> 
                            <input type="submit" value="CONNECTER" class="btn btn-light form-control"  name="submit">
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php 


// Controle formulaire
if (isset($_POST['submit'])) {
    if (!empty($_POST['email'] and $_POST['password'])) {// Verifie que les 2 champs ne sont pas vide.
        $tryCo = new Connection($_POST['email'], $_POST['password']);
        $_SESSION['email'] = $_POST['email'];
        echo $tryCo->tryConnect();  

    
    } else {
        echo '<div class="text-center"> VEUILLEZ REMPLIR TOUT LES CHAMPS </div>';
        
    }
}