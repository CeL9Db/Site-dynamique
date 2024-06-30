<?php
    // connection à la BD
    include "db.php";
    session_start();
    // Vérification si qqchose a été envoyé juste avant avec la méthode POST et s'il existe une variable id_jeu
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_jeu'])) 
    {
        // vérification l'existence de connection de l'utilisateur
        if (isset($_SESSION['user']))
        {     
            // on réccupère les données de l'utilisateur
            $user = $_SESSION['user'];

            // réccupere l'id de jeu
            $id_jeu = $_POST['id_jeu'];

            // requête sql
            $query_produit = mysqli_query($connection, "SELECT `produits`.`nom_produit`, `produits`.`prix_produit`, `fournisseurs`.`nom_fourn`, `createurs`.`nom_createur` FROM `produits` 
            LEFT JOIN `fournisseurs` ON `produits`.`code_fourn` = `fournisseurs`.`id_fourn` 
            LEFT JOIN `createurs` ON `produits`.`code_createur` = `createurs`.`id_createur`
            WHERE `produits`.`id_produit` = $id_jeu");
            if($query_produit)
            {
                $result_produit = $query_produit -> fetch_all(MYSQLI_ASSOC);

                // faisons le stockage de ce jeu ajouté au panier
                $_SESSION['jeu'][] = $result_produit;
                // print_r($_SESSION['jeu']);
            }
        }
        else 
        {
            $message = "Erreur. L'utilisateur n'est pas connecté";
            echo "<div style='text-align: center; color: white; padding: 10px; font-size:25px'>$message</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Panier et wishlist</title>
        <link rel="stylesheet" href="style.css">
        <?php include('header.php'); ?>
    </head>
    <body>
        <div class="payement_page">
            <div class="panier_et_wishlist">
                <div class="panier">
                    <div class="headers_payement_page">
                        <h4>Panier :<hr></h4>
                    </div>
                    <div class="produit_container">
                    <!-- faisons 2 fois la boucle foreach pour accèder à l'information d'un double array -->
                    <?php
                        if (isset($_SESSION['jeu']) && !empty($_SESSION['jeu'])) 
                        {
                            foreach ($_SESSION['jeu'] as $cle => $jeu) 
                            {
                                foreach ($jeu as $data) 
                                {
                                    echo "<div class='produit'>";
                                    echo "<span>Nom : " . $data['nom_produit'] . "</span><br><br>";
                                    echo "<span>Createur : " . $data['nom_createur'] . "</span><br><br>";
                                    echo "<span>Fournisseur : " . $data['nom_fourn'] . "</span><br><br>";
                                    echo "<span>Prix : " . $data['prix_produit'] . " €</span>";
                                    echo "<a href='supprimer_article.php ?cle=$cle'>Supprimer l'article</a>";
                                    echo "<hr>";
                                    echo "</div>";
                                }
                            }
                        } 
                        else 
                        {
                            echo "<div class='produit'>";
                            echo "<span style = 'padding = 25px;'>Vous avez rien choisi</span>";
                            echo "</div>";
                        }
                        // print_r($_SESSION['jeu']);
                    ?>
                    </div>
                </div>
            </div>
            <div class="resume_calc">
                <div class="calc">
                    <div class="headers_payement_page">
                        <h4>Resumé de votre panier :<hr></h4>
                    </div>
                        <!-- faisons 2 fois la boucle foreach pour accèder à l'information d'un double array -->
                        <?php
                            
                            if (empty($_SESSION['jeu'])) 
                            {
                                echo "<div class='produit_container'>";
                                echo "<div class='produit'>";
                                echo "<span style = 'padding = 25px;'>Vous avez rien choisi</span>";
                                echo "</div>";
                                echo "</div>";
                                $prix_final = 0;
                            }
                            else
                            {
                                foreach ($_SESSION['jeu'] as $jeu):
                                    foreach ($jeu as $data):
                                        $prix_final = 0;
                                        for($i = 0; $i < count($_SESSION['jeu']); $i++)
                                        {
                                            $prix_final += $_SESSION['jeu'][$i][0]['prix_produit'];
                                            // echo "<br>".$prix_final;
                                        }
                                    endforeach;
                                endforeach; 
                            }
                        ?>
                    <div class="produit_container">
                        <div class="produit">
                            <?php 
                                if($prix_final > 0)
                                {
                                    echo "<span style = 'padding = 25px;'><br>Votre montant à régler: ".$prix_final." €</span>";
                                }
                            ?>
                            <form action="https://www.paypal.com/signin" method="post">
                                <button type="submit" class="button" style="
                                    margin-top: 1%;
                                    background-color: #6b43ff;
                                    border: none;
                                    border-radius: 15px;
                                    color: #fff;
                                    padding: 25px;
                                    font-size: calc(5px + (30 - 5) * ((100vw - 500px) / (2560 - 500)));">Régler avec Paypal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>


<!-- $_SESSION['jeu']:

Array ( 
[0] => Array ( [0] => Array ( [nom_produit] => Metro Exodus [prix_produit] => 39.99 [nom_fourn] => Steam [nom_createur] => 4A Games ) ) 
[1] => Array ( [0] => Array ( [nom_produit] => Elden Ring [prix_produit] => 59.99 [nom_fourn] => Steam [nom_createur] => FromSoftware Inc ) ) 
[2] => Array ( [0] => Array ( [nom_produit] => Teardown [prix_produit] => 29.99 [nom_fourn] => Steam [nom_createur] => Tuxedo Labs ) ) 
[3] => Array ( [0] => Array ( [nom_produit] => Teardown [prix_produit] => 29.99 [nom_fourn] => Steam [nom_createur] => Tuxedo Labs ) ) 
)

[0][0] - metro exodus
[1][0] - elden ring
[2][0] - teardown
[3][0] - teardown -->