<?php
session_start();

if (!isset($_SESSION['idUser'])) {
    $_SESSION = [
        'idUser' => '',
        'connected' => false,
        'admin' => false
    ];
}
require_once "navBar.php";
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
        <h2 class="text-center mb-4">3 musiques aléatoires</h2>
        <div class="d-flex cardContainer bg-light">
            <div class="card m-3 w-100">
                <img class="card-img-top medias mx-auto mt-4" src="./upload/ocean.jpg" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Nom de la musique</h5>
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <p class="card-text">Style de musique</p>
                    <p class="card-text">Date de sortie</p>
                    <audio controls class="w-100">
                        <source src="./upload/Watch-The-World-Burn.mp3" type="audio/mp3">
                    </audio>
                </div>
            </div>

            <div class="card m-3 w-100">
                <img class="card-img-top medias mx-auto mt-4" src="./upload/photoProfil.png" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Nom de la musique</h5>
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <p class="card-text">Style de musique</p>
                    <p class="card-text">Date de sortie</p>
                    <audio controls class="w-100">
                        <source src="./upload/Watch-The-World-Burn.mp3" type="audio/mp3">
                    </audio>
                </div>
            </div>

            <div class="card m-3 w-100">
                <img class="card-img-top medias mx-auto mt-4" src="./upload/fondEcran.png" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Nom de la musique</h5>
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <p class="card-text">Style de musique</p>
                    <p class="card-text">Date de sortie</p>
                    <audio controls class="w-100">
                        <source src="./upload/Watch-The-World-Burn.mp3" type="audio/mp3">
                    </audio>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>