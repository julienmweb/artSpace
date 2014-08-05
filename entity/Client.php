<?php

namespace entity;

class Client {

    private $id;
    private $nom;
    private $prenom;
    private $identifiant;
    private $password;
    private $email;
    private $adresse;

    /**
     * constructeur
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

    public function getPrenom() {
        return $this->prenom;
    }

    public function getIdentifiant() {
        return $this->identifiant;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setIdentifiant($identifiant) {
        $this->identifiant = $identifiant;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    /**
     * contrôle de l identifiant
     * @return boolean
     */
    public function identifiantValide() {
        $test = (preg_match("/^[a-zA-Z0-9_-]{1,50}$/", $this->identifiant)) ? true : false;
        return $test;
    }

    /**
     * contrôle de l'email
     * @return boolean
     */
    public function emailValide() {
        $test = (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $this->email)) ? true : false;
        return $test;
    }

    /**
     * contrôle du mot de passe
     * @return boolean
     */
    public function passwordValide() {
        $test = ((strlen($this->password) >= 5) && (strlen($this->password) <= 20)) ? true : false;
        return $test;
    }

    /**
     * contrôle du nom
     * @return boolean
     */
    public function nomValide() {
        $test = ((strlen($this->nom) >= 2) && (strlen($this->nom) <= 50)) ? true : false;
        return $test;
    }

    /**
     * contrôle du prénom
     * @return boolean
     */
    public function prenomValide() {
        $test = ((strlen($this->prenom) >= 2) && (strlen($this->prenom) <= 50)) ? true : false;
        return $test;
    }

    /**
     * contrôle de l'adresse
     * @return boolean
     */
    public function adresseValide() {
        $test = ((strlen($this->adresse) >= 2) && (strlen($this->adresse) <= 50)) ? true : false;
        return $test;
    }

    /**
     * contrôle de la double saisie
     * @param string $a
     * @param string $b
     * @return boolean
     */
    public function doubleSaisieVerif($a, $b) {
        if ($a == $b) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * hydratation de l'objet
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
