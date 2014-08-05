<?php

$identify = new entity\Identify();
$identify->identifyMyAccount();

$id = $identify->returnId();


$managerClient = new entity\ClientManager($db);
$client = $managerClient->selectById($id);

$formErrorsSignUp = array(
    "nom" => $client->getNom(),
    "prenom" => $client->getPrenom(),
    "email" => $client->getEmail(),
    "emailBis" => $client->getEmail(),
    "adresse" => $client->getAdresse(),
    "messageErreurEmailExistant" => '',
    "messageErreurEmailInvalide" => '',
    "messageErreurEmailBisInvalide" => '',
    "messageErreurNomInvalide" => '',
    "messageErreurPrenomInvalide" => '',
    "messageErreurAdresseInvalide" => ''
);

require_once ("ressources/view/public/signUpdate.php");
