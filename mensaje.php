<!-- "http://localhost/FFE_PRACTICAS/PROYECTO-PRACTICAS/mensaje.php" -->
<?php require_once "php/read_people.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo mensaje</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">
    <a href="index.html" class="icono activo"><i class="fas fa-home"></i></a>
    <a href="mensajeria.html" class="icono"><i class="fas fa-comment"></i></a>
    <a href="login.html" class="icono"><i class="fas fa-user-plus"></i></a>
    <a href="registro.html" class="icono"><i class="fas fa-users"></i></a>
    <a href="historial.html" class="icono"><i class="fas fa-file-alt"></i></a>
    <a href="#" class="icono"><i class="fas fa-cog"></i></a>
</aside>

<main class="contenido contenido-flex">

<section class="contenedor-formulario">
    <h2>Nuevo mensaje</h2>

    <!-- DESTINATARIO -->
    <div class="bloque">
        <h3><i class="fas fa-chevron-down"></i> Destinatario</h3>

        <form method="GET">

            <div class="caja-input">
                <label>Selector usuario/grupo</label>
                <select name="tipo" onchange="this.form.submit()">
                    <option value="">Seleccionar...</option>
                    <option value="alumnos" <?= $tipo=="alumnos"?"selected":"" ?>>Alumnos</option>
                    <option value="profesores" <?= $tipo=="profesores"?"selected":"" ?>>Profesores</option>
                    <option value="posibles" <?= $tipo=="posibles"?"selected":"" ?>>Posibles alumnos</option>
                </select>
            </div>

        </form>

        <!-- SEGUNDO SELECT (RESULTADO BD) -->
        <?php if (!empty($datos)): ?>

        <div class="caja-input">
            <label>Seleccionar usuario</label>

            <select name="usuario">
                <?php foreach ($datos as $d): ?>
                  <option value="<?= $d['id'] ?>">
                        <?= $d['nombre'] . " " . $d['apellidos'] ?>
                   </option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php endif; ?>

    </div>

    <!-- MENSAJE -->
    <div class="bloque">
        <h3><i class="fas fa-chevron-down"></i> Mensaje</h3>

        <div class="caja-input">
            <label>Asunto</label>
            <input type="text">
        </div>

        <div class="caja-input">
            <label>Texto</label>
            <textarea></textarea>
        </div>
    </div>

    <!-- CANAL -->
    <div class="bloque">
        <h3><i class="fas fa-chevron-down"></i> Canal de envío</h3>

        <div class="caja-input">
            <label>Canal</label>
            <select>
                <option>Seleccionar ...</option>
                <option>Email</option>
                <option>WhatsApp</option>
            </select>
        </div>
    </div>

    <button class="boton-enviar">Enviar</button>

</section>

<!-- HISTORIAL -->
<aside class="historial">
    <h3>Historial</h3>

    <div class="buscador">
        <i class="fas fa-search"></i>
        <input type="text">
    </div>

    <div class="lista-historial">
        <div class="item-historial">Lorem ipsum dolor sit amet...</div>
        <div class="item-historial">Lorem ipsum dolor sit amet...</div>
        <div class="item-historial">Lorem ipsum dolor sit amet...</div>
    </div>
</aside>

</main>

</body>
</html>
