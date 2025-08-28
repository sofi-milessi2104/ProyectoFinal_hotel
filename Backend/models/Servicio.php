<?php
require "../config/database.php";

class Servicio {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerServicio() {
        $stmt = $this->pdo->prepare("SELECT * FROM servicio");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($tipo_servicio, $descripcion_servicio, $imagen) {
        $stmt = $this->pdo->prepare("INSERT INTO servicios (tipo_servicio, descripcion_servicio, imagen) VALUES (:tipo_servicio, :descripcion_servicio, :imagen)");
        return $stmt->execute(["tipo_servicio" => $tipo_servicio, "descripcion_servicio" => $descripcion_servicio, "imagen" => $imagen]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM servicios WHERE id_servicio = :id");
        return $stmt->execute(["id" => $id]);
    }
}
?>