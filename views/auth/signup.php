<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="public/css/signup.css" rel="stylesheet">
</head>
<body>
    <section class="container">
        <header>Inscription</header>
        <form method="post" action="register.php">

            <?php if(isset($message)): ?>
            <div class="notification <?= $message_type ?>"><?= $message ?></div>
            <?php endif; ?>

            <div class="input-box">
                <label>Nom d'utilisateur</label>
                <input type="text" placeholder="Entrer votre nom" name="username" required>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="email" placeholder="Entrer votre Email" name="email" required>
            </div>

            <div class="input-box">
                <label>Mot de passe</label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
            </div>
            <button type="submit" class="button" value="Sign Up" name="signup">Inscription</button>
            
        </form>
    </section>
</body>
</html>