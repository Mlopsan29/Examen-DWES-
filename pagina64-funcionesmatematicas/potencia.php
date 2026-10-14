<?php

/**
 * Función: potencia
 * 
 * Calcula y devuelve el resultado de elevar una base a un exponente dado.
 * 
 * Explicación matemática/algorítmica:
 * 1. Casos especiales y propiedades de potencias:
 *    - Cualquier base elevada a exponente 0 es igual a 1 ($base^0 = 1).
 *    - Si la base es 0 con exponente positivo, el resultado es 0.
 * 
 * 2. Exponentes positivos:
 *    - Se inicializa el resultado en 1 y se multiplica sucesivamente por la base
 *      tantas veces como indique el exponente (bucle for de 1 a $exponente).
 * 
 * 3. Exponentes negativos:
 *    - Por definición matemática, $base^(-n) = 1 / ($base^n).
 *    - Se calcula la potencia con el valor absoluto del exponente y se retorna el inverso
 *      (1 / $resultado).
 *    - Si la base es 0 y el exponente es negativo, se produce una indeterminación/división
 *      por cero.
 *
 * @param float|int $base Número base a elevar.
 * @param int $exponente Grado de la potencia (entero, puede ser negativo).
 * @return float|int Resultado del cálculo de la potencia.
 */
function potencia(float|int $base, int $exponente): float|int {
    // Caso base directo: cualquier número elevado a 0 es 1
    if ($exponente === 0) {
        return 1;
    }

    $resultado = 1;
    $expPositivo = abs($exponente);

    // Multiplicación sucesiva sin usar funciones nativas como pow() ni el operador **
    for ($i = 0; $i < $expPositivo; $i++) {
        $resultado *= $base;
    }

    // Si el exponente original era negativo, aplicamos la inversa: 1 / base^exp
    if ($exponente < 0) {
        return 1 / $resultado;
    }

    return $resultado;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(potencia(2, 3));   // int(8)
// var_dump(potencia(5, 0));   // int(1)
// var_dump(potencia(3, 4));   // int(81)
// var_dump(potencia(2, -2));  // float(0.25) -> (1 / 4)
// var_dump(potencia(-2, 3));  // int(-8)