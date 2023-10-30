<?php
class Utilisateur {
    private $pdo;
    public function __construct() {
        $this->pdo = Connection::getInstance()->pdo;
    }

}