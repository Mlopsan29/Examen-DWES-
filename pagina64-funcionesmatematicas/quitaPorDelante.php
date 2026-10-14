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
 * Función: quitaPorDelante
 * 
 * Elimina $n dígitos por la izquierda (las cifras más significativas) de un número entero.
 * 
 * Explicación matemática/algorítmica:
 * 1. Control de límites:
 *    - Si $n <= 0, no se elimina ninguna cifra y se devuelve el número original.
 *    - Si $n >= cantidad total de dígitos, se eliminan todas las cifras y el resultado es 0.
 * 
 * 2. Conservación del signo:
 *    - Se guarda si el número era negativo ($esNegativo = true), se trabaja con su
 *      valor absoluto abs() y se restaura el signo al final.
 * 
 * 3. Cálculo de cifras restantes:
 *    - Si un número tiene 5 dígitos y quitamos 2 por delante, nos quedamos con las
 *      3 últimas cifras ($restantes = $totalDigitos - $n).
 * 
 * 4. Aislamiento por residuo (módulo):
 *    - Para conservar exactamente las últimas $restantes cifras, basta con calcular
 *      el resto de dividir el número entre 10 elevado a $restantes.
 *      (Ejemplo: 12345 con 3 cifras restantes -> 12345 % 1000 = 345).
 *    - Se calcula el divisor multiplicando 10 tantas veces como cifras queden
 *      mediante un bucle, evitando funciones externas.
 *
 * @param int $numero Número entero original.
 * @param int $n Cantidad de dígitos a eliminar por la izquierda.
 * @return int El número resultante tras quitarle los dígitos.
 */
function quitaPorDelante(int $numero, int $n): int {
    // Si no se pide quitar cifras, no se modifica
    if ($n <= 0) {
        return $numero;
    }

    $esNegativo = $numero < 0;
    $numero = abs($numero);
    $totalDigitos = digitos($numero);

    // Si quitamos tantas o más cifras de las que tiene, queda en 0
    if ($n >= $totalDigitos) {
        return 0;
    }

    $cifrasRestantes = $totalDigitos - $n;

    // Calculamos 10 elevado a $cifrasRestantes con un bucle
    $divisor = 1;
    for ($i = 0; $i < $cifrasRestantes; $i++) {
        $divisor *= 10;
    }

    // El residuo contiene exactamente las cifras que quedan a la derecha
    $resultado = $numero % $divisor;

    return ($esNegativo && $resultado !== 0) ? -$resultado : $resultado;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(quitaPorDelante(12345, 1)); // int(2345)
// var_dump(quitaPorDelante(12345, 2)); // int(345)
// var_dump(quitaPorDelante(12345, 5)); // int(0)
// var_dump(quitaPorDelante(-7890, 1)); // int(-890)
// var_dump(quitaPorDelante(1005, 1));  // int(5) (los ceros a la izquierda desaparecen numéricamente)