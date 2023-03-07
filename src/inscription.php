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

if ($submit == 'submit') {
  if ($nom != "" && $email != "" && $motDePasse1 != "" && $motDePasse2 != "") {
    if ($motDePasse1 == $motDePasse2) {
      if (!VerificationUser($email)) {
        $message = '<div class="alert alert-success" role="alert">Votre compte a été crée</div>';
        $passwordHash = password_hash($motDePasse1, PASSWORD_BCRYPT);
        NewUser($email, $nom, $passwordHash);
      } else {
        $message = '<div class="alert alert-warning" role="alert">L\'email existe déjà</div>';
      }
    } else {
      $message = '<div class="alert alert-warning" role="alert">Les mots de passe ne sont pas identiques</div>';
    }
  } else {
    $message = '<div class="alert alert-warning" role="alert">Il faut remplir tous les champs</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>

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
    <section class="container-fluid">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inscription</p>

                  <form action="" method="post" class="mx-1 mx-md-4">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="nom" name="nom" class="form-control" />
                        <label class="form-label" for="nom">Nom</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="motDePasse" name="motDePasse1" class="form-control" />
                        <label class="form-label" for="motDePasse1">Mot de passe</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="motDePasse2" name="motDePasse2" class="form-control" />
                        <label class="form-label" for="motDePasse2">Confirmer mot de passe</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg" value="submit">Submit</button>
                    </div>

                  </form>

                  <?= $message ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>