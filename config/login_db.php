<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/Config/login_db.php" -->

<?php	

	include("db.php"); // Conexión a BD

	// Comprobar que el usuario y contraseña existen en la BD
	if ($_SERVER["REQUEST_METHOD"] === "POST") { // Mira si los datos del formulario vienen por POST

		if (!empty($_POST["user"]) && !empty($_POST["pass"])) {

			// Recibimos datos del formulario
			$username = htmlspecialchars($_POST["user"]);
			$password = htmlspecialchars($_POST["pass"]);

		    // Consulta preparada sin ejecutar
			$stmt = $pdo->prepare("
				SELECT * 
				FROM usuarios
				WHERE nombre_usuario = :username
				AND password = SHA2(:password, 256)
			");
			
			// Se ejecuta la consulta
			$stmt->execute([
				"username" => $username,
				"password" => $password
			]);

			/* con fetch recogemos el resultado de la consulta y se guarda usuario
			 y contraseña y $user */
			$user = $stmt->fetch();

			if ($user) {
				    header("Location: ../index.html"); // redirecciónamos a pagina principal
   					exit(); // para detener la ejecución
			} else {
				      header("Location: ../login.php?error=1");
    				  exit();
			}

		} else {
			echo "Campos vacíos";
		}
	}

?>

<!--
Explicación del código:

if (!empty($_POST["user"]) && !empty($_POST["pass"]))

empty() devuelve true si el valor está vacío.
El ! lo invierte, así que:
- si hay valor → empty() = false → !false = true → entra al if
- si está vacío → empty() = true → !true = false → no entra

-->