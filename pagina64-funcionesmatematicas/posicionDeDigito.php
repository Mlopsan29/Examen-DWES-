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
 * Función auxiliar: digitoN
 * Obtiene el dígito situado en una posición contando de izquierda a derecha (base 0).
 */
function digitoN(int $numero, int $n): int {
    $numero = abs($numero);
    $totalDigitos = digitos($numero);

    if ($n < 0 || $n >= $totalDigitos) {
        return -1;
    }

    $descartes = $totalDigitos - 1 - $n;
    for ($i = 0; $i < $descartes; $i++) {
        $numero = intdiv($numero, 10);
    }

    return $numero % 10;
}

/**
 * Función: posicionDeDigito
 * 
 * Devuelve la posición de la primera ocurrencia de un dígito dentro de un número,
 * contando de izquierda a derecha empezando por la posición 0.
 * Si el dígito no está presente, devuelve -1.
 * 
 * Explicación matemática/algorítmica:
 * 1. Validación del dígito a buscar:
 *    - Un dígito válido debe estar comprendido entre 0 y 9. Si no cumple esto,
 *      se devuelve -1 de inmediato.
 * 
 * 2. Recorrido de izquierda a derecha:
 *    - Calculamos el número total de cifras con digitos($numero).
 *    - Mediante un bucle for desde $pos = 0 hasta $total - 1, extraemos la cifra
 *      en cada posición usando la función ya creada digitoN($numero, $pos).
 * 
 * 3. Primera ocurrencia y retorno temprano:
 *    - En cuanto la cifra actual coincide con $digito, se devuelve $pos de inmediato,
 *      garantizando que es la primera aparición desde la izquierda.
 * 
 * 4. Si el bucle termina sin encontrar coincidencias, devuelve -1.
 *
 * @param int $numero Número entero donde se busca.
 * @param int $digito Cifra que se busca (del 0 al 9).
 * @return int Índice de la primera aparición (base 0) o -1 si no se encuentra.
 */
function posicionDeDigito(int $numero, int $digito): int {
    // Un dígito solo puede ser del 0 al 9
    if ($digito < 0 || $digito > 9) {
        return -1;
    }

    $numero = abs($numero);
    $totalDigitos = digitos($numero);

    // Recorremos las posiciones de 0 hasta $totalDigitos - 1
    for ($pos = 0; $pos < $totalDigitos; $pos++) {
        if (digitoN($numero, $pos) === $digito) {
            return $pos; // Retorna la primera posición encontrada
        }
    }

    return -1; // No se encontró el dígito
}

// ==========================================
// Ejemplos de prueba:
// ==========================================
// var_dump(posicionDeDigito(34854, 4)); // int(1) (aparece en la pos 1 y 4, devuelve la 1ª)
// var_dump(posicionDeDigito(34854, 3)); // int(0)
// var_dump(posicionDeDigito(34854, 8)); // int(2)
// var_dump(posicionDeDigito(34854, 9)); // int(-1) (no existe)
// var_dump(posicionDeDigito(-702, 0));  // int(1)