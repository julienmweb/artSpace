<?php

namespace entity;

class Produit {

    private $id;
    private $nom;
    private $description;
    private $prix;
    private $categorie;
    private $display;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getDisplay() {
        return $this->display;
    }    
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
   public function setDisplay($display) {
        $this->display = $display;
    }     

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    /**
     * contrôle le nom
     * @return boolean
     */
    public function nomValide() {
        $test = ((strlen($this->nom) >= 2) && (strlen($this->nom) <= 50)) ? true : false;
        return $test;
    }

    /**
     * contrôle la description
     * @return boolean
     */
    public function descriptionValide() {
        $test = ((strlen($this->description) >= 2) && (strlen($this->description) <= 500)) ? true : false;
        return $test;
    }

    /**
     * contrôle le prix
     * @return boolean
     */
    public function prixValide() {
        $test = (preg_match("#^[0-9]+(\.[0-9]{2})?$#", $this->prix)) ? true : false;
        return $test;
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'Set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

}
