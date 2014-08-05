<?php

$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

$manager = new entity\CategorieManager($db);
$categories = $manager->selectAll();

$id = $_SESSION['categorie']->getId();

$nom = (isset($_POST['nom'])) ? htmlspecialchars($_POST['nom']) : '';


$categorie = new entity\Categorie(array('id' => $id, 'nom' => $nom));

$err_form = false; //initialisation de la variable qui nous permettra de valider ou non le formulaire (= false avant les verifications)

if (!$categorie->nomValide()) {
    $messageErreurNomInvalide = ' Le nom doit avoir entre 2 et 50 caracteres ';
    $err_form = true;
} else {
    $messageErreurNomInvalide = '';
}

if ($manager->existsNomExceptSelfNom($categorie)) {
    $messageErreurNomExistant = ' Le nom choisi est déjà existant ';
    $err_form = true;
} else {
    $messageErreurNomExistant = '';
}

if ($err_form == true) {
    unset($produit);
    $formInfoAdminCategorie = array(
        "nom" => $nom,
        "messageErreurNomInvalide" => $messageErreurNomInvalide,
        "messageErreurNomExistant" => $messageErreurNomExistant
    );
    require_once ("ressources/view/admin/categorie/adminCategorieModifier.php");
} else {
    $flag = $manager->update($categorie); // insere le produit dans la BDD et retourne true si ok

    unset($_SESSION['categorie']);
    $_SESSION['adminMessage'][0] = " Votre rubrique est bien modifié :-)";
    $_SESSION['adminMessage'][1] = "ctrlAdminCategorie";
    $_SESSION['adminMessage'][2] = "cliquez ici pour revenir à la liste des rubriques";
    require_once ("ressources/view/admin/adminMessage.php");
}





