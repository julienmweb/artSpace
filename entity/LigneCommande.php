<?php

namespace entity;

class LigneCommande {

    private $id;
    private $commande;
    private $produit;
    private $nomProduit;
    private $prixProduit;

    /**
     * 
     * @param array $donnees
     */
    public function __construct(array $donnees) {

        $this->hydrate($donnees);
    }

    public function getId() {
        return $this->id;
    }

    public function getCommande() {
        return $this->commande;
    }

    public function getProduit() {
        return $this->produit;
    }

    public function getNomProduit() {
        return $this->nomProduit;
    }

    public function getPrixProduit() {
        return $this->prixProduit;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCommande($commande) {
        $this->commande = $commande;
    }

    public function setProduit($produit) {
        $this->produit = $produit;
    }

    public function setNomProduit($nomProduit) {
        $this->nomProduit = $nomProduit;
    }

    public function setPrixProduit($prixProduit) {
        $this->prixProduit = $prixProduit;
    }

    /**
     * 
     * @param array $donnees
     */
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'Set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

}
