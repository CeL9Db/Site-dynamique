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
    else
    {
        header("Location: login_page.php");
    }
    $query = mysqli_query($connection, "SELECT `url_fourn`, `img_fourn` FROM `fournisseurs` WHERE `id_fourn` = 2");
    $result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Personal page</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="separateur"></div>
        <div id="pers_page">
            <div class="side_bar">
                <fieldset>
                    <legend><b>Menu</b></legend>
                    <hr>
                </fieldset>
                <a href="http://localhost/myhost-exemple/personal_page.php">Mon information</a>
                <a href="http://localhost/myhost-exemple/personal_page_cle.php">Tes clès achetés</a>
                <a href="http://localhost/myhost-exemple/personal_page_commentaire_support.php">Commentaire</a>
                <a href="http://localhost/myhost-exemple/personal_page_histoire.php">Histoire des achats</a>
            </div>
            <div class="dashboard">
                <div class="produit_container">
                    <div class="produit">
                        <fieldset>
                            <legend><b>Dashboard</b></legend>
                            <hr>
                        </fieldset>
                        <h1>Vos informations:</h1>
                        <div>
                            <ul>
                                <li>nickname: <?php echo $user['nickname']; ?></li>
                                <li>email: <?php echo $user['email']; ?></li>
                                <li>password: <?php echo $user['password']; ?></li>
                            </ul>
                        </div>
                        <a href="http://localhost/myhost-exemple/lanzz_store_main.php"><img src="Icons_complémentaire/add.svg" class="icons_sous_bar">Voir plus de jeux</a>
                    </div>
                </div>
            </div>
            <div class="complementaire">
                <fieldset>
                    <legend><b>Complémentaire</b></legend>
                    <hr>
                </fieldset>
                <a href="http://localhost/myhost-exemple/lanzz_store_main.php"><img src="Icons_complémentaire/buy.svg" class="icons_sous_bar"> Acheter des produits</a>
                <span><hr></span>
                <fieldset class="links_stores_partenaires">
                    <a href="https://www.instant-gaming.com/fr/"><img src="Icons_complémentaire/instant_gaming_logo.svg" class="icons_sous_bar"></a>
                    <a href="<?php echo $result['url_fourn']; ?>"><img src="<?php echo $result['img_fourn']; ?>" class="icons_sous_bar"> </a>
                    <hr>
                </fieldset>
                <a href="logout.php"><img src="Icons_complémentaire/logout.svg" class="icons_sous_bar">Logout</a>
            </div>
        </div>
    </body>
</html>