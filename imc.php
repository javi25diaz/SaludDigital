<?php
include 'clase.php';

$mensaje = "";
$nota = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $estatura = $_POST["estatura"];

    if (!is_numeric($peso) || $peso <= 0) {
        $mensaje = "Por favor, introduzca un peso válido.";
    } elseif (!is_numeric($estatura) || $estatura <= 0) {
        $mensaje = "Por favor, introduzca una estatura válida.";
    } else {
        $salud = new Salud();
        $resultado = $salud->calcularIMC($peso, $estatura);
        $mensaje = $resultado;

        // Notas según clasificación
        if (strpos($resultado, "Bajo peso") !== false) {
            $nota = "Podría ser necesario mejorar la nutrición. Consulte con un especialista.";
        } elseif (strpos($resultado, "Normal") !== false) {
            $nota = "¡Buen trabajo! Mantenga un estilo de vida saludable.";
        } elseif (strpos($resultado, "Sobrepeso") !== false) {
            $nota = "Se recomienda una dieta saludable y actividad física.";
        } elseif (strpos($resultado, "Obesidad I") !== false) {
            $nota = "Riesgo moderado. Considere apoyo médico y cambios en el estilo de vida.";
        } elseif (strpos($resultado, "Obesidad II") !== false) {
            $nota = "Riesgo alto. Consulte con su médico para un plan personalizado.";
        } elseif (strpos($resultado, "Obesidad III") !== false) {
            $nota = "Riesgo muy alto. Se recomienda atención médica urgente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>IMC - Salud Digital</title>
    <link rel="stylesheet" href="css/estilos.css?v=1">

</head>
<body>

    <!-- NAVBAR -->
    <header>
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
    </header>

    <!-- BANNER -->
    <header class="banner">
        <img src="imagenes/banner-imc.jpg" alt="Banner IMC">
    </header>

    <!-- DESCRIPCIÓN -->
    <section class="descripcion">
        <div>
            <h2>Cálculo de Índice de Masa Corporal</h2>
        </div>
        <div class="texto">
            <p>El IMC es una medida que relaciona el peso y la estatura.</p>
            <p>Ayuda a estimar si estás en un peso saludable.</p>
            <p>Conócelo para tomar decisiones informadas sobre tu salud.</p>
            <a href="#formulario" class="boton">Calcular</a>
        </div>
    </section>





    <!-- FORMULARIO -->
    <section id="formulario" class="formulario-imc">
        <div class="formulario-caja">
            <h3>Ingresa tus datos:</h3>
            <form method="post">
                <label>Peso (kg):</label>
                <input type="text" name="peso" required>
                <label>Estatura (m):</label>
                <input type="text" name="estatura" required>
                <button type="submit">Calcular</button>
            </form>
        </div>
        <div class="formulario-imagen">
            <img src="imagenes/imc-form.png" alt="Ilustración IMC">
        </div>
    </section>

    <!-- RESULTADO -->
    <?php if ($mensaje): ?>
    <section class="resultado">
        <div class="resultado-info">
            <h3>Resultado:</h3>
            <p><?php echo $mensaje; ?></p>
            <?php if ($nota): ?>
            <p><strong>Nota:</strong><br>"<?php echo $nota; ?>"</p>
            <?php endif; ?>
        </div>
        <div class="resultado-imagen">
            <img src="imagenes/imc-resultado.gif" alt="Resultado decorativo">
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

