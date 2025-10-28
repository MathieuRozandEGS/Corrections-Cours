<?php
include 'header.php';

// Récupération des infos du formulaire dans des variables
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName = trim($_POST['last_name'] ?? '');
    $pseudo = trim($_POST['pseudo'] ?? '');
    $about = trim($_POST['about'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$firstName || !$lastName || !$pseudo || !$about || !$email || !$password) {
        $message = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'L\'adresse email est invalide.';
    } else {
        try {
            // Connexion BDD
            $user = "root";
            $pass = "root";
            $dbh = new PDO('mysql:host=localhost;dbname=egs;charset=utf8', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL via le mail ou pseudo pour vérification doublons
            $stmt = $dbh->prepare('SELECT COUNT(*) FROM user WHERE email = ? OR pseudo = ?');
            $stmt->execute([$email, $pseudo]);
            if ($stmt->fetchColumn() > 0) {
                $message = 'Un utilisateur avec ce mail ou pseudo existe déjà.';
            } else {
                // Hachage du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insertion dans la base
                $insert = $dbh->prepare(
                    'INSERT INTO user (first_name, last_name, pseudo, about, email, password, roles)
                     VALUES (?, ?, ?, ?, ?, ?, ?)'
                );
                $defaultRole = json_encode(['ROLE_USER']);
                $result = $insert->execute([$firstName, $lastName, $pseudo, $about, $email, $hashedPassword, $defaultRole]);

                if ($result) {
                    $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                } else {
                    $message = "Une erreur est survenue lors de l'inscription.";
                }
            }
        } catch (PDOException $e) {
            $message = "Erreur : " . $e->getMessage();
        }
    }
}
?>

<main>
    <article>
        <h2>Retour d'inscription</h2>
        <p><?= htmlspecialchars($message) ?></p>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </article>
</main>

<?php
include 'footer.php';
?>