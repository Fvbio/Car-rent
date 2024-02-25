<?php
session_start();

require_once "DbConnection.php";

class Connection extends DbConnection{

    private string $email;
    private string $password;

    public function __construct(string $email, string $password){
        $this->email = $email;
        $this->password = $password;  
    }


    public function tryConnect(){

        $connection= $this->getBdd()->prepare("SELECT * FROM Users WHERE Email = :email");
        $connection->bindParam(':email',$this->email);
        $connection->execute();

        foreach($connection as $valide){
            if($valide['Email'] == $this->email AND $valide['MotDePasse'] == $this->password){
                echo $valide['Email'] . " ET " . $this->email;
                $_SESSION['idUser'] = $valide['id'];
                header('Location: pages/lobby.php');
                exit();
            }else{
                echo "MAUVAIS IDENTIFIANT !";
            }
        }

    }


}
