<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Page d'inscription</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div id="body_login_page">
                <div id="top_side_main">
                    <fieldset>
                        <legend><b>Register yourself to have a permission to buy some games in our store</b></legend>
                    </fieldset>
                </div>
                <div class="container_login">
                    <form method="post">
                        <label for="nickname">Nickname:</label>
                        <span class="block_login">
                            <input type="text" placeholder="nickname" name="nickname" required class="input_login">
                            <i class='bx bx-male-female'></i>
                        </span>
                        <label for="email">Email:</label>
                        <span class="block_login">
                            <input type="email" placeholder="email" name="email" required class="input_login">
                            <i class='bx bxl-gmail'></i>
                        </span>
                        <label for="password">Password:</label>
                        <span class="block_login">
                            <input type="password" placeholder="password" name="password" required class="input_login">
                            <i class='bx bxs-lock-alt'></i>
                        </span>
                        <button type="submit" class="button">Register</button>
                    </form>
                    <br>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") 
                    {
                        $nickname = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRING);
                        $email= filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
                        
                        // variable connection à la BD
                        
                        $sql = new mysqli('localhost', 'root', 'root', 'register');

                        $verification = $sql -> query("SELECT * FROM `clients` WHERE `nickname` = '$nickname' OR `email` = '$email'");
                        
                        if(mysqli_num_rows($verification) > 0)
                        {
                            echo "Personne avec ses données est déjà inscrite";
                        }
                        else
                        {
                            $register = $sql -> query("INSERT INTO `clients` (`nickname`, `email`, `password`) VALUES ('$nickname', '$email', '$password')");
                            echo "Vous êtes bien inscrit(e). Connectez vous pour pouvoir accèder à votre compte";
                        }
                        $sql -> close();
                    }
                    ?>
                </div>
            <div id="bottom_side_main">
                <fieldset>
                    <legend><b>Comment nous contacter?</b></legend>
                    <ul class="bottom_etmini_info">
                        <li class="liste_abc_none_style"><a href="http://localhost/myhost-exemple/condition_de_vente.php">Les conditions de vente</a></li>
                        <?php if(isset($_SESSION['user'])) { ?>
                                <li class="liste_abc_none_style"><a href="http://localhost/myhost-exemple/assistance_page.php">Contactez-nous</a></li>
                            <?php } else { ?>
                                <li class="liste_abc_none_style">vous êtes pas connecté à votre compte pour écrire un message d'assistance !</li>
                            <?php } ?>
                        <li class="liste_abc_none_style"><a href="http://localhost/myhost-exemple/politique_de_confidentialite.php">Politique de confidentialité</a></li>
                        <br><hr>
                        <li class="liste_abc_none_style">Copyright © 2024 Lanzz Store - All rights reserved</li>
                    </ul>
                </fieldset>
            </div>
        </div>
    </body>
</html>