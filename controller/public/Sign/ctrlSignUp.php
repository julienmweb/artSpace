<?php

if (isset($_POST['identifiant'])) {

    $identifiant = (isset($_POST['identifiant'])) ? htmlspecialchars($_POST['identifiant']) : '';
    $nom = (isset($_POST['nom'])) ? htmlspecialchars($_POST['nom']) : '';
    $prenom = (isset($_POST['prenom'])) ? htmlspecialchars($_POST['prenom']) : '';
    $adresse = (isset($_POST['adresse'])) ? htmlspecialchars($_POST['adresse']) : '';
    $email = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
    $password = (isset($_POST['password'])) ? htmlspecialchars($_POST['password']) : '';
    $emailBis = (isset($_POST['emailBis'])) ? htmlspecialchars($_POST['emailBis']) : '';
    $passwordBis = (isset($_POST['passwordBis'])) ? htmlspecialchars($_POST['passwordBis']) : '';

    $manager = new entity\ClientManager($db);

    $client = new entity\Client(array('identifiant' => $identifiant, 'nom' => $nom, 'prenom' => $prenom, 'adresse' => $adresse, 'email' => $email, 'password' => $password));

    $err_form = false; //initialisation de la variable qui nous permettra de valider ou non le formulaire (= false avant les verifications)

    if (!$client->identifiantValide()) {
        $messageErreurIdentifiantInvalide = ' L\'identifiant choisi est invalide. ';
        $err_form = true;
    } else {
        $messageErreurIdentifiantInvalide = '';
    }

    if ($manager->existsIdentifiant($client->getIdentifiant())) {
        $messageErreurIdentifiantExistant = ' L\'identifiant choisi est déjà existant ';
        $err_form = true;
    } else {
        $messageErreurIdentifiantExistant = '';
    }

    if ($manager->existsEmail($client->getEmail())) {
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

    if (!$client->passwordValide()) {
        $messageErreurPasswordInvalide = ' Le mot de passe doit avoir entre 5 et 20 caracteres ';
        $err_form = true;
    } else {
        $messageErreurPasswordInvalide = '';
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

    if (!$client->doubleSaisieVerif($password, $passwordBis)) {
        $messageErreurPasswordBisInvalide = ' Mot de passe différent. Veuillez les saisir à nouveau ';
        $err_form = true;
    } else {
        $messageErreurPasswordBisInvalide = '';
    }

    if ($err_form == true) {
        unset($client);

        $formErrorsSignUp = array(
            "identifiant" => $identifiant,
            "nom" => $nom,
            "prenom" => $prenom,
            "adresse" => $adresse,
            "email" => $email,
            "password" => $password,
            "passwordBis" => $passwordBis,
            "emailBis" => $emailBis,
            "messageErreurIdentifiantInvalide" => $messageErreurIdentifiantInvalide,
            "messageErreurIdentifiantExistant" => $messageErreurIdentifiantExistant,
            "messageErreurEmailExistant" => $messageErreurEmailExistant,
            "messageErreurEmailInvalide" => $messageErreurEmailInvalide,
            "messageErreurPasswordInvalide" => $messageErreurPasswordInvalide,
            "messageErreurEmailBisInvalide" => $messageErreurEmailBisInvalide,
            "messageErreurPasswordBisInvalide" => $messageErreurPasswordBisInvalide,
            "messageErreurNomInvalide" => $messageErreurNomInvalide,
            "messageErreurPrenomInvalide" => $messageErreurPrenomInvalide,
            "messageErreurAdresseInvalide" => $messageErreurAdresseInvalide
        );

        require_once ("ressources/view/public/signUp.php");
    } else {
        $idclient = $manager->add($client); // insere le client dans la BDD et retourne l'ID
        $_SESSION['message'][0] = " Vos inscription est effectuée :-)";
        $_SESSION['message'][1] = "ctrlSignIn";

        if (isset($_SESSION['event']) && $_SESSION['event'] = 'cartValidate') {
            $_SESSION['message'][2] = "cliquez ici pour vous connecter et finaliser votre achat";
        } else {
            $_SESSION['message'][2] = "cliquez ici pour vous connecter";
        }
        require_once ("ressources/view/public/message.php");
    }
} else {
    $formErrorsSignUp = array(
        "identifiant" => '',
        "nom" => '',
        "prenom" => '',
        "adresse" => '',
        "email" => '',
        "password" => '',
        "passwordBis" => '',
        "emailBis" => '',
        "messageErreurIdentifiantInvalide" => '',
        "messageErreurIdentifiantExistant" => '',
        "messageErreurEmailExistant" => '',
        "messageErreurEmailInvalide" => '',
        "messageErreurPasswordInvalide" => '',
        "messageErreurEmailBisInvalide" => '',
        "messageErreurPasswordBisInvalide" => '',
        "messageErreurNomInvalide" => '',
        "messageErreurPrenomInvalide" => '',
        "messageErreurAdresseInvalide" => ''
    );

    if (isset($_GET['event']) && $_GET['event'] == 'cartValidate') {
        $_SESSION['event'] = 'cartValidate';
    }

    require_once ("ressources/view/public/signUp.php");
}


