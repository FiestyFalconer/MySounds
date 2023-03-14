<?php
require_once "../src/model/connexionBd.php";

function GetMusiques(){
    try{
        $query = GetConnexion()->prepare("
        SELECT `idMusique`, `nomCreator`, `dateSortie`, `nomImage`, `nomMusique`, `mp3Musique` 
        FROM `MUSIQUES`
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}

function GetStyles($idMusique){
    try{
        $query = GetConnexion()->prepare("
        SELECT `nomStyle` FROM `STYLES`,`STYLES_MUSIQUES`, `MUSIQUES` 
        WHERE `STYLES`.`idStyle` = `STYLES_MUSIQUES`.`idStyle` 
        AND `MUSIQUES`.`idMusique` = `STYLES_MUSIQUES`.`idMusique` 
        AND `MUSIQUES`.`idMusique` = ?
        ");
        $query->execute([$idMusique]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}