<?php

$identify = new entity\Identify();
$identify->identifyMyAdminAccount();

if (!isset($_GET['idCommande']) && !isset($_GET['idClient'])) {
    $managerCommande = new entity\CommandeManager($db);

    $data = $managerCommande->selectAllWithClientDetail();

    require_once "ressources/view/admin/commande/adminCommande.php";
}


if (isset($_GET['idCommande'])) {
    $idCommande = htmlspecialchars($_GET['idCommande']);
    $managerLigneCommande = new entity\LigneCommandeManager($db);
    $data = $managerLigneCommande->selectAllLigneCommandeByCommandeId($idCommande);
    $total = $managerLigneCommande->totalCommandeByCommandeId($idCommande);
    
    $managerClient = new entity\ClientManager($db);
    $client = $managerClient->selectByCommande($idCommande);
    
    require_once "ressources/view/admin/commande/adminCommandeDetail.php";
    
} 

if (isset($_GET['idClient'])) {
    $idClient = htmlspecialchars($_GET['idClient']);
    $managerClient = new entity\ClientManager($db);
    $client= $managerClient->selectById($idClient);
    
    $managerCommande = new entity\CommandeManager($db);
    $commandesClient = $managerCommande->selectAllCommandsByClientId($idClient);

    
    require_once "ressources/view/admin/client/adminClientDetail.php";   
    
} 









