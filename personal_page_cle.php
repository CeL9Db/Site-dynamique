<?php
// On récupère nos variables de session
    session_start();
    include "db.php";
    if(isset($_SESSION['user']))
    {
        // Достать информацию о пользователе из сеанса
        $user = $_SESSION['user'];
    }
    $result = $sql -> query("SELECT * FROM `clients` WHERE `nickname` = '$nickname' AND `email` = '$email' AND `password` = '$password'");

    $user = $result -> fetch_assoc();    // переменная user в форме массива из данных переменной result
    print_r($user);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Clès achetés</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="separateur"></div>
        <div id="pers_page">
            <div class="side_bar">
                <fieldset>
                    <legend><b>Menu</b></legend>
                </fieldset>
                <a href="http://localhost/myhost-exemple/personal_page.php">Mon information</a>
                <a href="http://localhost/myhost-exemple/personal_page_cle.php">Tes clès achetés</a>
                <a href="http://localhost/myhost-exemple/personal_page_support.php">Commentaire</a>
                <a href="http://localhost/myhost-exemple/personal_page_histoire.php">Histoire des achats</a>
            </div>
            <div class="dashboard">
                <div class="produit_container">
                    <div class="produit">
                        <fieldset>
                            <legend><b>Dashboard</b></legend>
                        </fieldset>
                        <h1>Vos clès achetés:</h1>
                        <div>
                            <ul>
                                <li><?php echo $user['nickname']; ?></li>
                                <li><?php echo $user['email']; ?></li>
                                <li><?php echo $user['password']; ?></li>
                            </ul>
                        </div>
                        <a href="http://localhost/myhost-exemple/lanzz_store_main.php"><img src="Icons_complémentaire/add.svg" class="icons_sous_bar">Voir plus de jeux</a>
                    </div>
                </div>
            </div>
            <div class="complementaire">
                <fieldset>
                    <legend><b>Complémentaire</b></legend>
                </fieldset>
                <a href="http://localhost/myhost-exemple/lanzz_store_main.php"><img src="Icons_complémentaire/buy.svg" class="icons_sous_bar"> Acheter des produits<hr></a>
                <fieldset class="links_stores_partenaires">
                    <a href="https://www.instant-gaming.com/fr/"><img src="Icons_complémentaire/instant_gaming_logo.svg" class="icons_sous_bar"></a>
                    <a href="https://store.steampowered.com/?l=french"><img src="Icons_complémentaire/steam_logo.svg" class="icons_sous_bar"> </a>
                </fieldset>
            </div>
        </div>
    </body>
</html>