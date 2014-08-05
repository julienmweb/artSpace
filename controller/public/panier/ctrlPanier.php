<?php
// initialisation du panier
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = new entity\Panier();
}

// si le client est connecté et que lignes du panier>0 affichage du bouton de validation de la commande
if (isset($_SESSION['userSession']) && count($_SESSION['panier']->getLignesPanier() > 0)) {
    $message = '<section class="message--panier">';
    $message.= '<h3><a class="link" href="index.php?action=ctrlPricing">Continuer vos achats</a></h3>';
    $message.= '<p><button class="btn--type2"><a href="index.php?action=ctrlPanier&amp;event=cartValidate">Valider votre commande</a></button></p>';
    $message.='</section>';
    $_SESSION['event'] = 'cartValidate';
} else { // si client non connecté affichage des liens pour se connecter ou s'inscrire
    
    $message = '<section class="message--panier">';
    $message.= '<h3><a class="link" href="index.php?action=ctrlPricing">Continuer vos achats</a></h3>';
    $message.='<p>vous devez vous inscrire ou vous connecter pour finaliser l\'achat</p>';
    $message.='<button class="btn--type2 "><a href="index.php?action=ctrlSignIn&amp;event=cartValidate">Me connecter</a></button>';
    $message.='<button class="btn--type2"><a href="index.php?action=ctrlSignUp&amp;event=cartValidate">M\'inscrire</a></button>';
    $message.='</section>';
}

// affichage du panier du client
if (isset($_GET['event']) && $_GET['event'] === 'view') {
    require_once "ressources/view/public/client/panier.php";
}

// ajout d'une ligne panier dans le panier
if (isset($_GET['id']) && isset($_GET['event']) && ($_GET['event'] === 'add')) {

    $id = htmlspecialchars($_GET['id']);
    $managerProduit = new entity\ProduitManager($db);
    $produit = $managerProduit->select($id);
    if (!is_null($produit)) {
        $_SESSION['panier']->setLignePanier(array(
            'idProduit' => $produit->getId(),
            'nomProduit' => $produit->getNom(),
            'prixProduit' => $produit->getPrix()
        ));
    }
    require_once "ressources/view/public/client/panier.php";
}

// suppression d'une ligne panier dans le panier
if (isset($_GET['id']) && isset($_GET['event']) && ($_GET['event'] === 'del')) {

    $id = htmlspecialchars($_GET['id']);
    $_SESSION['panier']->delLignePanier($id);
    require_once "ressources/view/public/client/panier.php";
}

// validation du panier
if (isset($_GET['event']) && $_GET['event'] === 'cartValidate') {
    if (count($_SESSION['panier']->getLignesPanier()) > 0) {
        if (isset($_SESSION['userSession'])) {
            header('Location:index.php?action=ctrlPanierValidate');
        } else {
            require_once "ressources/view/public/client/panier.php";
        }
    } else {
        require_once "ressources/view/public/client/panier.php";
    }
}
