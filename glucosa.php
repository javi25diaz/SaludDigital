<?php
include 'clase.php';

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];

    if (!in_array($tipo, ["ayunas", "posprandial"])) {
        $mensaje = "Tipo de medición inválido.";
    } elseif (!is_numeric($valor) || $valor <= 0) {
        $mensaje = "Ingrese un valor numérico válido para la glucosa.";
    } else {
        $salud = new Salud();
        $resultado = $salud->clasificarGlucosa($tipo, $valor);
        $mensaje = "Resultado de glucosa ($tipo): $valor mg/dL - $resultado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Glucosa - Salud Digital</title>
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
        <img src="imagenes/banner-glucosa.jpg" alt="Banner glucosa">
    </header>

    <!-- DESCRIPCIÓN -->
    <section class="descripcion">
        <div>
            <h2>Evaluación de Glucosa en Sangre</h2>
        </div>
        <div class="texto">
            <p>La glucosa es un indicador clave para la salud metabólica.</p>
            <p>Evaluar sus niveles ayuda a detectar prediabetes o diabetes.</p>
            <p>Selecciona el tipo de medición e ingresa tu valor.</p>
            <a href="#formulario" class="boton">Calcular</a>
        </div>
    </section>

    <!-- FORMULARIO -->
    <section id="formulario" class="formulario-imc">
        <div class="formulario-caja">
            <h3>Ingresa tus datos:</h3>
            <form method="post">
                <label>Tipo de medición:</label>
                <select name="tipo" required>
                    <option value="ayunas">Ayunas</option>
                    <option value="posprandial">Posprandal</option>
                </select>
                <label>Valor de glucosa (mg/dL):</label>
                <input type="text" name="valor" required>
                <button type="submit">Evaluar glucosa</button>
            </form>
        </div>
        <div class="formulario-imagen">
            <img src="imagenes/glucosa-form.gif" alt="Ilustración glucosa">
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
            <img src="imagenes/glucosa-resultado.png" alt="Resultado decorativo">
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
