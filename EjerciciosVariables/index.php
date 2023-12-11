<body style="background-color:rgba(125, 125, 155);">

    <h1>Ejercicios "Variables y tipos de datos"</h1>
    <h2>1. variables</h2>
</body>

<?php
/**
 * @author Miguel Bastos Gándara.
 */
/*
  El comando echo y print permiten mostrar el valor de una variable e información
  en general. La diferencia principal es que echo no devuelve ningún valor y print
  devuelve 1, por lo que puede ser usado en expresiones. Por ello, echo es más
  rápido. Ambos se pueden usar con o si paréntesis.

  Crear dos variables que contengan números. Luego, crea otra variable para la suma.
  Crealiza un "echo" con una frase que contenga la variable suma.
  Crea un "print" con la misma frase y guardalo en una variable, por último, comprueba
  se la variable creada devuelve un 1.

 */
// Creamos las variables
$varNum1 = 2;
$varNum2 = 4;
$varSum = $varNum1 + $varNum2;

// Sacamos la suma con echo
echo "La suma es " . $varSum . "<br/>";

// Sacamos la suma con print y la guardamos en una variable
$printVar = print("La suma es " . $varSum) . "<br/>";

// Comprobamos que la variable devuelve 1
echo $printVar . "<br/>" . "<br/>";
?>

<h2>2. tipos de datos</h2>
<?php
/*

  PHP puede inferir y trabajar con los siguientes tipos de datos: cadenas, enteros,
  flotantes, booleanos, arrays, objetos y null.

  Crea una variable de cada tipo y luego muestra por pantalla con la función var_dump() el tipo de
  valor de la expresión. Recuerda que no necesitas realizar echo o print para mostrar la función.

 */
// Declaración de las variables
$varString = "Hola";
$varInt = 1;
$varFloat = 5.12;
$varBool = true;
$varArray = array(1, 2, 3, 4, 5);
$varObject = new class() {
    
};
$varNull = null;

// Mostrar por pantalla con var_dump()
var_dump($varString);
echo "<br/>";
var_dump($varInt);
echo "<br/>";
var_dump($varFloat);
echo "<br/>";
var_dump($varBool);
echo "<br/>";
var_dump($varArray);
echo "<br/>";
var_dump($varObject);
echo "<br/>";
var_dump($varNull);
echo "<br/>";
echo "<br/>";
?>
<h2>2.1 Strings</h2>

<?php
/*
  Algunas de las muchas funciones para trabajar con strings en PHP:
  ◦ strlen(): devuelve la longitud de una cadena.
  ◦ str_word_count(): devuelve el numero de palabras de una cadena.
  ◦ strrev(): devuelve la cadena invertida.
  ◦ strpos(): busca un texto en una cadena y devuelve su posición.
  ◦ str_repalce(): busca un texto en una cadena y lo reemplaza por otro.



  Crea una sentencia "echo" para cada función de los string, haciendo referencia
  a las caracteristicas de la función. Ejemplo:
  echo "La longitud de la cadena es: " . strlen($c) . "<br>";
  Puedes usar la cadena que quiera, o esta cadena de ejemplo:

  $cad= "Esto es una cadena de caracteres"
 */
// Declaración variable
$stringPrueba = "Esto es una cadena de caracteres";

// Sacamos echos probando las distintas funciones
echo "La longitud de la cadena es: " . strlen($stringPrueba) . "<br/>";
echo "El número de palabras de la cadena es: " . str_word_count($stringPrueba) . "<br/>";
echo "La cadena invertida es: " . strrev($stringPrueba) . "<br/>";
echo "LA posición del string 'caracteres' es: " . strpos($stringPrueba, "caracteres") . "<br/>";
echo "Cambiamos la palabra 'cadena' por 'CADENA': " . str_replace("cadena", "CADENA", $stringPrueba) . "<br/>";
?>
