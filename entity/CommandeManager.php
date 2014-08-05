<?php

namespace entity;

use PDO;

class CommandeManager {

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
     * ajoute une commande
     * @param Commande $commande
     * @return int (lastInsertId)
     */
    public function add($commande) {
        $data = $this->crud->insert('commande', array(
            'client' => $commande->getClient(),
            'date' => $commande->getDate()
        ));
        return $data;
    }

    /**
     * selectionne toutes les commandes du client via son id
     * @param int $clientId
     * @return array
     */
    public function selectAllCommandsByClientId($clientId) {
        $value = $clientId;
        $type = $this->crud->PDOType($value);
        $qr = 'SELECT * FROM commande WHERE commande.client = :clientId ORDER BY commande.date DESC';
        $binds = array(
            array('key' => ':clientId', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);
        return $data;
    }

    /**
     * recuperer toutes les commandes avec les lignes commandes associées
     * @return array
     */
    public function selectAllWithClientDetail() {
        $qr = 'SELECT commande.id AS commandeId, commande.date AS commandeDate, commande.client AS commandeClient, client.id AS clientId, client.identifiant AS clientIdentifiant FROM commande, client WHERE commande.client = client.id ORDER BY commande.date DESC';
        $data = $this->crud->select($qr);
        return $data;
    }

    /**
     * compte le nombre de commandes dans la base
     * @return int
     */
    public function count() {
        return $this->db->query('SELECT COUNT(*) FROM commande')->fetchColumn();
    }

}
