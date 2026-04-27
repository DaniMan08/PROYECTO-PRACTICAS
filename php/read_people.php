<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/php/read_people.php" -->

<?php

// Conexión a DB
require_once __DIR__ . "/../config/db.php";

$tipo = $_GET['tipo'] ?? '';
$datos = [];

// Se selecciona la consulta según el tipo de usuario
// Se usa "AS id" para normalizar el nombre del campo ID,
// ya que cada tabla tiene un nombre diferente para su clave primaria
if ($tipo == "alumnos") {
    $sql = "SELECT id_alumno AS id, nombre, apellidos, email FROM alumnos";
} elseif ($tipo == "profesores") {
    $sql = "SELECT id_empleado AS id, nombre, apellidos, email FROM empleados";
} elseif ($tipo == "posibles") {
    $sql = "SELECT id_posible_alumno AS id, nombre, apellidos, email FROM posibles_alumnos";
}

// Ejecutar
if ($sql) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>