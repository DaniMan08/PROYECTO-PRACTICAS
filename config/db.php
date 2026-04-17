
<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/Config/db.php" -->

<?php

    // Conexión a Base de Datos
    $host = 'localhost'; // donde esta la base de datos
    $db   = 'escuela_teatro'; // nombre de la base de datos
    $user = 'root'; // usuario MySQL en XAMMP root
    $pass = ''; // contraseña vacía en XAMMP por defecto
    $charset = 'utf8mb4'; // Sistema de carácteres acentos, ñ, etc

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // cadena de conexión

    try {
        $pdo = new PDO($dsn, $user, $pass, [ // Conexion a BD
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        echo "Conexión correcta a la base de datos";

    } catch (PDOException $e) {
        die("Error en la conexión: " . $e->getMessage());
    }

?>