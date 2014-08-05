<?php

$identify = new entity\Identify();
$identify->identifyMyAccount();


// affichage du détail d'une commande
if (isset($_GET['idCommande'])) {
    $idCommande = htmlspecialchars($_GET['idCommande']);
    $managerLigneCommande = new entity\LigneCommandeManager($db);
    $data = $managerLigneCommande->selectAllLigneCommandeByCommandeId($idCommande);
    $total = $managerLigneCommande->totalCommandeByCommandeId($idCommande);
    
    require_once "ressources/view/public/client/myAccountDetailCommande.php";
    
} else { // afichage de toutes les commandes du client

    $idClient = $identify->returnId();

    $managerCommande = new entity\CommandeManager($db);

    $data = $managerCommande->selectAllCommandsByClientId($idClient);

    require_once "ressources/view/public/client/myAccount.php";
}




