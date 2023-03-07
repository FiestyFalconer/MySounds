<?php

$adminNav ="";
$userNav = "";

/* Affiche uniquement si l'utilisateur est connecter */
if ($_SESSION['connected'] == true)
{
    $userNav = '
    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="deconnexion.php"><i class="fa-solid fa-right-from-bracket fa-xl"></i> Déconnexion</a>
    </li>

    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="profil.php"><i class="fa-solid fa-user fa-xl"></i> Profil</a>
    </li>
    ';

    /* Affiche uniquement si l'utilisateur est connecté entant qu'administrateur */
    if($_SESSION['admin'] == true)
    {
        $adminNav = '
        <li class="nav-item mx-1">
            <a class="nav-link active" aria-current="page" href="musiquesAdmin.php"><i class="fa-solid fa-hammer fa-xl"></i> Liste des musiques</a>
        </li>';
    }
}
else
{
    /* Affiche uniquement si l'utilisateur n'est pas connecter */
    $userNav = '
    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="inscription.php"><i class="fa-solid fa-user-plus fa-xl"></i> Inscription</a>
    </li>

    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="connexion.php"><i class="fa-solid fa-arrow-right-to-bracket fa-xl"></i> Connexion</a>
    </li>
    ';
}

// Navbar du site
$commmonNav = '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand my-1" id="navTitle" href="index.php"><i class="fa-2xl fa-solid fa-headphones"></i> MySounds</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-lg-0" id="navFirstUl">
                <li class="nav-item mx-1">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xl"></i> Accueil</a>
                </li>

                '.$adminNav.'

                <li class="nav-item mx-1" id="search">
                    <form class="d-flex" method="post">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav d-flex justify-content-center" id="navSecondUl">
                '.$userNav.'
            </ul>
        </div>
    </div>
</nav>';
?>
