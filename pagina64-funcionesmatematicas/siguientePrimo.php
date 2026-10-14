<?php

/* siguientePrimo: Devuelve el menor primo que es mayor al número que se pasa como parámetro.


/**
 * Función auxiliar: esPrimo
 * Reutilizada para validar la primalidad de cada candidato.
 */
function esPrimo(int $numero): bool {
    if ($numero <= 1) return false;
    if ($numero === 2) return true;
    if ($numero % 2 === 0) return false;

    for ($i = 3; $i * $i <= $numero; $i += 2) {
        if ($numero % $i === 0) return false;
    }

    return true;
}

/**
 * Función: siguientePrimo
 * 
 * Devuelve el menor número primo estrictamente mayor al número dado.
 * 
 * Explicación matemática/algorítmica:
 * 1. Caso base para números pequeños:
 *    - Si el número dado es menor que 2 (negativos, 0 o 1), el siguiente primo
 *      inmediato es siempre el 2.
 * 
 * 2. Punto de partida:
 *    - Comenzamos evaluando el entero inmediatamente superior: $candidato = $numero + 1.
 * 
 * 3. Optimización con números pares:
 *    - Salvo el 2, ningún número par puede ser primo.
 *    - Si el punto de partida es par y mayor que 2, sumamos 1 para empezar en un impar.
 * 
 * 4. Búsqueda con bucle de paso 2:
 *    - En cada iteración evaluamos con esPrimo($candidato).
 *    - Si no es primo, avanzamos de 2 en 2 ($candidato += 2) saltándonos todos los pares,
 *      lo que reduce las comprobaciones a la mitad.
 *
 * @param int $numero Número entero de referencia.
 * @return int El menor primo estrictamente mayor que $numero.
 */
function siguientePrimo(int $numero): int {
    // Si es menor que 2, el primer primo que encontramos siempre es el 2
    if ($numero < 2) {
        return 2;
    }

    $candidato = $numero + 1;

    // Si el candidato es par y mayor que 2, pasamos al siguiente impar
    if ($candidato % 2 === 0 && $candidato > 2) {
        $candidato++;
    }

    // Avanzamos de 2 en 2 comprobando solo impares (salvo el 2)
    while (!esPrimo($candidato)) {
        $candidato += ($candidato === 2) ? 1 : 2;
    }

    return $candidato;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(siguientePrimo(-5)); // int(2)
// var_dump(siguientePrimo(2));  // int(3)
// var_dump(siguientePrimo(3));  // int(5)
// var_dump(siguientePrimo(14)); // int(17)
// var_dump(siguientePrimo(23)); // int(29)