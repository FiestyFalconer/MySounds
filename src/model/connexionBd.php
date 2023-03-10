<?php
require_once "../src/model/config.php";

function GetConnexion(){
    static $myDb = null;

    if($myDb == null){

        try{
            $myDb = new PDO(
                "mysql:host=". DB_HOST. ";dbname=". DB_NAME.";charset=utf8"
                ,DB_USER, DB_PASSWORD
            );
            $myDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $myDb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $e){
            die("Erreur :" . $e->getMessage());
        }
    }

    return $myDb;
}