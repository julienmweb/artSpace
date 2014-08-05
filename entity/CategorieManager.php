<?php

namespace entity;

use PDO;

class CategorieManager {

    private $db;
    private $crud;

    /**
     * 
     * @param DbConnect $db
     * @return void
     */
    public function __construct($db) {
        $this->db = $db->getDb();
        $this->crud = new \entity\CRUD($this->db);
    }

    /**
     * Ajoute une catégorie
     * @param Categorie $categorie
     * @return int (lastInsertId)
     */
    public function add($categorie) {
        $data = $this->crud->insert('categorie', array(
            'nom' => $categorie->getNom()
        ));
        return $data;
    }

    /**
     * 
     * recuperer les informations d'une categorie via son id
     * @param int $idCategorie
     * @return Categorie
     */
    public function select($idCategorie) {
        $value = $idCategorie;
        $type = $this->crud->PDOType($value);

        $qr = 'SELECT * FROM categorie WHERE id = :id';
        $binds = array(
            array('key' => ':id', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);
        return new \entity\Categorie($data[0]);
    }

    /**
     * recuperer toutes les categories
     * @return array[Categorie]
     */
    public function selectAll() {
        $qr = 'SELECT * FROM categorie';
        $data = $this->crud->select($qr);
        foreach ($data as $value) {
            $categories[] = new \entity\Categorie($value);
        }
        return $categories;
    }

    /**
     * recuperer toutes les categories qui possedent au moins un produit avec display=true
     * @return array[Categorie]
     */
    public function selectAllIfProduit() {
        $qr = 'SELECT categorie.id, categorie.nom FROM categorie, produit WHERE categorie.id = produit.categorie AND produit.display = 1 GROUP BY categorie.nom';
        $data = $this->crud->select($qr);
        foreach ($data as $value) {
            $categories[] = new \entity\Categorie($value);
        }
        return $categories;
    }

    /**
     * mise à jour d'une catégorie
     * @param Categorie $categorie
     * @return void
     */
    public function update($categorie) {
        $value = $categorie->getId();
        $this->crud->update(
                'categorie', array(
            'nom' => $categorie->getNom()
                ), 'id = :id', array(
            array('key' => 'id', 'value' => $value, 'type' => PDO::PARAM_INT)
                )
        );
    }

    /**
     * connaitre le nombre de categories dans la BDD
     * @return int
     */
    public function count() {
        return $this->db->query('SELECT COUNT(*) FROM categorie')->fetchColumn();
    }

    /**
     * tester si le nom est existant dans la BDD
     * @param string $nom
     * @return boolean
     */
    public function existsNom($nom) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM categorie WHERE nom = :nom');
        $q->execute(array(':nom' => $nom));
        return (bool) $q->fetchColumn();
    }

    /**
     * tester si le nom est existant dans la BDD en excluant l'objet testé
     * @param Categorie $categorie
     * @return boolean
     */
    public function existsNomExceptSelfNom($categorie) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM categorie WHERE nom = :nom AND  id!= :id');
        $q->execute(array(
            ':nom' => $categorie->getNom(),
            ':id' => $categorie->getId()
        ));
        return (bool) $q->fetchColumn();
    }

}
