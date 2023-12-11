<body style="background-color:rgba(125, 125, 155);">

    <h1>Ejercicios "Rompementes"</h1>
    <p>Level 1. ValidaNombreUsuario</p>
</body>

<?php
/*
  Haga que la función ValidaNombreUsuario(str) tome el parámetro str que se pasa y determine si la cadena String es un nombre de usuario válido de acuerdo con las siguientes reglas:

  1. El nombre de usuario tiene entre 4 y 25 caracteres.
  2. Debe comenzar con una letra.
  3. Solo puede contener letras, números y el carácter de subrayado.
  4. No puede terminar con un carácter de subrayado.

  Si el nombre de usuario es válido, entonces su programa debería devolver un booleano "true"; de lo contrario, devolverá un booleano "false".

  Ejemplos

  Input: "lp_"
  Output: false

  Input: "Pazo_da_merce"
  Output: true
 */

$str = "Pazo_da_merce";

function ValidaNombreUsuario($str) {
    return preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,23}[^_]{1}$/", $str) ? "true" : "false";
    // return preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,23}[a-zA-Z0-9]$/", $str) ? "true" : "false";
}

//Comprobación 
echo ValidaNombreUsuario($str);
?>

<p>Level 2. ComprobarCorchetes
</p>
<?php
/**
 * Haga que la función ComprobarCorchetes(str) tome el parámetro str que se pasa y devuelva 1 si los corchetes 
 * coinciden correctamente y se tiene en cuenta cada uno. De lo contrario, devuelve 0. Por ejemplo: si str es 
 * "(hola (mundo))", entonces la salida debería ser 1, pero si str es "((hola (mundo))", la salida debería ser 
 * 0 porque los corchetes no coinciden correctamente. Sólo "(" y ")" se utilizarán como corchetes. Si str no 
 * contiene corchetes, devuelva 1.
 * 
 * */
$str = "((hola mundo))";

function ComprobarCorchetes($str) {
    // Contadores
    $countOpen = 0;
    $countClose = 0;

    for ($index = 0; $index < strlen($str); $index++) {
        if ($str[$index] == "(") {
            $countOpen++;
        } else if ($str[$index] == ")") {
            $countClose++;
        }
        // Si en algún momento hay más paréntesis de cierre que de entrada
        // ya estaría mal, por lo que returneamos un false.
        if ($countOpen < $countClose) {
            return 0;
        }
    }
    echo $countClose == $countOpen ? "Está bien." : "Está mal.";
}

echo ComprobarCorchetes($str);
?>

<p>Level 3. CuestionDeInterrogaciones</p>

<?php
/**
 * 
 * Haga que la función CuestionDeInterrogaciones(str) tome el parámetro de cadena str, que contendrá números de un solo dígito, letras y 
 * signos de interrogación, y verifique si hay exactamente 3 signos de interrogación entre cada par de dos números que suman 10. 
 * Si es así, entonces su programa debería devolver "tru"; de lo contrario, debería devolver "false"". Si no hay dos números que sumen
 * 10 en la cadena, entonces su programa también debería devolver falso.
 *
 * Por ejemplo: si str es "arrb6???4xxbl5???eee5", entonces su programa debería devolver verdadero porque hay exactamente 3 
 * signos de interrogación entre 6 y 4, y 3 signos de interrogación entre 5 y 5 al final de la cadena.
 * 
 */
$str = "arrb7???3xxbl5???eee5";

function CuestionDeInterrogaciones($str) {
    $counterQuestions = 0;
    $num1 = 0;
    $num2 = 0;
    for ($index = 0; $index < strlen($str); $index++) {
        if ($num1 != 0 && $num2 == 0 && strcmp($str[$index], "?") == 0) {
            $counterQuestions++;
        }
        if (is_integer($str[$index]) && $num1 != 0) {
            $num2 = $str[$index];
        }
        if (is_integer($str[$index]) && $num1 == 0) {
            $num1 = $str[$index];
        }
        if (($num1 != 0 && $num2 != 0 && $counterQuestions == 3) && ($num1 + $num2) != 10 ||
                ($num1 != 0 && $num2 != 0 && $counterQuestions != 3)) {
            return "false";
        } else if (($num1 != 0 && $num2 != 0 && $counterQuestions == 3) && ($num1 + $num2) == 10) {
            $num1 = 0;
            $num2 = 0;
            $counterQuestions = 0;
        }
    }
    return "true";
}

echo CuestionDeInterrogaciones($str);
?>
