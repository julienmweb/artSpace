<?php

$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

$managerCategorie = new entity\CategorieManager($db);
$categories = $managerCategorie->selectAll();

$managerProduit = new entity\ProduitManager($db);

$id = $_SESSION['produit']->getId();
$nom = (isset($_POST['nom'])) ? htmlspecialchars($_POST['nom']) : '';
$description = (isset($_POST['description'])) ? htmlspecialchars($_POST['description']) : '';
$prix = (isset($_POST['prix'])) ? htmlspecialchars($_POST['prix']) : '';
$categorie = (isset($_POST['categorie'])) ? htmlspecialchars($_POST['categorie']) : '';
$display = (isset($_POST['display'])) ? htmlspecialchars($_POST['display']) : '';


$produit = new entity\Produit(array('id' => $id, 'nom' => $nom, 'description' => $description, 'prix' => $prix, 'categorie' => $categorie, 'display' => $display));

$err_form = false; //initialisation de la variable qui nous permettra de valider ou non le formulaire (= false avant les verifications)

if (!$produit->nomValide()) {
    $messageErreurNomInvalide = ' Le nom est invalide ';
    $err_form = true;
} else {
    $messageErreurNomInvalide = '';
}
if ($managerProduit->existsNomExceptSelfNom($produit)) {
    $messageErreurNomExistant = ' Le nom choisi est déjà existant ';
    $err_form = true;
} else {
    $messageErreurNomExistant = '';
}
if (!$produit->descriptionValide()) {
    $messageErreurDescriptionInvalide = ' La description est invalide ';
    $err_form = true;
} else {
    $messageErreurDescriptionInvalide = '';
}
if (!$produit->prixValide()) {
    $messageErreurPrixInvalide = ' Le prix est invalide ';
    $err_form = true;
} else {
    $messageErreurPrixInvalide = '';
}

if ($err_form == true) {
    unset($produit);

    $formInfoAdminProduit = array(
        "nom" => $nom,
        "description" => $description,
        "prix" => $prix,
        "categorie" => $categorie,
        "display" => $display,
        "messageErreurDescriptionInvalide" => $messageErreurDescriptionInvalide,
        "messageErreurNomInvalide" => $messageErreurNomInvalide,
        "messageErreurNomExistant" => $messageErreurNomExistant,
        "messageErreurPrixInvalide" => $messageErreurPrixInvalide,
        "messageErreurCategorieInvalide" => '',
    );

    require_once ("ressources/view/admin/produit/adminProduitModifier.php");
} else {
    $flag = $managerProduit->update($produit); // insere le produit dans la BDD et retourne true si ok

    unset($_SESSION['produit']);
    $_SESSION['adminMessage'][0] = " Votre produit est bien modifié :-)";
    $_SESSION['adminMessage'][1] = "ctrlAdminProduit";
    $_SESSION['adminMessage'][2] = "cliquez ici pour revenir à la liste des produits";
    require_once ("ressources/view/admin/adminMessage.php");
}





