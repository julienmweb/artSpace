<?php

namespace entity;

use PDO;

class CRUD {

    /**
     *
     * @var PDO 
     */
    private $db;

    /**
     * 
     * @param PDO $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Selection 
     * @param array $qr
     * @param array $binds
     * @param int $mode
     * @return array
     */
    public function select($qr, $binds = array(), $mode = PDO::FETCH_ASSOC) {
        try {
            $prep = $this->db->prepare($qr);

            foreach ($binds as $bind) {
                $prep->bindValue(
                        $bind['key'], $bind['value'], $bind['type']
                );
            }
            //lance la requete
            $prep->execute();

            //lecture des données
            $prep->setFetchMode($mode);
            $data = $prep->fetchAll();

            //ferme la connexion
            $prep->closeCursor();
            unset($prep);
            return $data;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Insertion
     * @param string $table
     * @param array $values
     * @return int
     */
    public function insert($table, $values) {
        try {
            $fields = '';
            $params = '';
            foreach ($values as $key => $value) {
                $fields.='`' . $key . '`,';
                $params.= ":" . $key . ",";
                $binds[] = array(
                    'key' => ':' . $key,
                    'value' => $value,
                    'type' => $this->PDOType($value)
                );
            }
            $fields = substr($fields, 0, -1);
            $params = substr($params, 0, -1);
            $qr = 'INSERT INTO `' . $table . '` (' . $fields . ') VALUES (' . $params . ');';

            $prep = $this->db->prepare($qr);
            foreach ($binds as $bind) {
                $prep->bindValue(
                        $bind['key'], $bind['value'], $bind['type']
                );
            }
            $prep->execute();
            $lastInsertId = $this->db->lastInsertId();
            //ferme la connexion
            $prep->closeCursor();
            unset($prep);
            return $lastInsertId;
        } catch (Exception $ex) {
            echo "erreur sql : ", $ex->getMessage();
            return false;
        }
    }

    /**
     * determine le type PDO d'une valeur
     * @param mixed $value
     * @return integer PDO::PARAM
     */
    public function PDOType($value) {
        switch (gettype($value)) {
            case 'integer':
                return PDO::PARAM_INT;
            case 'boolean':
                return PDO::PARAM_BOOL;
            case 'NULL':
                return PDO::PARAM_NULL;
            default:
                return PDO::PARAM_STR;
        }
    }

    /**
     * Supression
     * @param array $qr
     * @param array $binds
     * @return boolean
     */
    public function delete($qr, $binds = array()) {
        try {
            $prep = $this->db->prepare($qr);

            foreach ($binds as $bind) {
                $prep->bindValue(
                        $bind['key'], $bind['value'], $bind['type']
                );
            }
            //lance la requete
            $prep->execute();
            //ferme la connexion
            $prep->closeCursor();
            unset($prep);

            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * modification
     * @param string $table
     * @param array $values
     * @param string $where
     * @param array $binds
     * @return boolean
     */
    public function update($table, $values, $where = '', $binds = array()) {
        try {

            $fields = '';
            foreach ($values as $key => $value) {
                $fields .= '`' . $key . '` = :' . $key . ',';

                $binds[] = array(
                    'key' => $key,
                    'value' => $value,
                    'type' => $this->PDOType($value)
                );
            }
            $fields = substr($fields, 0, -1);
            $qr = 'UPDATE `' . $table . '` SET ' . $fields . ($where ? ' WHERE ' . $where : '') . ';';

            if (!$prep = $this->execute($qr, $binds)) {
                return false;
            }
            $prep->closeCursor();
            unset($prep);
        } catch (Exception $ex) {
            var_dump($ex);
            return false;
        }
    }

    /**
     * binds de la requête
     * @param string $qr
     * @param array $binds
     * @return boolean
     */
    private function execute($qr, $binds) {
        try {
            $prep = $this->db->prepare($qr);
            foreach ($binds as $bind) {
                $prep->bindValue(
                        $bind['key'], $bind['value'], $bind['type']
                );
            }
            $prep->execute();
        } catch (Exception $ex) {
            return false;
        }
    }

}
