<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/php/guardar_alumno.php" -->

<?php
require_once __DIR__ . "/../config/db.php";

// 1. Recoger datos
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha_alta = $_POST['fecha_alta'];
$estado = $_POST['estado'];

// 2. Insert simple
$sql = "INSERT INTO alumnos (nombre, apellidos, email, telefono, fecha_alta, estado)
        VALUES (:nombre, :apellidos, :email, :telefono, :fecha_alta, :estado)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nombre' => $nombre,
    ':apellidos' => $apellidos,
    ':email' => $email,
    ':telefono' => $telefono,
    ':fecha_alta' => $fecha_alta,
    ':estado' => $estado
]);

// 3. Mensaje + redirección
echo "<script>
alert('Alumno registrado correctamente ✔️');
window.location.href = '../registro_usuario.html';
</script>";
exit;

?>

