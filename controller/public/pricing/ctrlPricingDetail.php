<?php
$managerCategorie = new entity\CategorieManager($db);
$_SESSION['categories']= $managerCategorie->selectAllIfProduit();

$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : '';

// récupération du produit si l'affichage est à oui
$managerProduit = new entity\ProduitManager($db);
$_SESSION['produit']=$managerProduit-> selectActif($id);

require_once "ressources/view/public/pricing/pricingDetail.php";

