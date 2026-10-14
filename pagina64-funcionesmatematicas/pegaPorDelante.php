<?php

/**
 * Función auxiliar: digitos
 * Cuenta cuántos dígitos componen el número para calcular el desplazamiento.
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
 * Función: pegaPorDelante
 * 
 * Añade un dígito (0 al 9) a un número entero por delante (por la izquierda).
 * 
 * Explicación matemática/algorítmica:
 * 1. Validación del dígito:
 *    - Debe pertenecer al rango [0, 9]. Si no es válido, se devuelve el número original.
 * 
 * 2. Conservación del signo:
 *    - Se guarda el signo si el número es negativo ($esNegativo = true),
 *      se opera con su valor absoluto abs() y se reasigna al final.
 * 
 * 3. Desplazamiento posicional del nuevo dígito:
 *    - Para situar el nuevo dígito antes de las cifras existentes, debemos desplazarlo
 *      multiplicándolo por 10 elevado a la cantidad de cifras que ya tiene el número original.
 *      (Ejemplo: insertar 5 delante de 342 -> 342 tiene 3 cifras -> 5 * 10^3 = 5000).
 *    - Se calcula la potencia de 10 con un bucle for acumulativo.
 * 
 * 4. Suma final:
 *    - 5000 + 342 = 5342.
 * 5. Caso especial (añadir el dígito 0 por delante):
 *    - Al tratarse de tipo entero (int), un cero a la izquierda carece de valor aritmético
 *      (ej: pegar 0 delante de 45 devuelve 45).
 *
 * @param int $numero Número entero original.
 * @param int $digito Cifra a añadir por la izquierda (de 0 a 9).
 * @return int El número resultante con la nueva cifra a la izquierda.
 */
function pegaPorDelante(int $numero, int $digito): int {
    // Validamos que sea un único dígito
    if ($digito < 0 || $digito > 9) {
        return $numero;
    }

    $esNegativo = $numero < 0;
    $numero = abs($numero);
    $totalDigitos = digitos($numero);

    // Calculamos 10 elevado al número de dígitos del número original
    $multiplicador = 1;
    for ($i = 0; $i < $totalDigitos; $i++) {
        $multiplicador *= 10;
    }

    // Colocamos el dígito en la posición de mayor peso y sumamos el resto
    $resultado = ($digito * $multiplicador) + $numero;

    return $esNegativo ? -$resultado : $resultado;
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(pegaPorDelante(342, 5));   // int(5342)
// var_dump(pegaPorDelante(7, 1));     // int(17)
// var_dump(pegaPorDelante(-89, 4));   // int(-489)
// var_dump(pegaPorDelante(0, 3));     // int(30)
// var_dump(pegaPorDelante(45, 0));    // int(45) (el cero a la izquierda en enteros no varía el valor)