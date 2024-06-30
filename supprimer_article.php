<?php
session_start();

$current_page = $_SERVER['HTTP_REFERER'];

if(isset($_GET['cle'])) 
{
    $cle = $_GET['cle'];
    
    // supprime le key
    unset($_SESSION['jeu'][$cle]);
    
    // retourne vers la page precedente
    header("Location: $current_page");
    exit;
}
else 
{
    // s'il existe pas le clé comme ça retourne vers la page d'accueil
    header("Location: http://localhost/myhost-exemple/favor_page.php");
    echo "Il existe pas plus ce jeu-là que vous avez supprimer de votre liste de panier";
    exit;
}
?>