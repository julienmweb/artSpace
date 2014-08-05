<?php

namespace entity;
use PDO;
class ProduitManager {

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
     * ajoute un produit
     * @param Produit $produit
     * @return int (lastInsertId)
     */
    public function add($produit) {
        $data = $this->crud->insert('produit', array(
            'nom' => $produit->getNom(),
            'prix' => $produit->getPrix(),
            'description' => $produit->getDescription(),
            'categorie' => $produit->getCategorie()
        ));
        return $data;
    }


    /**
     * recuperer les informations d'un produit via son id
     * @param int $idProduit
     * @return Produit
     */
    public function select($idProduit) {
        $value = $idProduit;
        $type = $this->crud->PDOType($value);

        $qr = 'SELECT * FROM produit WHERE id = :id';
        $binds = array(
            array('key' => ':id', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);
        if (isset($data[0])){ 
            return new \entity\Produit($data[0]);
        } else {
            return null;
        }
    }
    /**
     * recupere les informations d'un produit si display=true
     * @param type $idProduit
     * @return Produit
     */
    public function selectActif($idProduit) {
        $value = $idProduit;
        $type = $this->crud->PDOType($value);

        $qr = 'SELECT * FROM produit WHERE id = :id AND display=1';
        $binds = array(
            array('key' => ':id', 'value' => $value, 'type' => $type)
        );

        $data = $this->crud->select($qr, $binds);
        if (isset($data[0])){ 
            return new \entity\Produit($data[0]);
        } else {
            return null;
        }
    }    
    
    /**
     * recuperer tous les produits
     * @return array[Produit]
     */
    public function selectAll() {
        $qr = 'SELECT * FROM produit';
        $data = $this->crud->select($qr);
        foreach ($data as $value) {
            $produits[] = new \entity\Produit($value);
        }
        return $produits;
    }
    
    /**
     * recuperer tous les produits avec les informations de la table catégorie
     * @return array[\entity\Produit]
     */
    public function selectAllJoinCategorie() {
        $qr = 'SELECT P.id, P.nom nom, C.nom categorie, description, prix, P.display FROM produit P, categorie C WHERE P.categorie = C.id ORDER BY P.categorie';
        $data = $this->crud->select($qr);
        foreach ($data as $value) {
            $produits[] = new \entity\Produit($value);
        }
        return $produits;
    }
    /**
     * récupere tous les produits d'une catégorie
     * @param int $categorieId
     * @return array[\entity\Produit]
     */
    public function selectAllByCategorie($categorieId) {
        $value = $categorieId;
        $type = $this->crud->PDOType($value);
        $qr = 'SELECT * FROM produit WHERE produit.categorie = :categorie';
        $binds = array(
            array('key' => ':categorie', 'value' => $value, 'type' => $type)
        );
        
        $data = $this->crud->select($qr, $binds);
        foreach ($data as $value) {
            $produits[] = new \entity\Produit($value);
        }
        return $produits;
    }
    /**
     * récupere tous les produits avec display=true d'une catégorier
     * @param int $categorieId
     * @return array[\entity\Produit]
     */
    public function selectAllActifByCategorie($categorieId) {
        $value = $categorieId;
        $type = $this->crud->PDOType($value);
        $qr = 'SELECT * FROM produit WHERE produit.categorie = :categorie AND produit.display=1';
        $binds = array(
            array('key' => ':categorie', 'value' => $value, 'type' => $type)
        );
        
        $data = $this->crud->select($qr, $binds);
        foreach ($data as $value) {
            $produits[] = new \entity\Produit($value);
        }
        return $produits;
    }
    
    
    /**
     * modification d'un produit
     * @param Produit $produit
     * @return void
     */
    public function update($produit) {
        $value = $produit->getId();
        $this->crud->update(
            'produit',
            array(
                'nom' => $produit->getNom(),
                'description' => $produit->getDescription(),
                'prix' => $produit->getPrix(),
                'categorie' => $produit->getCategorie(),
                'display'=> $produit->getDisplay()
            ),
            'id = :id',
            array(
                array('key' => 'id', 'value' => $value, 'type' => PDO::PARAM_INT)
            )
        );
    }

    /**
     * tester si le nom est existant dans la BDD
     * @param string $nom
     * @return boolean
     */
    public function existsNom($nom) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM produit WHERE nom = :nom');
        $q->execute(array(':nom' => $nom));
        return (bool) $q->fetchColumn();
    }
    
    /**
     * tester si le nom est existant dans la BDD en excluant l'objet testé
     * @param Produit $produit
     * @return boolean
     */    
    public function existsNomExceptSelfNom($produit) {
        $q = $this->db->prepare('SELECT COUNT(*) FROM produit WHERE nom = :nom AND  id!= :id');
        $q->execute(array(
            ':nom' => $produit->getNom(),
            ':id' => $produit->getId()
        ));
        return (bool) $q->fetchColumn();
    }    
    
    /**
     * connaitre le nombre de produits dans la BDD
     * @return int
     */
    public function count() {
        return $this->db->query('SELECT COUNT(*) FROM produit')->fetchColumn();
    }
    
   

}
