<body style="background-color:rgba(125, 125, 155);">

    <h1>Ejercicios "Constantes y operaciones"</h1>
    <h2>1. Constantes</h2>
</body>

<?php
/**
 * @author Miguel Bastos Gándara.
 */
/*
  Las constantes son variables cuyo valor no se puede cambiar o volver indefinidas.
  Las constantes son globales, es decir, se pueden usar en todo el código.


  Para definir una constante usamos la palabra reservada "define":

  define("nombre", "valor", distinción entre mayus y minus): permite crear constantes. Son globales. El último parámetro indica si el nombre de la constante es sensible a mayúsculas.
  True para NO DISTINGUIR y false para DISTINGUIR, puede no especificarse.

  Compruebalo con ejemplos:

  Realiza una constante cuyo valor sea un número entero positivo al que llamaremos "num1".
  A continuación comprueba con "echos" te sucede si al definir la constante tiene 2 parametros.
  Comprueba también si al introducir el tercer parametro a true o a false e intentar mostrarla este valor cambia dependiendo de si lo
  escribimos con alguna mayúscula o con alguna minúscula. (Num1, nUM1, nuM1, etc).
  ¿Qué muestra cuando la constante no tiene el nombre correctamente escrito?

 */
// Definimos la constante de forma normal
define("NUM1", 10);
echo "Constante: " . NUM1;
// Definimos la contante con case_sensitive
//define("NUM1", 10, false);
//echo NUM1;
//echo num1;
// Al ejecutar "num1" en minúsuculas, da un error.
?>


<h2>1.2 Arrays de constantes</h2>

<?php
/*

  Podemos definir un array de constantes de esta manera:

  define("Nombre", ["Valor1","Valor2","Valor3"]);

  Pruebalo realizando un ejemplo donde se guarde un array de los números 4, 8, 15, 16, 23 y 42.

  Luego, suma "num1" del ejercicio anterior con el número de la posición 3.

  ¿Qué número has sumado?
 */

define("CONSTANTES", [4, 8, 15, 16, 23, 42]);
echo "Suma de constante numérica y posición de array constante: " . (NUM1 + CONSTANTES[3]);
?>


<h2>2.Operadores</h2>

<?php
/*

  Existen multitud de operadores: Sirven para realizar operaciones o comparativas entre variables y constantes.
  Vamos a realizar un ejemplo con cada uno:

  •Incremento/decremento: ++, --. Colocados antes que la variable, primero
  incrementan o decrementan y luego devuelven el valor, mientras que colocados
  después, primero devuelven el valor y luego incrementan o decrementan la
  variable.

  •Lógicos: and, or, not, xor, &&, ||, !

  •De cadena: ., .= Este último operador concatena el contenido de una variable a otra.

  •Asignación condicional: ?:, ??

 */
// Incremento
$numIncrement = 2;
echo "<p>Incremento:</p>";
echo $numIncrement++ . "<br/>";
echo ++$numIncrement;
// Decremento
$numDecrement = 3;
echo "<p>Decremento:</p>";
echo $numDecrement-- . "<br/>";
echo --$numDecrement;

// Lógicos
echo "<p>Operadores lógicos:</p>";

function logicalOperators($numToOperate1, $numToOperate2, $iterator) {
    for ($i = 0; $i < $iterator; $i++) {
        if ($numToOperate1 == 0 && $numToOperate2 == 1) {
            echo "&& <br/>";
        } else if ($numToOperate1 == 10 || $numToOperate2 == 10) {
            echo "|| <br/>";
        } else if ($numToOperate1 != 10 && $numToOperate2 == 9) {
            echo "! <br/>";
        }
        $numToOperate1++;
        $numToOperate2++;
    }
}

logicalOperators(0, 1, 10);

// De cadena
echo "<p>Operadores de cadena:</p>";
$string1 = "hola, ";
$string2 = "¿qué tal?";
echo $string1 . "amigo </br>";
$string1 .= $string2;
echo $string1 . "</br>";

// Asignación condicional
echo "<p>Operadores de asignación condicional:</p>";
$string3 = "Hola Alberto, ¿qué tal?";
echo preg_match("/hola/", $string1) ? "Sí está" : "No está";
echo "</br>";
$string4 = null;
$string5 = null;
$string6 = "No nulo con ??";
echo $string4 ?? $string5 ?? $string6;
echo "</br>";
?>


<h2>2.Operadores Aritméticos</h2>

<?php
/*
  Sirven para operar con diferentes números:

  Sumar   	                $x + $y
  Restar	                    $x - $y
  Multiplicar                 $x * $y
  Dividir                     $x / $y
  Resto de una división       $x % $y
  Realizar el exponente       $x ** $y



  Realiza un ejemplo de cada operador combinando constantes y variables.
  ¿Qué sucede se realizamos la división entre 10 y 3?


 */

$numTest = 3;
echo "Sumar: " . (NUM1 + $numTest) . "</br>";
echo "Restar: " . (NUM1 - $numTest) . "</br>";
echo "Multiplicar: " . (NUM1 * $numTest) . "</br>";
// La división convierte el resultado de int a float
echo "Dividir: " . (NUM1 / $numTest) . "</br>";
echo "Resto de una división: " . (NUM1 % $numTest) . "</br>";
echo "Realizar el exponente: " . (NUM1 ** $numTest) . "</br>";
?>


<h2>2.Operadores de asignación</h2>


<?php
/*
  Sirven para, como su nombre indica, asignar un valor a una variable. Ejemplo:
  $Num1 += $Num2;  Ahora la variable "Num1" poseé el valor de Num1 más el valor de Num2

  Prueba cada una de las asignaciones =, +=, -=, *=, /= con un ejemplo.

  ¿Se puede asignar dentro de la misma linea varias operaciones a la vez, que pasa cuando se intenta?


 */
$numAsignation1 = 2;
$numAsignation2 = 1;
echo "- Números " . $numAsignation1 . " y " . $numAsignation2 . ": </br>";
echo "Operador =: " . ($numAsignation1) . "</br>";
$numAsignation1 += $numAsignation2;
echo "Operador +: " . ($numAsignation1) . "</br>";
$numAsignation1 -= $numAsignation2;
echo "Operador -: " . ($numAsignation1) . "</br>";
$numAsignation1 *= $numAsignation2;
echo "Operador *: " . ($numAsignation1) . "</br>";
$numAsignation1 /= $numAsignation2;
echo "Operador /: " . ($numAsignation1) . "</br>";
?>


<h2>2.Operadores de comparación</h2>

<?php
/*
  Sirven para, comparar dentro de bucles o condiciones, devuelven 1 si se cumple la condición y 0 si no se cumplen.
  ==, ===, !=, !==, >, <, <=, >=, <=>.

  Ejemplo:

  $x = 5;
  $y = 10;
  echo ($x <= $y) //Devuelve 1

  Realiza 3 ejemplos con los operador que quieras, sin repetir operador en el ejemplo.

  El operador "<=>" es un poco particular. Investiga como funciona y explicalo con ejemplos.

  ¿Qué diferencia hay entre el operador " !== " y el operador " != "? Escribe algún ejemplo.

 */
$numOperation1 = 10;
$numOperation2 = 5;
echo ($numOperation1 <= $numOperation2) ? "Menor o igual" : "Mayor";
echo " (con <=) </br>";
echo ($numOperation1 > $numOperation2) ? "Mayor" : "Menor";
echo " (con >) </br>";
echo ($numOperation1 != $numOperation2) ? "Diferente" : "Igual";
echo " (con !=)</br>";

// Operador "<=>" ($a <=> $b): Un integer menor que, igual a, o mayor que cero 
// cuando $a es respectivamente menor que, igual a, o mayor que $b.
// La diferencia del operador "!==" y "!=" es que el primero compara el valor
// y el tipo de variable, mientras que el segundo solo compara el valor.
?>


<h2>2.Operadores Lógicos e incremento</h2>

<?php
/*
  INCREMENTO Y DESCREMENTO
  ++, --. Colocados antes que la variable, primero
  incrementan o decrementan y luego devuelven el valor, mientras que colocados
  después, primero devuelven el valor y luego incrementan o decrementan la
  variable.

  OPERADORES LÓGICOS

  Son el "and", "or", "xor" y "not"

  Se pueden escribir como

  and o &&        Devuelve "true" si los las dos variables son verdaderas
  or o ||         Devuelve "true" si una de las dos variables es verdadera
  !               Devuelve "true" si la variable es falsa
  xor             Devuelve "true" si una de las dos variables es verdadera y solo una de ellas.


  Ejemplo
  $x = 20;
  $y = 40;

  if ($x == 20 xor $y == 40) {
  echo "El operador xor funciona asi"; //No realiza el "echo"
  }
  ?>

  Realiza un bucle "While" con ejemplerizando Estos operadores lógicos, incrementando o decrementando
  un número hasta que se cumpla (o no se cumpla) una condición.

  ¿Puedo concatenar diferentes operadores lógicos en la misma sentencia?

 */

function logicalIncrement($num) {
    $varWhile1 = "hola";
    $varWhile2 = 5;
    while ($num != 10) {
        if ($varWhile1 == "hola" && $num == 3) {
            echo "Operador lógico -> && </br>";
        } else if (($varWhile2 == 5 && $num == 7) || ($varWhile2 == 5 && $num == 9)) {
            // Sí se pueden usar diferentes operadores en una misma sentencia
            echo "Operador lógico -> || </br>";
        } else if ($varWhile2 == 5 && $num == 6 && $varWhile1 != "hoola") {
            echo "Operador lógico -> != </br>";
        } else if ($varWhile2 == 5 xor $num != 8) {
            echo "Operador lógico -> xor </br>";
        }
        $num++;
    }
}

logicalIncrement(1);
?>


<h2>2.Operadores De cadena y asignación condicional</h2>

<?php
/*
  Los operadores de cadena nos permiten "encadenar" textos, uno detras del otro. Lo conseguimos con un punto "." en el echo o en el print.
  Podemos asignar esa cadena a una solo variable usando " .= "

  Concatena estas variables.
  $txt1 = "¿Dónde";
  $txt2 = " están";
  $txt3 = "las gata' que nos";
  $txt4 = "hablan y tiran pa' a'lante?";

  ¿Se puede concatenar variables y constantes?
  ¿Se puede concatenar otro tipo de dato que no sea un string?
  Contesta a las preguntas con algún ejemplo


  Por último, existen las asignaciones condicionales, que se escriben con "?" o "??" siguiendo esta sintaxis:

  "condición" ? "expr1" : "expr2";

  Si la condición es verdadera si realizará la expr1, y si no, la expr2.

  Existe también la asignación "??", escribiendose así:

  $x = expr1 ?? expr2

  Devuelve el valor de X. Si la expr1 existe. Si no existe o es NULL, el valor de $x cambia al valor de la expr2

  Ejemplo:

  $cantante = "Aitana";
  echo $cantante; //Muestra Aitana
  $cantante = NULL;
  echo "<br>";
  $cantante = $cantante ?? "Amaia";
  echo $cantante; //Muestra Amaia



  Realiza un último ejemplo conviertiendo las variables anteriores ($txt1, $txt2, $txt3 y $txt4) en una
  sola variable ($txt5) si $txt1 no existe o es nulo.



 */
$txt1 = "¿Dónde";
$txt2 = " están ";
$txt3 = "las gata' que nos ";
$txt4 = "hablan y tiran pa' a'lante?";
echo "Concatenadas normal -> " . $txt1 . $txt2 . $txt3 . $txt4 . "</br>";
// Sí, se pueden concatenar variables y constantes.
echo "Concatenadas con una constante -> " . $txt1 . $txt2 . $txt3 . NUM1 . " " . $txt4 . "</br>";
// Sú, se puede concatenar otro tipo de dato.
echo "Concatenadas con otro tipo de dato -> " . $txt1 . $txt2 . 4 . " " . $txt3 . $txt4 . "</br>";

// Concatenar si $txt1 es nulo.
$txt1 = null;
$txt5 = $txt1 ?? "¿DÓNDE" . $txt2 . $txt3 . $txt4;
echo "Concatenadas si txt1 es nulo o no existe -> " . $txt5;
