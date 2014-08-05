<?php
$identify = new entity\Identify();
$identify->identifyMyAccount();

    $manager = new entity\ClientManager($db);
    
    $id= $identify->returnId();
    $nom = (isset($_POST['nom'])) ? htmlspecialchars($_POST['nom']) : '';
    $prenom = (isset($_POST['prenom'])) ? htmlspecialchars($_POST['prenom']) : '';
    $adresse = (isset($_POST['adresse'])) ? htmlspecialchars($_POST['adresse']) : '';
    $email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
    $emailBis = (isset($_POST['emailBis'])) ? htmlspecialchars($_POST['emailBis']) : '';


    

    $client = new entity\Client(array('id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 'email' => $email));

    $err_form = false; //initialisation de la variable qui nous permettra de valider ou non le formulaire (= false avant les verifications)


    if ($manager->existsEmailExceptSelfEmail($client)) {
        $messageErreurEmailExistant = ' L\'email choisi est déjà existant ';
        $err_form = true;
    } else {
        $messageErreurEmailExistant = '';
    }

    if (!$client->emailValide()) {
        $messageErreurEmailInvalide = ' L\'email est invalide ';
        $err_form = true;
    } else {
        $messageErreurEmailInvalide = '';
    }

    if (!$client->nomValide()) {
        $messageErreurNomInvalide = ' Le nom doit avoir entre 2 et 50 caracteres ';
        $err_form = true;
    } else {
        $messageErreurNomInvalide = '';
    }

    if (!$client->prenomValide()) {
        $messageErreurPrenomInvalide = ' Le prenom doit avoir entre 2 et 50 caracteres ';
        $err_form = true;
    } else {
        $messageErreurPrenomInvalide = '';
    }

    if (!$client->adresseValide()) {
        $messageErreurAdresseInvalide = ' L adresse doit avoir entre 2 et 50 caracteres ';
        $err_form = true;
    } else {
        $messageErreurAdresseInvalide = '';
    }

    if (!$client->doubleSaisieVerif($email, $emailBis)) {
        $messageErreurEmailBisInvalide = ' Email saisi différent. Veuillez le saisir à nouveau ';
        $err_form = true;
    } else {
        $messageErreurEmailBisInvalide = '';
    }

    if ($err_form == true) {
        unset($client);

        $formErrorsSignUp = array(
            "nom" => $nom,
            "prenom" => $prenom,
            "adresse" => $adresse,
            "email" => $email,
            "emailBis" => $emailBis,
            "messageErreurEmailExistant" => $messageErreurEmailExistant,
            "messageErreurEmailInvalide" => $messageErreurEmailInvalide,
            "messageErreurEmailBisInvalide" => $messageErreurEmailBisInvalide,
            "messageErreurNomInvalide" => $messageErreurNomInvalide,
            "messageErreurPrenomInvalide" => $messageErreurPrenomInvalide,
            "messageErreurAdresseInvalide" => $messageErreurAdresseInvalide
        );

        require_once ("ressources/view/public/signUpdate.php");
    } else {
        $manager->update($client); // modifie le client dans la BDD
        $_SESSION['message'][0] = " Votre modification est effectuée :-)";
        $_SESSION['message'][1] = "ctrlMyAccount";
        $_SESSION['message'][2] = "revenir à votre espace client";

        require_once ("ressources/view/public/message.php");
    }



