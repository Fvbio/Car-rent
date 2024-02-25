<?php
session_start();

class Template {

    public static function ficheVoiture($resultat){
        $html = '<!DOCTYPE html>
                <html lang="fr">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Fiche Voiture</title>
                    <link href="https://bootswatch.com/5/cyborg/bootstrap.css" rel="stylesheet">
                </head>
                <body>';
    
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        
        foreach ($resultat as $voiture) {
            $_SESSION['idVoiture'] = $voiture['id'];
            $html .= '<div class="col-md-6 mx-auto">';
            $html .= '<div class="card mb-3">';
            $html .= '<div class="card-body">';
            $html .= '<h5 class="card-title">' . $voiture['Marque'] . ' ' . $voiture['Modele'] .' ' . $voiture['id'] . '</h5>';
            $html .= '<p class="card-text">';
            $html .= 'Année: ' . $voiture['Annee'] . '<br>';
            $html .= 'Couleur: ' . $voiture['Couleur'] . '<br>';
            $html .= 'Prix: ' . $voiture['Prix'] . ' €<br>';
            $html .= '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        $html .= '</div>';
    
        // Formulaire de réservation
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-6 mx-auto">';
        $html .= '<div class="card">';
        $html .= '<div class="card-body">';
        $html .= '<h3 class="card-title">Réserver cette voiture</h3>';
        $html .= '<form method="post">';
        $html .= '<div class="form-group">';
        $html .= '<label for="date_reservation_debut">Date de début de réservation:</label>';
        $html .= '<input type="date" class="form-control" id="date_reservation_debut" name="date_reservation_debut" required>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '<label for="date_reservation_fin">Date de fin de réservation:</label>';
        $html .= '<input type="date" class="form-control" id="date_reservation_fin" name="date_reservation_fin" required>';
        $html .= '</div>';
        $html .= '<button type="submit" class="btn btn-primary">Réserver</button>';
        $html .= '</form>'; $html .= '</div>'; $html .= '</div>'; $html .= '</div>'; $html .= '</div>';
        $html .= '</div>';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'Reserver.php';
            $reservation = new Reserver();
            $reservation->setReservation($_SESSION['idUser'], $_SESSION['idVoiture'], $_POST['date_reservation_debut'], $_POST['date_reservation_fin'] );
        }



        // Votre code pour traiter le formulaire de réservation et insérer les données dans la table de réservation

        $html .= '</body>
                </html>';
    
        return $html;
    }
    

    public static function catalogue($resultats) {
        $html = '<!DOCTYPE html>
                <html lang="fr">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Tableau de Voitures</title>
                    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
                </head>
                <body>';

        $html .= '<div class="container">
                    <form method="post">'; // Ajout du formulaire ici

        $html .= '<table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"></th>
                                <th scope="col">Marque</th>
                                <th scope="col">Modèle</th>
                                <th scope="col">Prix</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>';

        foreach($resultats as $voiture){
            $html .= '<tr class="text-center">';
            $html .= '<td class="align-middle"><img src="A5.png" alt="Image voiture" style="max-width: 100px; max-height: 100px;"></td>';
            $html .= '<td class="align-middle">' . $voiture['Marque'] . '</td>';
            $html .= '<td class="align-middle">' . $voiture['Modele'] . '</td>';
            $html .= '<td class="align-middle">' . $voiture['Prix'] . '€</td>';
            $html .= '<td class="align-middle"><input type="submit" class="btn btn-light b-2 border-4 btn-lg btn-sm mt-2 form-control" value="Réserver" name="reservation_' . $voiture['Modele'] . '"></td>'; // ajout de "reservation_" avant le nom du modèle
            $html .= '</tr>';
        }

        $html .= '</tbody>
                    </table>
                    </form>
                </div>';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach($_POST as $key => $value) {
                if (strpos($key, 'reservation_') === 0) {
                    $modele = substr($key, strlen('reservation_'));

                    switch($modele){
                        case 'A5':
                            $_SESSION['modeleChoisi'] = 'A5';
                            header('Location: details.php');
                            break;  
                        case 'Serie_3':
                            $_SESSION['modeleChoisi'] = 'Serie_3';
                            header('Location: details.php');
                            break;
                        case 'RAV4':
                            $_SESSION['modeleChoisi'] = 'RAV4';
                            header('Location: details.php');
                            break;
                        case 'Classe_C':
                            $_SESSION['modeleChoisi'] = 'Classe_C';
                            header('Location: details.php');
                            break;

                    }
                }
            }
        }

        $html .= '</body>
                </html>';

        return $html;
    }
}
?>
