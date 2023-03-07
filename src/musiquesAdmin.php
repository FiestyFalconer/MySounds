<?php
session_start();
require_once "navBar.php";

if (!$_SESSION['admin']) {
    header("Location: ../src/index.php");
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <!-- Fontawesome -->
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
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


    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>