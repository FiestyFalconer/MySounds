<?php
    /* Affiche uniquement si l'utilisateur est admin */
    $gestionDesMusiques = '
    <li class="nav-item mx-1">
        <a class="nav-link active" aria-current="page" href="musiquesAdmin.php"><i class="fa-solid fa-hammer fa-xl"></i> Liste des musiques</a>
    </li>';

    /* Affiche uniquement si l'utilisateur est connecter */
    $nav = '
    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="inscription.php"><i class="fa-solid fa-user-plus fa-xl"></i> Inscription</a>
    </li>

    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="connexion.php"><i class="fa-solid fa-arrow-right-to-bracket fa-xl"></i> Connexion</a>
    </li>
    ';

    /* Affiche uniquement si l'utilisateur n'est pas connecter */
    $nav = '
    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="deconnexion.php"><i class="fa-solid fa-right-from-bracket fa-xl"></i> Déconnexion</a>
    </li>

    <li class="nav-item mx-2">
        <a class="nav-link active" aria-current="page" href="profil.php"><i class="fa-solid fa-user fa-xl"></i> Profil</a>
    </li>
    ';
?>
