<?php
$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

$managerCategorie = new entity\CategorieManager($db);
$categories = $managerCategorie->selectAll();

$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : '';

$managerProduit = new entity\ProduitManager($db);
$_SESSION['produit'] = $managerProduit->select($id);

    $formInfoAdminProduit = array(
        "description" => $_SESSION['produit']->getDescription(),
        "nom" => $_SESSION['produit']->getNom(),
        "prix" => $_SESSION['produit']->getPrix(),
        "categorie" => $_SESSION['produit']->getCategorie(),
        "display" => $_SESSION['produit']->getDisplay(),
        "messageErreurDescriptionInvalide" => '',
        "messageErreurNomInvalide" => '',
        "messageErreurNomExistant" => '',
        "messageErreurPrixInvalide" => '',
        "messageErreurCategorieInvalide" => '',
    );

require_once ("ressources/view/admin/produit/adminProduitModifier.php");










