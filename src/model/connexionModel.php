<?php
require_once "../src/model/connexionBd.php";

function VerificationUser($email){
    try{
        $query = GetConnexion()->prepare("
            SELECT `idUser`, `motDePasse`, `admin`
            FROM `UTILISATEURS` 
            WHERE `email` = ?
        ");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}