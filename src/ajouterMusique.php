<?php
session_start();
require_once "navBar.php";
require_once "./model/ajouterMusiqueModel.php";

//si pas user admin on retourne sur la page d'index
if (!$_SESSION['admin']) {
    header("Location: ../src/index.php");
}

//declaration des variables
$genre = GetGenre();
$nbGenre = "";
$i = 0;
$message = "";

$typesImages = array("image/jpg", "image/png", "image/jpeg");
$typesAudio = array("audio/mpeg");

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_SPECIAL_CHARS);

if ($submit == "Ajouter musique") {

    $targetDir = dirname(__DIR__) . "/src/uploads";

    $image = $_FILES['imageMusique'];
    $musique = $_FILES['mp3Musique'];
    $nbGenre = $_POST['nbGenre'];
    $nomMusique = filter_input(INPUT_POST, 'nomMusique', FILTER_SANITIZE_SPECIAL_CHARS);
    $nomCreator = filter_input(INPUT_POST, 'nomCreator', FILTER_SANITIZE_SPECIAL_CHARS);
    $dateSortie = filter_input(INPUT_POST, 'dateSortie', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($image['name'] != "" && $musique['name'] != "" && $nomMusique != "" && !empty($nbGenre) && $nomCreator != "" && $dateSortie != "") {

        $message = AddMusique($image, $musique, $nomMusique, $nbGenre, $nomCreator, $dateSortie, $targetDir, $typesImages, $typesAudio);
    } else {
        $message = '<div class="alert alert-warning text-center" role="alert">Tous les champs doivent être remplis</div>';
    }
    var_dump($nbGenre);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une musique</title>

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
    <main class="container-fluid mainContainerIndex mt-5">
        <h2 class="text-center mb-4">Ajouter une Musique</h2>
        <div class="d-flex w-100 justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" class="formAjouterMusique mx-auto mx-md-4">
                <div class="d-flex my-2 flex-wrap">
                    <label class="form-label form-label-ajouterMusique">Les genres :</label>
                    <?php

                    $tableau = "<select id='nbGenre' class='form-control' name='nbGenre[]' multiple  >";
                    foreach ($genre as $value) {
                        if ($i == 0) {
                            $tableau .= "<option  value=" . $value['nomStyle'] . " selected>" . $value['nomStyle'] . "</option>";
                        } else {
                            $tableau .= "<option  value=" . $value['nomStyle'] . ">" . $value['nomStyle'] . "</option>";
                        }
                        $i++;
                    }
                    $tableau .= ' </select>';
                    echo $tableau;
                    ?>
                </div>
                <div class="d-flex my-2" id="selectedGenres"></div>

                <div class="d-flex my-2 flex-wrap">
                    <label class="form-label form-label-ajouterMusique" for="nomMusique">Nom de la musique :</label>
                    <input type="text" id="nomMusique" class="form-control w-100" name="nomMusique">
                </div>

                <div class="d-flex my-2 flex-wrap">
                    <label class="form-label form-label-ajouterMusique" for="nomCreator">Nom de l'artiste / groupe :</label>
                    <input id="nomCreator" type="text" class="form-control" name="nomCreator">
                </div>

                <div class="d-flex my-2 flex-wrap">
                    <label class="form-label form-label-ajouterMusique" for="dateSortie">Date de sortie:</label>
                    <input id="dateSortie" type="date" class="form-control" name="dateSortie">
                </div>  

                <div class="d-flex my-2 flex-wrap">
                    <label class="form-label form-label-ajouterMusique" for="imageMusique">Image de la musique : </label>
                    <input type="file" id="imageMusique" name="imageMusique" class="form-control" accept="image/png, image/jpg, image/jpeg">
                </div class="d-flex">

                <div class="d-flex my-2 flex-wrap">
                    <label class="form-label form-label-ajouterMusique" for=mp3Musique>Extrait de la musique : </label>
                    <input type="file" id="mp3Musique" name="mp3Musique" class="form-control" accept="audio/mp3">
                </div>

                <div class="d-flex my-2 justify-content-end">
                    <input class="btn btn-primary submitBtn" type="submit" name="submit" value="Ajouter musique">
                </div>
            </form>
        </div>
    </main>
    <div class="container">
        <?= $message ?>
    </div>
    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="./js/ajouterMusique.js"></script>
</body>

</html>