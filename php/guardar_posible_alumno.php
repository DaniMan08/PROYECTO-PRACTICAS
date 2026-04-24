<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/php/guardar_posible_alumno.php" -->

<?php
require_once __DIR__ . "/../config/db.php";

// 1. Recoger datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$nivel_interes = $_POST['nivel_interes'];
$fecha_interes = $_POST['fecha_interes'];
$tipo_interes = $_POST['tipo_interes'];
$clase_prueba = $_POST['clase_prueba'];
$apuntado = $_POST['apuntado'];
$fecha_apuntado = $_POST['fecha_apuntado'];
$horario_apuntado = $_POST['horario_apuntado'];
$notas = $_POST['notas'];

// 2. Insert en la base de datos
$sql = "INSERT INTO posibles_alumnos 
(nombre, apellidos, nivel_interes, fecha_interes, tipo_interes, clase_prueba, apuntado, fecha_apuntado, horario_apuntado, notas)
VALUES 
(:nombre, :apellidos, :nivel_interes, :fecha_interes, :tipo_interes, :clase_prueba, :apuntado, :fecha_apuntado, :horario_apuntado, :notas)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nombre' => $nombre,
    ':apellidos' => $apellidos,
    ':nivel_interes' => $nivel_interes,
    ':fecha_interes' => $fecha_interes,
    ':tipo_interes' => $tipo_interes,
    ':clase_prueba' => $clase_prueba,
    ':apuntado' => $apuntado,
    ':fecha_apuntado' => $fecha_apuntado,
    ':horario_apuntado' => $horario_apuntado,
    ':notas' => $notas
]);

 // 3. Mensaje + redirección
    echo "<script>
    alert('Posible alumno registrado correctamente ✔️');
    window.location.href = '../registro_usuario.html';
    </script>";
    exit;

?>