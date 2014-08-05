<?php

namespace entity;

class Commande {

    private $id;
    private $date;
    private $client;

    /**
     * 
     * @param array $donnees
     */
    public function __construct(array $donnees = array()) {
        $this->setDate();
        $this->hydrate($donnees);
    }

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getClient() {
        return $this->client;
    }

    public function ligneCommande() {
        return $this->ligneCommande;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate() {
        $this->date = date('Y-m-d');
    }

    public function setClient($client) {
        $this->client = $client;
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
