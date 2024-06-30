<?php
    // connection à la BD
    include "db.php";

    $query = mysqli_query($connection, "SELECT COUNT(`nom_produit`) AS `sum_produit`,`img`, `url`, `video`, `grid_placement` FROM `produits` GROUP BY `nom_produit` HAVING `img` IS NOT NULL AND CHAR_LENGTH(`img`) > 0 AND 
                                                                                                                                                                         `url` IS NOT NULL AND CHAR_LENGTH(`url`) > 0 AND 
                                                                                                                                                                         `video` IS NOT NULL AND CHAR_LENGTH(`video`) > 0 AND 
                                                                                                                                                                         `grid_placement` IS NOT NULL AND CHAR_LENGTH(`grid_placement`) > 0");
    
    $result = $query -> fetch_all(MYSQLI_ASSOC);
    $count_jeux = 0;
    foreach ($result as $data) 
    {
        $count_jeux += $data['sum_produit'];
    }

    $query_1 = mysqli_query($connection, "SELECT `visuel`.`highlight`, `produits`.`prix_produit`, `produits`.`url`, `produits`.`nom_produit` FROM `visuel`, `produits` WHERE `produits`.`id_produit` = 7 and `produits`.`id_produit` = `visuel`.`id`");
    $result_dogma = $query_1 -> fetch_assoc();
    
    session_start();
    if(isset($_SESSION['user']))
    {
        // on réccupère les données de l'utilisateur
        $user = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Lanzz store</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="highlight_banner">
            <img src="<?php echo $result_dogma['highlight']; ?>" id="highlights">
            <div class="content">
                <a href="<?php echo $result_dogma['url']; ?>" class="banner_title"><?php echo $result_dogma['nom_produit']; ?></a>
                <div class="prix"><?php echo $result_dogma['prix_produit']; ?> €</div>
            </div>
        </div>
        <div id="body_menu_main">
            <div class="top_side_main">
                <fieldset>
                    <legend><b>Jeux les plus populaires en ce moment</b></legend>
                </fieldset>
                <?php echo "Il y'a : " . $count_jeux . " jeux pour l'instant"?>
            </div>
            <?php foreach ($result as $data): ?>
            <div class="card_container <?php echo $data['grid_placement']; ?>">
                <div class="card">
                    <div class="card_front">
                        <img src="<?php echo $data['img']; ?>" class="games_icons">
                    </div>
                    <div class="card_back">
                        <a href="<?php echo $data['url']; ?>">
                            <video muted preload="auto" autoplay="none" disablePictureInPicture poster ="<?php echo $data['img']; ?>" class="video_background_card">
                                <source src="<?php echo $data['video']; ?>"/>
                            </video>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="above_bottom_side_main">
            <input type="checkbox" id="checker">
                <fieldset class="limited l-200">
                    <legend><b>mini information</b></legend>
                    <ul class="bottom_etmini_info">
                        <br><br>
                        <h2><b>Qu'est-ce que le Lanzz Store ?</b></h2>
                        <hr>
                        <br>
                        <li class="liste_abc_none_style">
                            Dans notre boutique en ligne, vous pouvez garantir l'achat 
                            de clés de jeux de Steam, Uplay, Battle.net et d'autres 
                            plateformes de jeux populaires. Notre boutique met tout 
                            en œuvre pour que vos achats soient rapides, avec un 
                            maximum de commodité et de sécurité, et que les prix 
                            restent aussi abordables que possible.
                        </li>
                        <li class="liste_abc_none_style">
                            Il vous suffit d'indiquer votre adresse électronique lors 
                            de la commande et de choisir un mode de paiement pratique. 
                            Vous recevrez ensuite un mot de passe vous permettant 
                            d'accéder à votre armoire personnelle, où vous recevrez 
                            une clé d'activation.
                        </li>
                        <br>
                        <h2><b>Nos avantages</b></h2>
                        <hr>
                        <br>
                        <li class="liste_abc_none_style">Une gamme de jeux toujours plus étendue</li>
                        <li class="liste_abc_none_style">
                            Le support technique du site aidera à répondre à toutes 
                            les questions qui se posent et à les résoudre rapidement.
                        </li>
                        <li class="liste_abc_none_style">Nous acceptons les paiements par carte bancaire (Visa, MasterCard) et sommes certifiés par PayPal.</li>
                        <li class="liste_abc_none_style">
                            Possibilité d'obtenir une remise allant jusqu'à 25 % lors 
                            des événements saisonniers. Plus le nombre d'achats est élevé, 
                            plus les chances d'obtenir une réduction sur les achats futurs 
                            sont grandes.
                        </li>
                        <li class="liste_abc_none_style">Nous achetons les clés en gros auprès de revendeurs agréés travaillant directement avec les éditeurs.</li>
                        <li class="liste_abc_none_style">Nous surveillons régulièrement les autres grands détaillants en ligne et sommes prêts à offrir le prix le plus bas.</li>
                        <br>
                        <li class="liste_abc_none_style">
                            Travaillant sur le marché des jeux informatiques depuis 2024, 
                            nous avons acquis une expérience inestimable, écouté attentivement 
                            toutes les opinions et tous les souhaits des acheteurs. Grâce à 
                            un travail constant, notre service devient aussi simple et pratique 
                            que possible, et la procédure d'achat devient incroyablement facile.
                        </li>
                    </ul>
            <div class="bottom_side_main">
                <fieldset>
                    <legend><b>LANZZ STORE</b></legend>
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
                            <hr>
                        </ul>
                </fieldset>
            </div>
            <div class="bottom"></div>
                </fieldset>
                <label for="checker" class="more_button"></label>
            </div>
        </div>
    </body>
</html>