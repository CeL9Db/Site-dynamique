<?php
// On récupère nos variables de session
    session_start();
    include "db.php";
    // vérification si cette utilisateur existe (est connecté)
    if(isset($_SESSION['user']))
    {
        // on réccupère les données et les stocke dans $user
        $user = $_SESSION['user'];
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Assistance page</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="container_login">
            <form action="commentaire.php" method="post">
                <label for="message_support">Vous avez un souci? Laissez-nous un message pour qu'on puisse vous aider !</label>
                <span class="block_login">
                    <input type="text" placeholder="..." name="message_support" required class="input_login">
                    <i class='bx bx-male-female'></i>
                </span>
                <button type="submit" class="button">Envoyer</button>
            </form>
            </div>
    </body>
</html>