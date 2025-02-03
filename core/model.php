<?php

namespace Core;

use PDO;
use PDOException;

class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance(); // Supondo que você tenha um método para obter a instância do banco de dados
    }

    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
