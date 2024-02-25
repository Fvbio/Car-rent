<?php
require_once 'DbConnection.php';

Class Reserver extends DbConnection{

    public function setReservation($idUser, $idVoiture, $dateDebut, $dateFin){

        $reserver = $this->getBdd()->prepare("INSERT INTO Reservations (id_user, id_voiture, 
        DateReservationDebut, DateReservationFin) 
        VALUES (:id_user, :id_voiture, :date_reservation_debut, :date_reservation_fin)");
        $reserver->bindParam(':id_user', $idUser);
        $reserver->bindParam(':id_voiture', $idVoiture);
        $reserver->bindParam(':date_reservation_debut',$dateDebut);
        $reserver->bindParam(':date_reservation_fin', $dateFin);

        $reserver->execute();

    }




}