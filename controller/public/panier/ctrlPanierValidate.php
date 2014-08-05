<?php

// page de validation du panier avec détails des coordonnées du client
if (isset($_SESSION['event']) && $_SESSION['event'] = 'cartValidate') {

    $identify = new entity\Identify();
    $identifiantClient = $identify->returnIdentifiant();    
    
    $manager = new entity\ClientManager($db);
    $client= $manager->select($identifiantClient);

require_once "ressources/view/public/client/panierValidate.php";

}
