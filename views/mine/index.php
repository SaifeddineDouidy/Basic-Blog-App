<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <section class="container">
    <?php
        session_start(); // Start the session

        if(isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $message_type = $_SESSION['message_type'];
            unset($_SESSION['message']); // Clear the message to avoid displaying it again on page refresh
            unset($_SESSION['message_type']); // Clear the message type
            // Display the message with the appropriate styling
            echo "<div class='notification $message_type'>$message</div>";
        }
    ?>
        <header>Inscription</header>
        <form action="register.php" method="POST" class="form">

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
            <button type="submit" class="button" value="Sign Up" name="signUp">Inscription</button>
            
        </form>
    </section>
</body>
</html>