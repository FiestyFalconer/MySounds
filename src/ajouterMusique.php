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
$tableauGenre = [];
$scriptGenres = "";

$i = 0;

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_SPECIAL_CHARS);

if ($submit == "Ajouter musique") {

    $image = $_FILES['imageMusique'];
    $musique = $_FILES['mp3Musique'];
    $nbGenre = $_POST['nbGenre'];
    $nomCreator = filter_input(INPUT_POST,'nomCreator',FILTER_SANITIZE_SPECIAL_CHARS);
    $dateSortie = filter_input(INPUT_POST, 'dateSortie', FILTER_SANITIZE_SPECIAL_CHARS);

   var_dump($image);

    $tableauGenre = array_unique($tableauGenre);
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
            <h1>Ajouter une Musique</h1>
        </div>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data" class="mx-1 mx-md-4">
                <p>
                    <label>Combien de genres:</label>
                    <?php

                    $tableau = "<select id='nbGenre' name='nbGenre[]' multiple  >";
                    foreach($genre as $value) {
                        if($i == 0){
                            $tableau .= "<option  value=" . $value['nomStyle'] . " selected>" . $value['nomStyle'] . "</option>";
                        }else{
                            $tableau .= "<option  value=" . $value['nomStyle'] . ">" . $value['nomStyle'] . "</option>";
                        }
                        $i++;
                    }
                    $tableau .= ' </select>';
                    echo $tableau;
                    ?>
                </p>
                <p id="selectedGenres"></p>
                
                <label for="nomMusique">Nom de la musique :</label>
                <input type="text" id="nomMusique" name="nomMusique">
                <br>
                <label for="nomCreator">Creator/Bande :</label>
                <input id="nomCreator" type="text" name="nomCreator">
                <br>
                <label for="dateSortie">Date :</label>
                <input id="dateSortie" type="date" name="dateSortie">
                <br>
                <label for="imageMusique">Image de la musique :</label>
                <input type="file" id="imageMusique" name="imageMusique" accept="image/png, image/jpg, image/jpeg">
                <br>
                <label for=mp3Musique>Extrait de la musique :</label>
                <input type="file" id="mp3Musique"  name="mp3Musique" accept="audio/mp3>
                <br>
                <input type="submit" name="submit" value="Ajouter musique">

            </form>
        </div>
    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="./js/ajouterMusique.js"></script>
</body>

</html>