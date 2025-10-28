<?php
$isLogged = isset($_SESSION['is_logged']) && $_SESSION['is_logged'] === true;
$roles = isset($_SESSION['user']['roles']) ? json_decode($_SESSION['user']['roles'], true) : [];
if (!is_array($roles)) {
    $roles = [];
}
$isAdmin = in_array('ROLE_ADMIN', $roles);
?>

<nav>
    <ul>
        <li><a href="index.php">Liste des livres</a></li>

        <?php if ($isLogged): ?>
            <li><a href="book_search_form.php">Recherche</a></li>
            <li><a href="page_user.php">Accès utilisateur</a></li>
            <?php if ($isAdmin): ?>
                <li><a href="page_admin.php">Accès administrateur</a></li>
            <?php endif; ?>
            <li><a href="signout.php">Se déconnecter</a></li>
        <?php else: ?>
            <li><a href="page_anonymous.php">Accès visiteur</a></li>
            <li><a href="signup_form.php">S'inscrire</a></li>
            <li><a href="signin_form.php">Se connecter</a></li>
        <?php endif; ?>
    </ul>
</nav>