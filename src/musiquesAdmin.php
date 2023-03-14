<?php
session_start();
require_once "navBar.php";
require_once "../src/model/musiquesAdminModel.php";

if (!$_SESSION['admin']) {
    header("Location: ../src/index.php");
}

$affichage = "";
$i = 0;

$musiques = GetMusiques();

foreach ($musiques as $musique) {
    $styles = GetStyles($musique['idMusique']);

    $affichage .= "<tr>";
    $affichage .= '<td scope="col"><img class="img-fluid" id="images" src="./uploads/images/' . $musique['nomImage'] . '" alt="'. $musique['nomImage'] .'"></td>';
    $affichage .= "<td scope='col'>".$musique['nomMusique']."</td>";
    $affichage .= "<td scope='col'>".$musique['nomCreator']."</td>";
    $affichage .= "<td scope='col'>";
    foreach ($styles as $style) {
        
        if($i == Count($styles)-1){
            $affichage .= $style['nomStyle'];
        }
        else{
            $affichage .= $style['nomStyle'] . " | ";
        }
        $i += 1;
    }
    $affichage .= "</td>";
    $affichage .= "<td scope='col'>".$musique['dateSortie']."</td>";
    $affichage .= '<td scope="col"><audio title="Noir Désir" preload="auto" controls loop>
    <source src="./uploads/musiques'. $musique['mp3Musique'] .'" type="audio/mp3" alt="'.$musique['mp3Musique'] .'">
    </audio></td>';

    
    $affichage .= "</tr>";
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musiques Admin</title>

    <!-- Fontawesome -->
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link href="assets/fontawesome/css/regular.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!--Navbar-->
        <?= $commmonNav ?>
    </header>
    <main>
        <div class="container">
            <div class="btn-group">
                <a href="./ajouterMusique.php" class="btn btn-primary active">
                    <i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i> Ajouter une Musique
                </a>
            </div>
        </div>
        <div class="container">
            <table class="table">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Nom musique</th>
                    <th scope="col">Artiste/bande</th>
                    <th scope="col">Styles</th>
                    <th scope="col">Date de sortie</th>
                    <th scope="col">musique mp3</th>
                </tr>

                <?=$affichage?>

            </table>
        </div>
    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>