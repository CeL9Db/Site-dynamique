<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Page de connection</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div id="body_login_page">
                <div id="top_side_main">
                    <fieldset>
                        <legend><b>Login yourself to have a permission to buy some games in our store</b></legend>
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
                        <button type="submit" class="button">Login</button>
                    </form>
                    <br>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            $nickname = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRING);
                            $email= filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                            $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    
                            // variable-connect à la BD
                            $sql = new mysqli('localhost', 'root', 'root', 'register');
    
                            // requête sql pour vérifier l'information introduite par l'utilisateur par rapport à son connection
                            $result = $sql -> query("SELECT * FROM `clients` WHERE `nickname` = '$nickname' AND `email` = '$email' AND `password` = '$password'");
    
                            $user = $result -> fetch_assoc();    // une variable qui contien un massive associative
                            
                            // vérification pour la connection
                            if (count($user) == 0)
                            {
                                echo "Vous êtes nouveau client? Inscrivez-vous !";
                                echo "<br><br>";
                                exit();
                            }
                            // si y'a au moins 1 donnée bien introduit
                            else if (count($user) == 1 || count($user) == 2)
                            {
                                echo "Les donnée(s) que vous avez saisi sont pas correctes";
                                echo "<br><br>";
                                exit();
                            }
                            else 
                            {
                                session_start();
                                $_SESSION['user'] = $user;
                                header('Location: http://localhost/myhost-exemple/personal_page.php');
                            }
                        }
                    ?>
                    <a href="register_page.php">Don't have an account?</a>
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