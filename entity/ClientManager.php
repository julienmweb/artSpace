<?php

namespace entity;
use PDO;
class ClientManager {

    private $db;
    private $crud;

    /**
     * constructeur
     * @param DbConnect $db
     */
    public function __construct($db) {
        $this->db = $db->getDb();
        $this->crud = new \entity\CRUD($this->db);
    }

    /**
     * ajoute un client
     * @param Client $client
     * @return int (lastInsertId)
     */
    public function add($client) {
        $data = $this->crud->insert('client', array(
            'identifiant' => $client->getIdentifiant(),
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'password' => crypt($client->getPassword()),
            'adresse' => $client->getAdresse()
        ));
        return $data;
    }

    /**
     * recuperer les informations d'un client via son identifiant
     * @param string $identifiantClient
     * @return Client
     */
    public function select($identifiantClient) {
        $value = $identifiantClient;
        $type = $this->crud->PDOType($value);

        $qr = 'SELECT identifiant, nom, prenom, email, adresse FROM client WHERE identifiant = :identifiant';
        $binds = array(
            array('key' => ':identifiant', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);

        return new \entity\Client($data[0]);
    }

    /**
     * recuperer les informations d'un client via son id
     * @param id $idClient
     * @return Client
     */
    public function selectById($idClient) {
        $value = $idClient;
        $type = $this->crud->PDOType($value);

        $qr = 'SELECT identifiant, nom, prenom, email, adresse FROM client WHERE id = :id';
        $binds = array(
            array('key' => ':id', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);

        return new \entity\Client($data[0]);
    }

    /**
     * recuperer les informations d'un client via un numéro de commande
     * @param id $idCommande
     * @return Client
     */
    public function selectByCommande($idCommande) {
        $value = $idCommande;
        $type = $this->crud->PDOType($value);

        $qr = 'SELECT identifiant, nom, prenom, email, adresse FROM client, commande WHERE client.id = commande.client AND commande.id = :id';
        $binds = array(
            array('key' => ':id', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);

        return new \entity\Client($data[0]);
    }

    /**
     * mise à jour d'un client
     * @param Client $client
     * @return void
     */
    public function update($client) {
        $value = $client->getId();
        $this->crud->update(
                'client', array(
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'adresse' => $client->getAdresse()
                ), 
            'id = :id', 
            array(
                array('key' => 'id', 'value' => $value, 'type' => PDO::PARAM_INT)
                )
        );
    }

    /**
     * compte le nombre de clients dans la BDD
     * @return int
     */
    public function count() {
        return $this->db->query('SELECT COUNT(*) FROM client')->fetchColumn();
    }

    /**
     * tester si Identifiant est existant dans la BDD
     * @param string $identifiant
     * @return boolean
     */
    public function existsIdentifiant($identifiant) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM client WHERE identifiant = :identifiant');
        $q->execute(array(':identifiant' => $identifiant));
        return (bool) $q->fetchColumn();
    }

    /**
     * return id du client avec l identifiant
     * @param string $identifiant
     * @return int
     */
    public function returnId($identifiant) {
        $q = $this->db->prepare('SELECT id FROM client WHERE identifiant = :identifiant');
        $q->execute(array(':identifiant' => $identifiant));
        $data = $q->fetch();
        return $data['id'];
    }

    /**
     * tester si email est existant dans la BDD
     * @param string $email
     * @return boolean
     */
    public function existsEmail($email) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM client WHERE email = :email');
        $q->execute(array(':email' => $email));
        return (bool) $q->fetchColumn();
    }

    /**
     * tester si l'email est existant dans la BDD en excluant l'objet testé
     * @param Client $client
     * @return boolean
     */
    public function existsEmailExceptSelfEmail($client) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM client WHERE email = :email AND  id!= :id');
        $q->execute(array(
            ':email' => $client->getEmail(),
            ':id' => $client->getId()
        ));
        return (bool) $q->fetchColumn();
    }

    /**
     * verifier le couple identifiant / mot de passe
     * @param string $identifiant
     * @param string $password
     * @return boolean
     */
    public function checkPassword($identifiant, $password) {
        $q = $this->db->prepare('SELECT password FROM client WHERE identifiant = :identifiant');
        $q->execute(array(':identifiant' => $identifiant));
        $r = $q->fetch();
        if (empty($r)) {
            return false;
        }

        if (crypt($password, $r['password']) == $r['password']) {
            return true;
        } else {
            return false;
        }
    }

}
