<?php
require_once 'DbConnection.php';

class Reserver extends DbConnection{
    
    // Méthode pour insérer une réservation
    public function setReservation($idUser, $idVoiture, $dateDebut, $dateFin){
        // Vérification de la disponibilité
        if ($this->disponible($idVoiture, $dateDebut, $dateFin)) {
            // Insertion de la réservation
            $reserver = $this->getBdd()->prepare("INSERT INTO Reservations (id_user, id_voiture, DateReservationDebut, DateReservationFin) VALUES (:id_user, :id_voiture, :date_reservation_debut, :date_reservation_fin)");
            $reserver->bindParam(':id_user', $idUser);
            $reserver->bindParam(':id_voiture', $idVoiture);
            $reserver->bindParam(':date_reservation_debut', $dateDebut);
            $reserver->bindParam(':date_reservation_fin', $dateFin);
            $reserver->execute();
            return "Reservation reussie";
        } else {
            return "Voiture non disponible entre: " . $dateDebut . " et " . $dateFin;
        }
    }

    // récupérer l'historique des réservations 
    public function getReservationHistorique($idUser){
        $historique = [];
        $getReservations = $this->getBdd()->prepare("SELECT Voitures.Marque, Voitures.Modele, DateReservationDebut, DateReservationFin FROM Reservations INNER JOIN Voitures ON Reservations.id_voiture = Voitures.id WHERE id_user = :id_user ORDER BY DateReservationDebut DESC;");
        $getReservations->bindParam(':id_user', $idUser);
        $getReservations->execute();
        while ($reservations = $getReservations->fetch(PDO::FETCH_ASSOC)) {
            $historique[] = $reservations;
        }
        return $historique;
    }

    // vérifier la disponibilité d'une voiture pour une période donnée
    private function disponible($idVoiture, $dateDebut, $dateFin){
        $existingReservation = $this->getBdd()->prepare("SELECT * FROM Reservations WHERE id_voiture = :id_voiture AND ((DateReservationDebut BETWEEN :date_reservation_debut AND :date_reservation_fin) OR (DateReservationFin BETWEEN :date_reservation_debut AND :date_reservation_fin))");
        $existingReservation->bindParam(':id_voiture', $idVoiture);
        $existingReservation->bindParam(':date_reservation_debut', $dateDebut);
        $existingReservation->bindParam(':date_reservation_fin', $dateFin);
        $existingReservation->execute();
        $result = $existingReservation->fetch();
        return !$result; 
    }
}
