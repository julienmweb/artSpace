<?php

if (isset($_SESSION['event']) && $_SESSION['event'] = 'cartValidate') {

    $identify = new entity\Identify();
    $idClient = $identify->returnId();

    // création de la commande
    $managerCommande = new entity\CommandeManager($db);
    $commande = new entity\Commande(array('client' => $idClient));
    $IdCommande = $managerCommande->add($commande);
    
    // création des lignes commande
    $managerLigneCommande = new entity\LigneCommandeManager($db);
    foreach ($_SESSION['panier']->getLignesPanier() as $key => $value) {
        $ligneCommande = new entity\LigneCommande(array('commande' => $IdCommande, 'produit' => $value['idProduit'], 'nomProduit' => $value['nomProduit'], 'prixProduit' => $value['prixProduit']));
        $IdLingeCommande = $managerLigneCommande->add($ligneCommande);
    }
    unset($_SESSION['event']);
    unset($_SESSION['panier']);
    
    $_SESSION['message'][0] = " Votre commande est effectuée :-)";
    $_SESSION['message'][1] = "publicIndex";
    $_SESSION['message'][2] = "cliquez ici pour revenir à l'index";
    header('Location:index.php?action=message');
}
