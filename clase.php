<?php
class Salud {
    public function calcularIMC($peso, $estatura) {
        if ($estatura <= 0) return "Estatura inválida";
        $imc = $peso / ($estatura * $estatura);
        $imc = round($imc, 2);

        // Clasificación
        if ($imc < 18.5) {
            $clasificacion = "Bajo peso";
        } elseif ($imc < 25) {
            $clasificacion = "Normal";
        } elseif ($imc < 30) {
            $clasificacion = "Sobrepeso";
        } elseif ($imc < 35) {
            $clasificacion = "Obesidad I";
        } elseif ($imc < 40) {
            $clasificacion = "Obesidad II";
        } else {
            $clasificacion = "Obesidad III";
        }

        return "Tu IMC es: $imc - Clasificación: $clasificacion";
    }

    public function clasificarPresion($sistolica, $diastolica) {
        if ($sistolica < 90 || $diastolica < 60) {
            return "Presión baja - Recomendación: Consultar al médico en caso de presentar síntomas como mareos, visión borrosa o desmayos.";
        } elseif ($sistolica < 120 && $diastolica < 80) {
            return "Normal - Recomendación: Seguir un estilo de vida saludable y realizar un chequeo cada año.";
        } elseif ($sistolica >= 120 && $sistolica <= 129 && $diastolica < 80) {
            return "Elevada - Recomendación: Cambios de estilo de vida y reevaluación en 3-6 meses.";
        } elseif (($sistolica >= 130 && $sistolica <= 139) || ($diastolica >= 80 && $diastolica <= 89)) {
            return "Alta (Hipertensión Grado 1) - Recomendación: Cambios de estilo de vida y control mensual con medicación si es necesario.";
        } elseif (($sistolica >= 140 && $sistolica <= 180) || ($diastolica >= 90 && $diastolica <= 120)) {
            return "Alta (Hipertensión Grado 2) - Recomendación: Cambios de estilo de vida, 2 tipos de medicamentos y control frecuente.";
        } elseif ($sistolica > 180 || $diastolica > 120) {
            return "Crisis hipertensiva - Recomendación: Urgencia y emergencia médica inmediata.";
        }

        return "Datos fuera de rango válido.";
    }


    public function clasificarGlucosa($tipo, $valor) {
        if ($tipo === "ayunas") {
            if ($valor < 70) return "Hipoglucemia";
            if ($valor <= 99) return "Normal";
            if ($valor <= 125) return "Prediabetes";
            return "Diabetes";
        } elseif ($tipo === "posprandial") {
            if ($valor < 140) return "Normal";
            if ($valor <= 199) return "Prediabetes";
            return "Diabetes";
        } else {
            return "Tipo de medición desconocido";
        }
    }
}
?>

