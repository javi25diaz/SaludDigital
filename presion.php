<?php
include 'clase.php';

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sistolica = $_POST["sistolica"];
    $diastolica = $_POST["diastolica"];

    if (!is_numeric($sistolica) || $sistolica <= 0) {
        $mensaje = "Ingrese una presión sistólica válida.";
    } elseif (!is_numeric($diastolica) || $diastolica <= 0) {
        $mensaje = "Ingrese una presión diastólica válida.";
    } else {
        $salud = new Salud();
        $resultado = $salud->clasificarPresion($sistolica, $diastolica);
        $mensaje = "Resultado de presión: $sistolica/$diastolica mmHg - $resultado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Presión Arterial - Salud Digital</title>
    <link rel="stylesheet" href="css/estilos.css?v=1">
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <div class="logo">
            <img src="imagenes/logo.png" alt="Salud Digital">
        </div>
        <ul class="menu">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="imc.php">IMC</a></li>
            <li><a href="presion.php">Presión Arterial</a></li>
            <li><a href="glucosa.php">Glucosa</a></li>
            <li><a href="#formulario">Calcular</a></li>
        </ul>
    </nav>

    <!-- BANNER -->
    <header class="banner">
        <img src="imagenes/banner-presion.gif" alt="Banner presión arterial">
    </header>

    <!-- DESCRIPCIÓN -->
    <section class="descripcion">
        <div>
            <h2>Evaluación de Presión Arterial</h2>
        </div>
        <div class="texto">
            <p>La presión arterial es clave para detectar riesgos cardiovasculares.</p>
            <p>Mantenerla bajo control puede prevenir enfermedades crónicas.</p>
            <p>Introduce tus valores para conocer tu estado actual.</p>
            <a href="#formulario" class="boton">Calcular</a>
        </div>
    </section>

    <!-- FORMULARIO -->
    <section id="formulario" class="formulario-imc">
        <div class="formulario-caja">
            <h3>Ingresa tus datos:</h3>
            <form method="post">
                <label>Presión Sistólica (mmHg):</label>
                <input type="text" name="sistolica" required>
                <label>Presión Diastólica (mmHg):</label>
                <input type="text" name="diastolica" required>
                <button type="submit">Evaluar presión</button>
            </form>
        </div>
        <div class="formulario-imagen">
            <img src="imagenes/presion-form.gif" alt="Ilustración presión arterial">
        </div>
    </section>

    <!-- RESULTADO -->
    <?php if ($mensaje): ?>
    <section class="resultado">
        <div class="resultado-info">
            <h3>Resultado:</h3>
            <p><?php echo $mensaje; ?></p>
        </div>
        <div class="resultado-imagen">
            <img src="imagenes/presion-resultado.jpg" alt="Resultado decorativo">
        </div>
    </section>
    <?php endif; ?>

    <!-- FOOTER -->
    <footer>
        <div class="footer-contenido">
            <div class="footer-logo">
                <img src="imagenes/logo-footer.png" alt="Logo Salud Digital">
            </div>
            <div class="footer-info">
                <div class="footer-links">
                    <span>Políticas de Privacidad</span>
                    <span>Términos de Uso</span>
                    <span>Configuración de Cookies</span>
                </div>
                <div class="footer-copyright">
                    © 2025 Salud Digital. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
