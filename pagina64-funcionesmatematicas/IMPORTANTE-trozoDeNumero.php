<?php

/**
 * Función auxiliar: digitos
 * Cuenta cuántos dígitos componen el número.
 */
function digitos(int $numero): int {
    if ($numero === 0) return 1;
    $numero = abs($numero);
    $contador = 0;
    while ($numero > 0) {
        $numero = intdiv($numero, 10);
        $contador++;
    }
    return $contador;
}

/**
 * Función auxiliar: quitaPorDelante
 * Elimina $n dígitos por la izquierda.
 */
function quitaPorDelante(int $numero, int $n): int {
    if ($n <= 0) return $numero;
    $numero = abs($numero);
    $totalDigitos = digitos($numero);

    if ($n >= $totalDigitos) return 0;

    $cifrasRestantes = $totalDigitos - $n;
    $divisor = 1;
    for ($i = 0; $i < $cifrasRestantes; $i++) {
        $divisor *= 10;
    }

    return $numero % $divisor;
}

/**
 * Función auxiliar: quitaPorDetras
 * Elimina $n dígitos por la derecha.
 */
function quitaPorDetras(int $numero, int $n): int {
    if ($n <= 0) return $numero;
    $numero = abs($numero);

    for ($i = 0; $i < $n; $i++) {
        $numero = intdiv($numero, 10);
        if ($numero === 0) break;
    }

    return $numero;
}

/**
 * Función: trozoDeNumero
 * 
 * Extrae y devuelve la porción de un número entero comprendida entre
 * la posición inicial ($posIni) y la final ($posFin), ambas inclusive.
 * Se cuenta de izquierda a derecha empezando por la posición 0.
 * 
 * Explicación matemática/algorítmica combinando las funciones anteriores:
 * 
 * 1. Control de límites y validación de índices:
 *    - Se trabaja con el valor absoluto abs($numero).
 *    - Si los índices están invertidos ($posIni > $posFin), o fuera de rango
 *      ($posIni < 0 o $posFin >= totalDigitos), se devuelve -1 o valor de error.
 * 
 * 2. Extracción limpia en 2 pasos modulares:
 *    - Paso 1: Eliminar las cifras que sobran por la izquierda con quitaPorDelante().
 *      Quitamos exactamente $posIni cifras.
 *    - Paso 2: Eliminar las cifras que sobran por la derecha con quitaPorDetras().
 *      La cantidad de cifras sobrantes por detrás es ($totalDigitos - 1 - $posFin).
 * 
 * Ejemplo para $numero = 45892, $posIni = 1, $posFin = 3:
 *    - Dígitos: 0=4, 1=5, 2=8, 3=9, 4=2. Queremos 589.
 *    - Paso 1: quitaPorDelante(45892, 1) -> 5892.
 *    - Sobran por detrás: 5 - 1 - 3 = 1 cifra.
 *    - Paso 2: quitaPorDetras(5892, 1) -> 589 (correcto).
 *
 * @param int $numero Número entero original.
 * @param int $posIni Posición inicial (base 0, izquierda a derecha).
 * @param int $posFin Posición final (base 0, izquierda a derecha).
 * @return int El trozo numérico resultante, o -1 si los índices son incorrectos.
 */
function trozoDeNumero(int $numero, int $posIni, int $posFin): int {
    $numero = abs($numero);
    $totalDigitos = digitos($numero);

    // Validación de rangos
    if ($posIni < 0 || $posFin >= $totalDigitos || $posIni > $posFin) {
        return -1;
    }

    // 1. Quitamos los que están a la izquierda de la posición inicial
    $trozo = quitaPorDelante($numero, $posIni);

    // 2. Calculamos cuántos dígitos sobran a la derecha de la posición final
    $sobranDetras = $totalDigitos - 1 - $posFin;

    // 3. Quitamos los sobrantes de la derecha
    $trozo = quitaPorDetras($trozo, $sobranDetras);

    return $trozo;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(trozoDeNumero(45892, 1, 3)); // int(589)
// var_dump(trozoDeNumero(12345, 0, 2)); // int(123)
// var_dump(trozoDeNumero(12345, 3, 4)); // int(45)
// var_dump(trozoDeNumero(789, 1, 1));   // int(8)
// var_dump(trozoDeNumero(12345, 4, 1)); // int(-1) (rango inválido)