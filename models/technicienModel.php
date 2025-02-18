<?php

class Technicien {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getTechniciensByService(string $service): array {
        $sql = "SELECT * FROM technicien WHERE service_id = :service";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':service', $service);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getServiceData(int $service_id, string $data): ?string { // récupère le nom d'un service en fonction de son identifiant
        $sql = "SELECT $data FROM service WHERE id = :service_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? ucfirst($result[$data]) : null;
    }
}
?>