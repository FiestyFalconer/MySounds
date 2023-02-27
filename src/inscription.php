<?php
$submit = filter_input(INPUT_POST,'submit', FILTER_SANITIZE_SPECIAL_CHARS);
$nom = filter_input(INPUT_POST,'nom', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$motDePasse1 = filter_input(INPUT_POST, 'motDePasse1', FILTER_SANITIZE_SPECIAL_CHARS);
$motDePasse2 = filter_input(INPUT_POST, 'motDePasse2', FILTER_SANITIZE_SPECIAL_CHARS);

if($submit == 'submit'){
  if($nom != "" && $email != "" && $motDePasse1 != "" && $motDePasse2 != ""){

  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
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
                        <button type="submit" class="btn btn-primary btn-lg" value="submit">Submit</button>
                      </div>

                    </form>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </body>

  </html>
  <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>