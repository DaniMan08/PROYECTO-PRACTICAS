<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/php/guardar_empleado.php" -->

<?php
    require_once __DIR__ . "/../config/db.php";

    // 1. Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_alta = $_POST['fecha_alta'];
    $estado = $_POST['estado'];

    // 2. Insert en la tabla empleados
    $sql = "INSERT INTO empleados (nombre, apellidos, rol, email, telefono, fecha_alta, estado)
            VALUES (:nombre, :apellidos, :rol, :email, :telefono, :fecha_alta, :estado)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':rol' => $rol,
        ':email' => $email,
        ':telefono' => $telefono,
        ':fecha_alta' => $fecha_alta,
        ':estado' => $estado
    ]);

    // 3. Mensaje + redirección
    echo "<script>
    alert('Empleado registrado correctamente ✔️');
    window.location.href = '../registro_usuario.html';
    </script>";
    exit;
?>