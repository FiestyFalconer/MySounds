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
                $messageErreur = '<div class="alert alert-warning" role="alert">Email ou mot de passe incorrect</div>';
            }
        } else {
            $messageErreur = '<div class="alert alert-warning" role="alert">Email ou mot de passe incorrect</div>';
        }
    } else {
        $messageErreur = '<div class="alert alert-warning" role="alert">Saisissez votre email et mot de passe</div>';
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!--Navbar-->
        <?=$commmonNav?> 
    </header>
    <main class="container">
        <div class="container">
            <h1>Connexion</h1>

            <form action="" method="post">
                
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" value="<?=$email?>" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="motDePasse" id="motDePasse" class="form-control" />
                    <label class="form-label" for="motDePasse">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="submit">Submit</button>

                <div class="text-center">
                    <p>Pas de compte? <a href="#!"> Inscription</a></p>
                </div>

            </form>
        </div>

        <?= $messageErreur ?>

    </main>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>