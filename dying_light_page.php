<?php
    // connect avec bd
    include "db.php";

    // vérification pour l'adresse de la page
    $current_page = $_SERVER['PHP_SELF'];

    if($current_page == "/myhost-exemple/dying_light_page.php")
    {
        $query = mysqli_query($connection, "SELECT `visuel`.*, `produits`.`nom_produit`, `produits`.`prix_produit`, `produits`.`restriction_age`, `produits`.`date_sortie`, `fournisseurs`.`nom_fourn`,`fournisseurs`.`url_fourn`,`fournisseurs`.`img_fourn`, `createurs`.`nom_createur`, `type_produit`.`nom` FROM `produits`
                                            LEFT JOIN `type_produit` ON `produits`.`code_type_produit` = `type_produit`.`id_type`
                                            LEFT JOIN `fournisseurs` ON `produits`.`code_fourn` = `fournisseurs`.`id_fourn`
                                            LEFT JOIN `createurs` ON `produits`.`code_createur` = `createurs`.`id_createur`
                                            LEFT JOIN `visuel` ON `produits`.`id_produit` = `visuel`.`id`
                                            WHERE `produits`.`id_produit` = 2");
        $result = $query -> fetch_all(MYSQLI_ASSOC);
    }

    session_start();
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
        <title>Dying light</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <?php foreach ($result as $data): ?>
        <div class="highlight_banner">
            <img src="<?php echo $data['highlight']; ?>" id="highlights_absolute">
        </div>
        <div id="game_page">
            <div class="left_side_game">
                <img src="<?php echo $data['icon']; ?>" class="icon_jeu">
            </div>
            <div class="right_side_game">
                <span>
                    <?php echo $data['nom_produit']." - ". $data['nom_fourn']?>
                    <hr>
                </span>
                <div class="sub_info">
                    <div>
                        <a href="<?php echo $data['url_fourn']; ?>"><img src="<?php echo $data['img_fourn']; ?>" class="icons_sous_bar" id="checkmark"></a>
                        <a>Téléchargement digital</a>
                        <form action="http://localhost/myhost-exemple/favor_page.php" method="post">
                            <input type="hidden" name="id_jeu" value="<?php echo $data['id'];?>"> <!-- ID de jeu -->
                            <button type="submit" class="button">Ajouter au panier</button>
                        </form>
                    </div>
                    <div>
                        <span>Développeur : <?php echo $data['nom_createur']; ?></span>
                        <span>Classification : <?php echo $data['restriction_age']; ?></span>
                        <span>Prix : <?php echo $data['prix_produit']; ?> €</span>
                        <span>Date sortie : <?php echo $data['date_sortie']; ?></span>
                        <span>Genre : <?php echo $data['nom']; ?></span>
                    </div>
                </div>
            </div>
            <div class="visuels_game">
                <div class="video_1">
                    <video preload="1" autoplay="none" controls disablePictureInPicture class="video_jeu_page">
                        <source src="<?php echo $data['video'] ?>">
                    </video>
                </div>
                <div class="photo_1">
                    <img src="<?php echo $data['img_1']; ?>" class="photo_jeu_page">
                </div>
                <div class="photo_2">
                    <img src="<?php echo $data['img_2']; ?>" class="photo_jeu_page">
                </div>
                <div class="photo_3">
                    <img src="<?php echo $data['img_3']; ?>" class="photo_jeu_page">
                </div>
                <div class="photo_4">
                    <img src="<?php echo $data['img_4']; ?>" class="photo_jeu_page">
                </div>
                <div class="photo_5">
                    <img src="<?php echo $data['img_5']; ?>" class="photo_jeu_page">
                </div>
            </div>
            <div class="configuration_game">
                <fieldset>
                    <legend><b>configuration</b></legend>
                    <br><br>
                    <hr>
                    <h2>Minimum (1080p 30fps)</h2>
                    <hr>
                    <ul type="*">
                        <span>  
                            <li class="liste_abc_none_style">OS: Windows® 7 64-bit / Windows® 8 64-bit / Windows® 8.1 64-bit</li>
                            <li class="liste_abc_none_style">CPU: Intel® Core™ i5-2500 @3.3 GHz / AMD FX-8320 @3.5 GHz</li>
                            <li class="liste_abc_none_style">RAM: 4 GB DDR3</li>
                            <li class="liste_abc_none_style">GPU: NVIDIA® GeForce® GTX 560 / AMD Radeon™ HD 6870</li>
                            <li class="liste_abc_none_style">VRAM: 1 GB</li>
                            <li class="liste_abc_none_style">Direct X: 11</li>
                        </span>
                    </ul>
                    <hr>
                    <h2>Recommendée (1080p 60fps)</h2>
                    <hr>
                    <ul type="*">
                        <span>  
                            <li class="liste_abc_none_style">OS: Windows® 7 64-bit / Windows® 8 64-bit / Windows® 8.1 64-bit</li>
                            <li class="liste_abc_none_style">CPU: Intel® Core™ i5-4670K @3.4 GHz / AMD FX-8350 @4.0 GHz</li>
                            <li class="liste_abc_none_style">RAM: 8 GB DDR3</li>
                            <li class="liste_abc_none_style">GPU: NVIDIA® GeForce® GTX 780 / AMD Radeon™ R9 290</li>
                            <li class="liste_abc_none_style">VRAM : 2 GB</li>
                            <li class="liste_abc_none_style">Direct X : 11</li>
                        </span>
                    </ul>
                </fieldset>
            </div>
            <div class="actualites_game">
                <fieldset>
                    <legend><b>actualités</b></legend>
                    <br><br>
                    <div class="actualite">
                        <img src="<?php echo $data['actualite_1']; ?>" class="photo_jeu_page">
                        <a href="https://www.jeuxvideo.com/news/1463296/dying-light-debarque-sur-switch-tres-bientot.htm"><span><b>Dying Light : Les zombies débarquent sur Switch très bientôt</b> <br><br>Dying Light 2 sortira dans quelques mois sur la majorité des consoles, mais la Switch n'a pas encore accueilli le premier épisode. On vient d'apprendre que c'est pour bientôt !</span></a>
                    </div>
                    <div class="actualite">
                        <img src="<?php echo $data['actualite_2']; ?>" class="photo_jeu_page">
                        <a href="https://www.jeuxvideo.com/news/1585091/dying-light-vient-faire-de-la-concurrence-a-dying-light-2-avec-une-definitive-edition.htm"><span><b>Dying Light vient faire de la concurrence à Dying Light 2 avec une Definitive Edition</b> <br><br>En 2015, pour appâter les joueurs sur la huitième génération de consoles, Techland dévoile Dying Light, un titre qui mélange parkour à la Mirror's Edge et dégommage de zombies à l'image de Dead Island.</span></a>
                    </div>
                    <div class="actualite">
                        <img src="<?php echo $data['actualite_3']; ?>" class="photo_jeu_page">
                        <a href="https://www.jeuxvideo.com/news/1571230/dying-light-n-est-pas-mort-et-mise-tout-sur-ses-dlc.htm"><span><b>Dying Light n’est pas mort et mise tout sur ses DLC</b> <br><br>Dying Light semble être toujours au cœur de l’actualité et fait parler de lui autour de ses DLC. Sorti en 2015 et malgré la sortie du second opus, Techland n’en oublie pas pour autant son survival-horror et propose toujours plus de contenu aux joueurs dès aujourd’hui.</span></a>
                    </div>
                </fieldset>
            </div>

        <?php endforeach; ?>

            <div class="commentaire">
                <div class="container_login">
                    <form action="commentaire.php" method="post">
                        <label for="commentaire_jeu">Laisser nous votre petit commentaire sur ce jeu :]</label>
                        <span class="block_login">
                            <input type="text" placeholder="..." name="commentaire_jeu" required class="input_login">
                            <i class='bx bx-male-female'></i>
                        </span>
                        <button type="submit" class="button">Envoyer</button>
                    </form>
                </div>
            </div>
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
                    <div class="bottom"></div>
                </fieldset>
                <label for="checker" class="more_button"></label>
            </div>
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
                        </ul>
                </fieldset>
            </div>
        </div>
    </body>
</html>