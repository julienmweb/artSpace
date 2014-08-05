<?php

$identify = new entity\Identify();
$identify->identifyMyAdminAccount();


$manager = new entity\CategorieManager($db);

$_SESSION['categories']= $manager->selectAll();

require_once ("ressources/view/admin/categorie/adminCategorie.php");




