<?php

namespace entity;
use PDO;

class LigneCommandeManager {

    private $db;
    private $crud;
    
    
    /**
     * 
     * @param DbConnect $db
     */
    public function __construct($db) {
        $this->db = $db->getDb();
        $this->crud = new \entity\CRUD($this->db);
    }  
  
    /**
     * ajoute une ligne de commande
     * @param ligneCommande $ligneCommande
     * @return int (lastInsertId)
     */
    public function add($ligneCommande) {
        $data = $this->crud->insert('ligneCommande', array(
            'commande' => $ligneCommande->getCommande(),
            'produit' => $ligneCommande->getProduit(),
            'nomProduit' => $ligneCommande->getNomProduit(),
            'prixProduit' => $ligneCommande->getPrixProduit(),
        ));
        return $data;
        
    }   
    
    /**
     * récupére toutes les lignes commandes d'une commande
     * @param int $CommandeId
     * @return array
     */
    public function selectAllLigneCommandeByCommandeId($CommandeId) {
        $value = $CommandeId;
        $type = $this->crud->PDOType($value);
        $qr = 'SELECT * FROM ligneCommande WHERE commande = :commandeId ';
        $binds = array(
            array('key' => ':commandeId', 'value' => $value, 'type' => $type)
        );
        
        $data = $this->crud->select($qr, $binds);
        return $data;
    }
    
    /**
     * calcul le prix total d'une commande avec les prix de chaque ligne commande
     * @return float
     */
    public function totalCommandeByCommandeId($CommandeId) {
        $value = $CommandeId;
        $type = $this->crud->PDOType($value);
        $qr = 'SELECT prixProduit FROM ligneCommande WHERE commande = :commandeId ';
        $binds = array(
            array('key' => ':commandeId', 'value' => $value, 'type' => $type)
        );        
        $data = $this->crud->select($qr, $binds);

        $total=0;
        foreach ($data  as $value) {
            $total+=$value['prixProduit']; 
        }
        return $total;
    }    
    
   
}