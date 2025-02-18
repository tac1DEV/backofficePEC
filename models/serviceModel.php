<?php

class Service {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllServices(): array {
        $sql = "SELECT * FROM service";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>