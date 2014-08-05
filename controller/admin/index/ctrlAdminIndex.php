<?php

$identify = new entity\Identify();
$identify->identifyMyAdminAccount();


// statistiques de l'espace administrateur
$managerCommande = new entity\CommandeManager($db);
$nbCommandes = $managerCommande->count();

$managerClient = new entity\ClientManager($db);
$nbClients = $managerClient->count();


require_once "ressources/view/admin/adminIndex.php";
