<?php 

class DbConnection{

    private static $pdo; 

    private function setBdd(){
        self::$pdo = new Pdo("mysql:host=localhost;dbname=Car-Rent;charset=utf8","root","root");
    }

    public function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }

}
