<?php

/**
 * Función: digitos
 * 
 * Cuenta y devuelve la cantidad de dígitos que componen un número entero.
 * 
 * Explicación matemática/algorítmica:
 * 1. Caso especial (el número 0):
 *    - El 0 tiene exactamente 1 dígito.
 * 
 * 2. Tratamiento del signo:
 *    - Los números negativos tienen la misma cantidad de dígitos que su versión
 *      positiva. Se aplica abs() para ignorar el signo negativo.
 * 
 * 3. Conteo por divisiones sucesivas (sin usar strlen ni convertir a string):
 *    - Dividir un número entero entre 10 con división entera (intdiv) elimina
 *      su última cifra.
 *    - Se mantiene un contador que incrementa en 1 en cada iteración mientras
 *      el número sea mayor que 0.
 *
 * @param int $numero Número entero a evaluar.
 * @return int Cantidad de dígitos del número.
 */
function digitos(int $numero): int {
    // Caso base: el 0 tiene un solo dígito
    if ($numero === 0) {
        return 1;
    }

    $numero = abs($numero);
    $contador = 0;

    // Reducimos el número quitando la última cifra en cada iteración
    while ($numero > 0) {
        $numero = intdiv($numero, 10);
        $contador++;
    }

    return $contador;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(digitos(0));       // int(1)
// var_dump(digitos(7));       // int(1)
// var_dump(digitos(45));      // int(2)
// var_dump(digitos(1024));    // int(4)
// var_dump(digitos(-98765));  // int(5)