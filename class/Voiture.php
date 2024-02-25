<?php
require_once 'DbConnection.php';
require_once 'Template.php'; 

class Voiture extends DbConnection{

    public string $marques;
    private string $modele;
    private string $annee;
    private string $couleur;
    private int $prix; 
    private string $catalogue;


    // AFFICHER TOUTES LES VOITURES
    public function getVoituresBdd(){
        $voituresInfo = $this->getBdd()->prepare("SELECT * FROM Voitures");
        $voituresInfo->execute();
    
        $resultats = $voituresInfo->fetchAll(PDO::FETCH_ASSOC);

        echo Template::catalogue($resultats);
    }

    // AFFICHE UNE VOITURE PRECISE
    public function getVoitureBdd($modele){
        $voitureInfo = $this->getBdd()->prepare('SELECT * FROM `Voitures` WHERE Modele = :modele');
        $voitureInfo->bindParam(':modele', $modele);
        $voitureInfo->execute();

        $resultat = $voitureInfo->fetchAll(PDO::FETCH_ASSOC);


        echo Template::ficheVoiture($resultat);


    }



}
