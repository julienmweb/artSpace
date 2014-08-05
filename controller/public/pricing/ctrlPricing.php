<?php

$managerCategorie = new entity\CategorieManager($db);
// récupération des catégories qui possedent des produits
$_SESSION['categories']= $managerCategorie->selectAllIfProduit();

$managerProduit = new entity\ProduitManager($db);

// récupération des produits dont l'affichage est à oui
$_SESSION['idCategorie'] = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 1;
$_SESSION['produits']=$managerProduit-> selectAllActifByCategorie($_SESSION['idCategorie']);

require_once "ressources/view/public/pricing/pricing.php";

?>


