<?php
session_start();

require_once "../src/model/connexionModel.php";
require_once "../src/model/inscriptionModel.php";
require_once "navBar.php";

$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_SPECIAL_CHARS);
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$motDePasse1 = filter_input(INPUT_POST, 'motDePasse1', FILTER_SANITIZE_SPECIAL_CHARS);
$motDePasse2 = filter_input(INPUT_POST, 'motDePasse2', FILTER_SANITIZE_SPECIAL_CHARS);

$passwordHash = "";
$message = "";

if ($submit == 'submit')
{
  if ($nom != "" && $email != "" && $motDePasse1 != "" && $motDePasse2 != "")
  {
    if ($motDePasse1 == $motDePasse2)
    {
      if (!VerificationUser($email))
      {
        // Crée un nouvel utilisateur avec le mot de passe hasher
        $passwordHash = password_hash($motDePasse1, PASSWORD_BCRYPT);
        NewUser($email, $nom, $passwordHash);

        // Affiche un message de success
        $message = '<div class="alert alert-success text-center" role="alert">Votre compte a été crée </div>';

        // Vide les informations du formulaire
        $nom = "";
        $email = "";
        $motDePasse1 = "";
        $motDePasse2 = "";
      }
      else
      {
        $message = '<div class="alert alert-warning text-center" role="alert">L\'email existe déjà</div>';
      }
    }
    else
    {
      $message = '<div class="alert alert-warning text-center" role="alert">Les mots de passe ne sont pas identiques</div>';
    }
  }
  else
  {
    $message = '<div class="alert alert-warning text-center" role="alert">Il faut remplir tous les champs</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>

  <!-- Fontawesome -->
  <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
  <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
  <link href="assets/fontawesome/css/regular.css" rel="stylesheet">

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
      <h1 class="text-center h1 fw-bold mt-4 mb-4">S'inscrire</h1>

      <?= $message ?>

      <form action="" method="post" class="py-4">

        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-user fa-lg me-3 fa-fw mb-4 formIcon"></i>
          <div class="form-outline flex-fill mb-0">
            <input type="text" id="nom" name="nom" class="form-control" value="<?=$nom?>">
            <label class="form-label" for="nom">Nom</label>
          </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-envelope me-3 fa-fw mb-4 formIcon"></i>
          <div class="form-outline flex-fill mb-0">
            <input type="email" id="email" name="email" class="form-control" value="<?=$email?>">
            <label class="form-label" for="email">Email</label>
          </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-lock fa-lg me-3 fa-fw mb-4 formIcon"></i>
          <div class="form-outline flex-fill mb-0">
            <input type="password" id="motDePasse" name="motDePasse1" class="form-control" value="<?=$motDePasse1?>">
            <label class="form-label" for="motDePasse1">Mot de passe</label>
          </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-key fa-lg me-3 fa-fw mb-4 formIcon"></i>
          <div class="form-outline flex-fill mb-0">
            <input type="password" id="motDePasse2" name="motDePasse2" class="form-control" value="<?=$motDePasse2?>">
            <label class="form-label" for="motDePasse2">Confirmer mot de passe</label>
          </div>
        </div>

        <div class="d-flex justify-content-center mb-3 mb-lg-4">
          <button type="submit" name="submit" class="btn btn-primary p-2 submitBtn" value="submit">Créer un compte</button>
        </div>

        <div class="container-fluid alert alert-heading alert-secondary text-center mt-4">
            <div>Vous avez déjà un compte ?
                <strong><a href="connexion.php" class="text-decoration-none text-primary">CONNECTER-VOUS ICI</a></strong>
            </div>
        </div>

      </form>

    </div>
  </main>
  <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>