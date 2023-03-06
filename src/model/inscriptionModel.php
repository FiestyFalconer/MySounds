<?php
require_once "../src/model/connexionBd.php";

function NewUser($email, $nom, $motDePasse){
    try{
        $db = GetConnexion();
        $db->beginTransaction();
    
        $query = $db->prepare("
            INSERT INTO `UTILISATEURS`(`nom`, `email`, `motDePasse`, `admin`) 
            VALUES (?,?,?,false)
        ");
        $query->execute([$nom, $email, $motDePasse]);
        $db->commit();
    }
    catch(PDOException $e){
        $db->rollBack();
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
    
}
