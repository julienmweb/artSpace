<?php

if (isset($_POST['identifiant']) && isset($_POST['password'])) {
    $identifiant = htmlspecialchars($_POST['identifiant']);
    $password = htmlspecialchars($_POST['password']);

    $manager = new entity\ClientManager($db);

    // Contrôle des identifiants de connexion
    // Si OK création de la session avec un token
    // Si identifiant est administrateur renvoi vers l'espace administrateur
    // Si la connexion fait suite à la validation du panier, renvoi vers la page de confirmation du panier
    if ($manager->existsIdentifiant($identifiant)) {
        if ($manager->checkPassword($identifiant, $password)) {
            $idClient = $manager->returnId($identifiant);
            $tbl_session = array(
                'identifiantClient' => $identifiant,
                'idClient' => $idClient,
                'token' => md5('token_very_salty' . $identifiant));
            $_SESSION['userSession'] = serialize($tbl_session);

            if ($identifiant == 'admin') {
                header('Location:index.php?action=ctrlAdminIndex');
            } else if (isset($_SESSION['event']) && $_SESSION['event'] = 'cartValidate') {
                header('Location:index.php?action=ctrlPanierValidate');
            } else {
                $_SESSION['message'][0] = " Vous êtes désormais connecté :-)";
                $_SESSION['message'][1] = "ctrlMyAccount";
                $_SESSION['message'][2] = "aller à votre espace client";
                header('Location:index.php?action=message');
            }
        } else {
            $formErrorsSignIn = array(
                "identifiantSignIn" => $identifiant,
                "messageErreurIdentifiantInvalideSignIn" => '',
                "messageErreurPasswordInvalideSignIn" => ' Le mot de passe est invalide'
            );
            require_once ("ressources/view/public/signIn.php");
        }
    } else {
        $formErrorsSignIn = array(
            "identifiantSignIn" => $identifiant,
            "messageErreurIdentifiantInvalideSignIn" => ' L\'identifiant n\'est pas saisi ou inexistant dans la base',
            "messageErreurPasswordInvalideSignIn" => ''
        );
        require_once ("ressources/view/public/signIn.php");
    }
} else {
    $formErrorsSignIn = array(
        "identifiantSignIn" => '',
        "messageErreurPasswordInvalideSignIn" => '',
        "messageErreurIdentifiantInvalideSignIn" => ''
    );

    if (isset($_GET['event']) && $_GET['event'] == 'cartValidate') {
        $_SESSION['event'] = 'cartValidate';
    }

    require_once ("ressources/view/public/signIn.php");
}

