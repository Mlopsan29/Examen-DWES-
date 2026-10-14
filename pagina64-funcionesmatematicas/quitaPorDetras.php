<?php

/**
 * Función: quitaPorDetras
 * 
 * Elimina $n dígitos por la derecha (las unidades) de un número entero.
 * 
 * Explicación matemática/algorítmica:
 * 1. Control de límites y casos especiales:
 *    - Si $n <= 0, no se retira ninguna cifra y se devuelve el número tal cual.
 *    - Si la cantidad de cifras a quitar es mayor o igual que los dígitos totales
 *      del número, el resultado pasa a ser 0.
 * 
 * 2. Conservación del signo:
 *    - Si el número es negativo, se almacena su signo ($esNegativo = true),
 *      se opera con su valor absoluto abs() y se reasigna al final.
 * 
 * 3. Eliminación aritmética por la derecha:
 *    - Cada división entera entre 10 (intdiv) elimina de golpe la última cifra
 *      a la derecha (la unidad).
 *    - Se repite esta operación tantas veces como indique $n dentro de un bucle for.
 *
 * @param int $numero Número entero original.
 * @param int $n Cantidad de dígitos a eliminar por la derecha.
 * @return int El número resultante tras quitarle los dígitos.
 */
function quitaPorDetras(int $numero, int $n): int {
    // Si no se pide quitar dígitos, devolvemos el número sin cambios
    if ($n <= 0) {
        return $numero;
    }

    $esNegativo = $numero < 0;
    $numero = abs($numero);

    // Quitamos $n cifras dividiendo sucesivamente entre 10
    for ($i = 0; $i < $n; $i++) {
        $numero = intdiv($numero, 10);

        // Si ya nos quedamos sin cifras en mitad del proceso, el resultado es 0
        if ($numero === 0) {
            break;
        }
    }

    // Restauramos el signo original si el resultado no es 0
    return ($esNegativo && $numero !== 0) ? -$numero : $numero;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(quitaPorDetras(12345, 1)); // int(1234)
// var_dump(quitaPorDetras(12345, 3)); // int(12)
// var_dump(quitaPorDetras(12345, 5)); // int(0)
// var_dump(quitaPorDetras(-8765, 2)); // int(-87)
// var_dump(quitaPorDetras(456, 0));   // int(456)