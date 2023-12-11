<?php

// Ejercicio 1
echo "Ejercicio 1 - Escribe una sentencia que muestre por pantalla 'Hola mundo'";
echo "<br>";
echo "Hola mundo";
echo "<br>";

/*
  Recuarda que puedes separar tus ejercicios añadiendo echo "<br>"; para insertar un nuevo parrafo
 */

// Ejercicio 2
echo "<br>";
echo "Ejercicio 2 - Crea una variable numerica que contenga el número 5 y muestralo por pantalla";
echo "<br>";
$num1 = 5;
echo $num1;
echo "<br>";

// Ejercicio 3
echo "<br>";
echo "Ejercicio 3 - Con la variable creada en el ejercicio anterior, suma otra variable de valor 15 y muestra el resultado por pantalla";
echo "<br>";
$num2 = 15;
echo $num1 + $num2;
echo "<br>";

// Ejercicio 4
echo "<br>";
echo "Ejercicio 4 - Crea una variable string y concatenala en una frase";
echo "<br>";
$str1 = "Hola";
echo $str1 . " que tal?";
echo "<br>";

// Ejercicio 5
echo "<br>";
echo "Ejercicio 5 - Crea una constante y muestrala";
echo "<br>";
define("CONST1", 23456);
echo CONST1;
echo "<br>";

// Ejercicio 6
echo "<br>";
echo "Ejercicio 6 - Crea un array con 5 elementos Strings y muestra el segundo elemento (array[2]) del array";
echo "<br>";
$array1 = ["miguel", "ainhoa", "jorge", "jacobo", "hugo"];
echo $array1[2];
echo "<br>";

// Ejercicio 7
echo "<br>";
echo "Ejercicio 7 - Crea una función que sume 3 números que pasemos por parametro mostrando resultados por pantalla";
echo "<br>";

function sumar($numero1, $numero2, $numero3) {
    echo $numero1 + $numero2 + $numero3;
}

echo sumar(3, 2, 1);
echo "<br>";

// Ejercicio 8
echo "<br>";
echo "Ejercicio 8 - Crea una función que contenga un 'if', 'elseif' y un 'else' mostrando resultados por pantalla";
echo "<br>";

function posibilidades($numero1) {
    if ($numero1 < 3) {
        echo $numero1 + 3;
    } else if ($numero1 == 3) {
        echo $numero1 * 3;
    } else {
        echo $numero1 / 3;
    }
}

posibilidades(2);
echo "<br>";

// Ejercicio 9
echo "<br>";
echo "Ejercicio 9 - Crea un switch en con un 'case' que contenga un while";
echo "<br>";

function ej9($numero1) {
    switch ($numero1) {
        case $numero1 < 3:
            echo "El número " . $numero1 . " es muy feo. Prueba con uno mayor.";
            echo "<br>";
            break;
        case $numero1 == 3:
            while ($numero1 < 10) {
                $numero1++;
                echo $numero1;
                echo "<br>";
            }
            break;
        default:
            echo "El número " . $numero1 . " es muy feo. Prueba con uno menor.";
            echo "<br>";
    }
}

ej9(3);
echo "<br>";

// Ejercicio 10
echo "<br>";
echo "Ejercicio 10 - ¿Qué diferencia hay entre un for y un foreach?, muestra un ejemplo.";
echo "<br>";
echo "La diferencia es que forEach es que es un método que itera solamente sobre los elementos que contiene un array." . "<br/>"
 . " En el caso de for of, este iteraba sobre otro tipo de objetos que no sean necesariamente arrays sobre las propiedades del mismo.";
echo "<br>";

$arrayEjemplo = [
    [1, 2],
    [3, 4],
];
echo "-> for";
echo "<br>";
// for
for ($index = 0; $index < count($arrayEjemplo); $index++) {
    echo $index;
}

echo "<br>";
echo "-> foreach";
echo "<br>";
//foreach
foreach ($arrayEjemplo as $v) {
    [$a, $b] = $v;
    echo "A: $a; B: $b\n";
}
echo "<br>";

// Ejercicio 11
echo "<br>";
echo "Php puede representar la fecha y hora de hoy. Muestralo por pantalla.";
echo "<br>";
$fecha_actual = date("d-m-Y h:i:s");
echo $fecha_actual;
echo "<br>";
// Ejercicio 12
echo "<br>";
echo "¿Para que sirve la expresión 'include'?, Realiza un ejemplo práctico en tu proyecto";
echo "<br>";
echo "Un include es un elemento del lenguaje PHP que nos permite incluir una página entera dentro de otra.";
"<br>";

$color = 'verde';
$fruta = 'manzana';

echo "<br>";

$contador = 0;
while ($contador < 11) {
    $contador++;
    $prueba .= "palabra$contador ";
}
echo $prueba;
?> 


