<?php
$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

$manager = new entity\CategorieManager($db);
$categories = $manager->selectAll();

$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : '';
$_SESSION['categorie'] = $manager->select($id);


$formInfoAdminCategorie = array(
    "nom" => $_SESSION['categorie']->getNom(),
    "messageErreurNomInvalide" => '',
    "messageErreurNomExistant" => ''
);

require_once ("ressources/view/admin/categorie/adminCategorieModifier.php");










