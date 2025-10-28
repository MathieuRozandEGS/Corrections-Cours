<?php
session_start();

include 'header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer le mail et le mot de passe ici
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        $message = "Tous les champs sont obligatoires.";
    } else {
        // Connexion BDD
        $user = "root";
        $pass = "root";
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=egs;charset=utf8', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL pour récupérer les infos de l'utilisateur à partir de l'email
            $stmt = $dbh->prepare('SELECT * FROM user WHERE email = ? LIMIT 1');
            $stmt->execute([$email]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si un utilisateur a été trouvé et si le mot de passe correspond
            if (!$userData) {
                $message = "L'e-mail n'existe pas dans notre base.";
            } elseif (!password_verify($password, $userData['password'])) {
                $message = "Le mot de passe est incorrect.";
            } else {
                // Connexion réussie : stocker les infos en session
                $_SESSION['is_logged'] = true;
                $_SESSION['user'] = [
                    'roles' => $userData['roles'],
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name']
                ];

                $message = "Bienvenue, " . htmlspecialchars($userData['first_name']) . " !";
                // Redirection possible vers l'accueil ou tableau de bord si souhaité
                // header('Location: index.php');
                // exit();
            }
        } catch (PDOException $e) {
            $message = 'Erreur : ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<main>
    <article>
        <h2>Confirmation de connexion</h2>
        <p><?= htmlspecialchars($message) ?></p>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </article>
</main>
<?php
include 'footer.php';
?>