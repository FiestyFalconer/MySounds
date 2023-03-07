<?php
session_start();

require_once "../src/model/connexionModel.php";
require_once "navBar.php";

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$motDePasse = filter_input(INPUT_POST, 'motDePasse', FILTER_SANITIZE_SPECIAL_CHARS);

$messageErreur = "";

if ($submit == "submit") {

    if ($email != "" && $motDePasse != "") {
        if (VerificationUser($email)) {
            $_SESSION['idUser'] = VerificationUser($email)['idUser'];

            if (password_verify($motDePasse, VerificationUser($email)['motDePasse'])) {
                $_SESSION['connected'] = true;
                $_SESSION['admin'] = VerificationUser($email)['admin'];
                header("Location: ../src/index.php");
            } else {
                $_SESSION['idUser'] = "";
                $messageErreur = '<div class="alert alert-warning text-center" role="alert">Email ou mot de passe incorrect</div>';
            }
        } else {
            $messageErreur = '<div class="alert alert-warning text-center" role="alert">Email ou mot de passe incorrect</div>';
        }
    } else {
        $messageErreur = '<div class="alert alert-warning text-center" role="alert">Saisissez votre email et mot de passe</div>';
    }
}
// var_dump($_SESSION['connected']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Fontawesome -->
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!--Navbar-->
        <?= $commmonNav ?>
    </header>
    <main class="container-fluid mainContainer mt-5">
        <div class="d-flex flex-column justify-content-center text-black w-100">
            <h1 class="text-center h1 fw-bold mt-4 mb-4">Se connecter</h1>

            <?= $messageErreur ?>

            <form action="" method="post" class="py-4">

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope me-3 fa-fw mb-4 formIcon"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" id="email" value="<?= $email ?>" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw mb-4 formIcon"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="password" name="motDePasse" id="motDePasse" class="form-control" />
                        <label class="form-label" for="motDePasse">Mot de passe</label>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg submitBtn" value="submit">Se connecter</button>
                </div>

                <div class="container-fluid alert alert-heading alert-secondary text-center mt-4">
                    <div>Vous n'avez pas de compte ?
                        <strong><a href="inscription.php" class="text-decoration-none text-primary">INSCRIVEZ-VOUS ICI</a></strong>
                    </div>
                </div>

            </form>
        </div>
    </main>
    
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>