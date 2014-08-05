<?php

namespace entity;

class Panier {

    private $date;
    private $lignesPanier = array();

    public function __construct() {
        $this->setDate();
    }

    public function getDate() {
        return $this->date;
    }

    public function getLignesPanier() {
        return $this->lignesPanier;
    }

    public function setDate() {
        $this->date = date('Y-m-d');
    }

    /**
     * ajoute une ligne panier
     * @param array $donnees
     * @return void
     */
    public function setLignePanier($donnees) {
        array_push($this->lignesPanier, $donnees);
    }

    /**
     * supprime une ligne panier
     * @param int $idLignePanier
     * @return void
     */
    public function delLignePanier($idLignePanier) {
        unset($this->lignesPanier[$idLignePanier]);
    }

    /**
     * calcul le prix total du panier
     * @return float
     */
    public function totalPanier() {
        $data = $this->getLignesPanier();
        $total = 0;
        foreach ($data as $value) {
            $total+=$value['prixProduit'];
        }
        return $total;
    }

}
