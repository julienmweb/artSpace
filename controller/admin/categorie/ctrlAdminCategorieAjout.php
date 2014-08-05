<?php

$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

if (isset($_POST['nom'])) {

    $nom = (isset($_POST['nom'])) ? htmlspecialchars($_POST['nom']) : '';
    $manager = new entity\CategorieManager($db);
    $categorie = new entity\Categorie(array('nom' => $nom));

    $err_form = false; //initialisation de la variable qui nous permettra de valider ou non le formulaire (= false avant les verifications)

    if (!$categorie->nomValide()) {
        $messageErreurNomInvalide = ' Le nom doit avoir entre 2 et 50 caracteres ';
        $err_form = true;
    } else {
        $messageErreurNomInvalide = '';
    }

    if ($manager->existsNom($categorie->getNom())) {
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

        require_once ("ressources/view/admin/categorie/adminCategorieAjout.php");
    } else {
        $idProduit = $manager->add($categorie); // insere la categorie dans la BDD et retourne l'ID
        $_SESSION['adminMessage'][0] = " Votre rubrique est bien ajouté :-)";
        $_SESSION['adminMessage'][1] = "ctrlAdminCategorie";
        $_SESSION['adminMessage'][2] = "cliquez ici pour revenir à la liste des rubriques";
        require_once ("ressources/view/admin/adminMessage.php");
    }
} else {
    $formInfoAdminCategorie = array(
        "nom" => '',
        "messageErreurNomInvalide" => '',
        "messageErreurNomExistant" => ''
    );

    require_once ("ressources/view/admin/categorie/adminCategorieAjout.php");
}

