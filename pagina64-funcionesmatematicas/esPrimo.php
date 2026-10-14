<?php 
/*esPrimo: Devuelve verdadero si el número que se pasa como parámetro es primo y falso en caso
contrario.

<?php

/**
 * Función: esPrimo
 * 
 * Determina si un número entero es primo (solo divisible entre 1 y sí mismo).
 * 
 * Explicación matemática/algorítmica:
 * 1. Casos base y descartes iniciales:
 *    - Los números menores o iguales a 1 (negativos, 0 y 1) no son primos por definición.
 *    - El número 2 es el único número primo que además es par.
 *    - Cualquier otro número par mayor que 2 se descarta inmediatamente ($numero % 2 === 0).
 * 
 * 2. Optimización con raíz cuadrada ($i * $i <= $numero):
 *    - No es necesario comprobar divisores hasta $numero - 1. Si un número tiene un divisor
 *      compuesto, al menos uno de sus factores debe ser menor o igual que su raíz cuadrada.
 * 
 * 3. Paso de 2 en 2 ($i += 2):
 *    - Tras descartar los pares, solo se comprueban divisores impares (3, 5, 7, 9...),
 *      reduciendo a la mitad las iteraciones del bucle.
 * 
 * 4. Veredicto: Si ningún divisor produce residuo 0 ($numero % $i === 0), es primo (true).
 *
 * @param int $numero Número entero a evaluar.
 * @return bool True si es primo, false en caso contrario.
 */
function esPrimo(int $numero): bool {
    // Los números <= 1 no son primos
    if ($numero <= 1) {
        return false;
    }

    // El 2 es el único primo par
    if ($numero === 2) {
        return true;
    }

    // Se descartan todos los demás números pares
    if ($numero % 2 === 0) {
        return false;
    }

    // Comprobamos divisores impares hasta la raíz cuadrada del número
    for ($i = 3; $i * $i <= $numero; $i += 2) {
        if ($numero % $i === 0) {
            return false; // Se encontró un divisor exacto, no es primo
        }
    }

    // Si no tiene divisores exactos, es primo
    return true;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(esPrimo(2));   // bool(true)
// var_dump(esPrimo(7));   // bool(true)
// var_dump(esPrimo(13));  // bool(true)
// var_dump(esPrimo(4));   // bool(false)
// var_dump(esPrimo(1));   // bool(false)
// var_dump(esPrimo(0));   // bool(false)
// var_dump(esPrimo(-5));  // bool(false)