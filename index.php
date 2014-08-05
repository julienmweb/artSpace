<?php

require_once ('classautoload.php');
session_start();
require_once ('connexion_sql.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = "publicIndex";
}


switch ($action) {

    case "publicIndex" :
        require_once ("ressources/view/public/index.php");
        break;

    case "message" :
        require_once ("ressources/view/public/message.php");
        break;

    case "adminIndex" :
        require_once ("ressources/view/admin/adminIndex.php");
        break;

    /**
     * CONTROLLER 
     * *************************************************************************
     */
    /**
     * CONTROLLER PUBLIC
     * **************************************************** 
     */
    /**
     * CONTROLLER PUBLIC SIGN
     * **********************************
     */

    case "ctrlSignUp" :
        require_once ("controller/public/Sign/ctrlSignUp.php");
        break;

    case "ctrlSignIn" :
        require_once ("controller/public/Sign/ctrlSignIn.php");
        break;

    case "ctrlSignOut" :
        require_once ("controller/public/Sign/ctrlSignOut.php");
        break;
    
    case "ctrlSignUpdate" :
        require_once ("controller/public/Sign/ctrlSignUpdate.php");
        break;
    
    case "ctrlSignUpdateEtape2" :
        require_once ("controller/public/Sign/ctrlSignUpdateEtape2.php");
        break;    

    /**
     * CONTROLLER PUBLIC PRICING 
     * **********************************
     */
    case "ctrlPricing" :
        require_once ("controller/public/pricing/ctrlPricing.php");
        break;

    case "ctrlPricingDetail" :
        require_once ("controller/public/pricing/ctrlPricingDetail.php");
        break;

    case "ctrlPricingProduitsParCategorie" :
        require_once ("controller/admin/categorie/ctrlPricingProduitsParCategorie.php");
        break;


    /**
     * CONTROLLER PUBLIC PANIER
     * **********************************
     */    
    
    case "ctrlPanier" :
        require_once ("controller/public/panier/ctrlPanier.php");
        break; 
    
    case "ctrlPanierValidate" :
        require_once ("controller/public/panier/ctrlPanierValidate.php");
        break;    
    
    /**
     * CONTROLLER PUBLIC COMMANDE
     * **********************************
     */  
    
     case "ctrlCommande" :
        require_once ("controller/public/commande/ctrlCommande.php");
        break; 
    
    /**
     * CONTROLLER PUBLIC MY ACCOUNT
     * **********************************
     */  
    
     case "ctrlMyAccount" :
        require_once ("controller/public/commande/ctrlMyAccount.php");
        break;     
    

    
    
    /**
     * CONTROLLER ADMIN
     * **************************************************** 
     */
    
    /**
     * CONTROLLER ADMIN COMMANDE
     * **********************************
     */
    case "ctrlAdminCommande" :
        require_once ("controller/admin/commande/ctrlAdminCommande.php");
        break;
    
    /**
     * CONTROLLER ADMIN INDEX
     * **********************************
     */
    case "ctrlAdminIndex" :
        require_once ("controller/admin/index/ctrlAdminIndex.php");
        break;    

    /**
     * CONTROLLER ADMIN PRODUIT
     * **********************************
     */
    case "ctrlAdminProduit" :
        require_once ("controller/admin/produit/ctrlAdminProduit.php");
        break;

    case "ctrlAdminProduitAjoutInit" :
        require_once ("controller/admin/produit/ctrlAdminProduitAjoutInit.php");
        break;

    case "ctrlAdminProduitAjout" :
        require_once ("controller/admin/produit/ctrlAdminProduitAjout.php");
        break;

    case "ctrlAdminProduitModifier" :
        require_once ("controller/admin/produit/ctrlAdminProduitModifier.php");
        break;

    case "ctrlAdminProduitModifierEtape2" :
        require_once ("controller/admin/produit/ctrlAdminProduitModifierEtape2.php");
        break;


    /**
     * CONTROLLER ADMIN CATEGORIE
     * **********************************
     */
    case "ctrlAdminCategorie" :
        require_once ("controller/admin/categorie/ctrlAdminCategorie.php");
        break;

    case "ctrlAdminCategorieAjoutInit" :
        require_once ("controller/admin/categorie/ctrlAdminCategorieAjoutInit.php");
        break;

    case "ctrlAdminCategorieAjout" :
        require_once ("controller/admin/categorie/ctrlAdminCategorieAjout.php");
        break;

    case "ctrlAdminCategorieModifier" :
        require_once ("controller/admin/categorie/ctrlAdminCategorieModifier.php");
        break;

    case "ctrlAdminCategorieModifierEtape2" :
        require_once ("controller/admin/categorie/ctrlAdminCategorieModifierEtape2.php");
        break;


    /**
     * DEFAULT
     * **************************************************** 
     */
    default :
        require ("ressources/view/404.php");
}


