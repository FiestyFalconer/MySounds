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

function AddMusique($image, $musique, $nomMusique, $nbGenre, $nomCreator, $dateSortie, $targetDir ,$typesImage, $typesAudio){
    try{
        $db = GetConnexion();
        $db->beginTransaction();

        $message = "";

        $etatTransaction = true;

        $uniqueNomImage = time().uniqid(rand());
        $uniqueNomMusique = time().uniqid(rand());

        $targetFilePathImage = $targetDir.'/images/'.$uniqueNomImage.$image['name'];
        $targetFilePathMusique = $targetDir.'/musiques/'.$uniqueNomMusique.$musique['name'];

        $mimeTypeImage = mime_content_type($image['tmp_name']);
        $mimeTypeMusique = mime_content_type($musique['tmp_name']);


        if(in_array($mimeTypeImage, $typesImage) && in_array($mimeTypeMusique, $typesAudio)){

            if(move_uploaded_file($image['tmp_name'], $targetFilePathImage) && move_uploaded_file($musique['tmp_name'], $targetFilePathMusique)){

                $message = '<div id="messageErreur" class="alert alert-success">Post créé</div>';

                $query = $db->prepare("
                    INSERT INTO `MUSIQUES`(`nomCreator`, `dateSortie`, `nomImage`, `nomMusique`, `mp3Musique`) 
                    VALUES (?,?,?,?,?)
                ");
                $query->execute([$nomCreator,$dateSortie,$uniqueNomImage,$nomMusique, $uniqueNomMusique]);
                
                foreach($nbGenre as $genre){
                    $query = $db->prepare("
                    INSERT INTO `STYLES_MUSIQUES`(`idMusique`, `idStyle`) 
                    VALUES ((SELECT `idMusique` FROM `MUSIQUES` WHERE `nomMusique` = ?,(SELECT `idStyle` FROM `STYLES` WHERE `nomStyle` = ?))
                    ");
                    $query->execute([$nomMusique, $genre]);
                }
                
            }
            else{
                $message = '<div id="messageErreur" class="alert alert-danger">Erreur</div>';
                $etatTransaction = false;
    
                $db->rollBack();
                if(file_exists($targetFilePathImage) && file_exists($targetFilePathMusique)){
                    unlink($targetFilePathImage);
                    unlink($targetFilePathMusique);
                }   
            }
        }else{
            $message = '<div id="messageErreur" class="alert alert-danger">Erreur pas le bon type de musique ou image</div>';
            $etatTransaction = false; 
        }

        //verifier l'etat de la transaction
        if($etatTransaction){
            $db->commit();
        }

        //renvoie le message
        return $message;
    } catch (PDOException $e) {
        $db->rollBack();
        if(file_exists($targetFilePathImage) && file_exists($targetFilePathMusique)){
            unlink($targetFilePathImage);
            unlink($targetFilePathMusique);
        }   
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
}
