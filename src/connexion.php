<?php
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$motDePasse = filter_input(INPUT_POST, 'motDePasse', FILTER_SANITIZE_SPECIAL_CHARS);

$messageErreur = "";

if ($email != "" && $motDePasse != "") {
    
} else {
    $messageErreur = "Il faut mettre un email et un mot de passe";
}
?>
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
    <main class="container">
        <div class="container">
            <h1>Connexion</h1>

            <form>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="motDePasse" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

            </form>
        </div>
    </main>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>