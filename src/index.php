<?php
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

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <div class="container-fluid">

                <a class="navbar-brand my-1" id="navTitle" href="index.php"><i class="fa-2xl fa-solid fa-headphones"></i> MySounds</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mx-lg-5" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-lg-0" id="navFirstUl">
                        <li class="nav-item mx-1">
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xl"></i> Accueil</a>
                        </li>

                        <?= $gestionDesMusiques?>

                        <li class="nav-item mx-2" id="search">
                            <form class="d-flex" method="post">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-flex justify-content-center" id="navSecondUl">
                        <?=$nav?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>

    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>