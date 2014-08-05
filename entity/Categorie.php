<?php

namespace entity;

class Categorie {

    private $id;
    private $nom;

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

    public function getNom() {
        return $this->nom;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * Contrôle du nom
     * @return boolean
     */
    public function nomValide() {
        $test = ((strlen($this->nom) >= 2) && (strlen($this->nom) <= 50)) ? true : false;
        return $test;
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
