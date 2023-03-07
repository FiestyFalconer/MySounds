<?php
    session_start();

    require_once "navBar.php";

    if(!isset($_SESSION['idUser'])){
        $_SESSION = [
            'idUser' => '',
            'connected' => false,
            'admin' => false
        ];
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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!--Navbar-->
        <?=$commmonNav?> 
    </header>
    <main>

    </main>
    <footer>

    </footer>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>