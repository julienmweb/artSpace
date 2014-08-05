<?php
$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

// affichage de tous les produits avec leur catégorie
$manager = new entity\ProduitManager($db);
$_SESSION['produits']= $manager->selectAllJoinCategorie();



require_once ("ressources/view/admin/produit/adminProduit.php");




