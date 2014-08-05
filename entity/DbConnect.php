<?php

namespace entity;

use PDO;

class DbConnect {

    /**
     *
     * @var string
     */
    private $dsn;

    /**
     *
     * @var string
     */
    private $dbname;

    /**
     *
     * @var string 
     */
    private $username;

    /**
     *
     * @var string 
     */
    private $port = 'port:3306;';

    /**
     *
     * @var int 
     */
    private $passwd;

    /**
     *
     * @var bool 
     */
    private $open = false;

    /**
     *
     * @var PDO 
     */
    private $db;

    /**
     * 
     * @param type $params
     */
    public function __construct($params) {
        $this->setDsn($params['dsn']);
        $this->setDbname($params['dbname']);
        if (isset($params['port'])) {
            $this->setPort($params['port']);
        }
        $this->setUser($params['username']);
        $this->setPasswd($params['passwd']);
        $this->connect();
    }

    /**
     * 
     * @param string $dsn
     * @return void
     */
    private function setDsn($dsn) {
        $this->dsn .= 'mysql:host=' . $dsn . ';';
    }

    /**
     * 
     * @param string $dbname
     * @return void
     */
    private function setDbname($dbname) {
        $this->dbname .= 'dbname=' . $dbname . ';';
    }

    /**
     * 
     * @param string $port
     * @return void
     */
    private function setPort($port) {
        $this->port .= 'port=' . $port . ';';
    }

    /**
     * 
     * @param string $username
     * @return void
     */
    private function setUser($username) {
        $this->username = $username;
    }

    /**
     * 
     * @param string $passwd
     * @return void
     */
    private function setPasswd($passwd) {
        $this->passwd = $passwd;
    }

    public function getDb() {
        return $this->db;
    }

    /**
     * création de l objet PDO avec les informations de connexion
     * @param PDO $db
     * @return void
     */
    private function connect() {
        try {
            $this->db = new PDO(
                    $this->dsn . $this->dbname . $this->port, $this->username, $this->passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8")
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->open = true;
        } catch (Exception $e) {
//            trigger_error('echec de la connexion', E_USER_ERROR);
            echo "Connection à MySQL impossible : ", $e->getMessage();
        }
        return $this->open;
    }

}
