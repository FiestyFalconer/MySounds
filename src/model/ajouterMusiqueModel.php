<?php
require_once "../src/model/connexionBd.php";

function GetGenre()
{
    try {
        $query = GetConnexion()->prepare("
        SELECT `nomStyle`, `idStyle`
        FROM `STYLES`
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}
