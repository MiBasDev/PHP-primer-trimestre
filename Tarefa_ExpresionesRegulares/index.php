<?php

// Declaración de variables.
$Nombre = "Juan";
$MiTexto = "Alan Mathison Turing (Paddington, Londres; 23 de junio de 1912-Wilmslow, Cheshire; 7 de junio de 1954) 
    fue un matemático, lógico, informático teórico, criptógrafo, filósofo y biólogo teórico británico. 
    Es considerado como uno de los padres de la ciencia de la computación y precursor de la informática moderna. 
    Proporcionó una formalización influyente de los conceptos de algoritmo y computación: la máquina de Turing.";
$CorreoElectronico = "elprofesoralberto@gmail.com";
$abecedario = "abcdefghijklmnñopqrstuvwz";

echo "<h1>Ejercicios de expresiones regulares<//h1>";
echo "<br/> <br/>";

//Ejercicio 1 - Usando "preg_match()" comprueba se en la variable abecedario existe el patron "abc"
echo preg_match("/abc/", $abecedario) ? "Sí, está en el abecedario" : "No está en el abecedario";
echo "<br/>";

//Ejercicio 2 - Usando "preg_match()" comprueba se en la variable abecedario existe el patron "fyu"
echo preg_match("/fyu/", $abecedario) ? "Sí, está en el abecedario" : "No está en el abecedario";
echo "<br/>";

//Ejercicio 3 - Comprueba si el la variable "Mitexto" empieza por una a
echo preg_match("/^a/", $MiTexto) ? "Sí, empieza por 'a'" : "No empieza por 'a'";
echo "<br/>";

//Ejercicio 3 b - Usa un "insensitive" para comproebar que  la variable "Mitexto" empieza por una a, independientemente si es mayuscula o minuscula
echo preg_match("/^a/i", $MiTexto) ? "Sí, empieza por 'a'" : "No empieza por 'a'";
echo "<br/>";

//Ejercicio 4 - Comprueba si el la variable "Mitexto" termina con la expresión "Turing."
echo preg_match("/Turing.$/", $MiTexto) ? "Sí, acaba por 'Turing.'" : "No acaba por 'Turing.'";
echo "<br/>";

//Ejercicio 5 - Comprueba si en la variable "Nombre" la segunda letra es una vocal.
echo preg_match("/.[aeiou]/", $Nombre) ? "Sí, es una vocal" : "No es una vocal";
echo "<br/>";

//Ejercicio 6 - Compruebame que la variable "abecedario" solo contiene letras minusculas
echo preg_match("/^[a-z]+$/", $abecedario) ? "Sí, solo contiene letras minúsculas" : "No solo contiene letras minúsculas";
echo "<br/>";

//Ejercicio 7 - Explica para que sirve los metacaracteres "*", "+", y "?" usando un ejemplo de cada uno.
// + Sirve para encontrar una o más ocurrencias del carácter que le precede.
echo preg_match("/Ju+an/", $Nombre) ? "Sí, 'u' sale 1 o más veces" : "No, 'u' no sale 1 o más veces";
echo "<br/>";

// * Sirve para encontrar cero o más ocurrencias del carácter que le precede
echo preg_match("/Ju*an/", $Nombre) ? "Sí, 'u' sale 0 o más veces" : "No, 'u' no sale 0 o más veces";
echo "<br/>";

// ? Sirve para encontrar 0 o 1 ocurrencias del carácter o expresión regular que le precede.
echo preg_match("/Ju*an/", $Nombre) ? "Sí, 'u' sale 0 o 1 veces" : "No, 'u' no sale 0 o 1 veces";
echo "<br/>";

//Ejercicio 8 - Explica para que serve los metacaracteres "{}" Usa un ejemplo.
/*
 * Sirven para iniciar un cuantificador min/máx.
 */
echo preg_match("/J[u]{1}an/", $Nombre) ? "Sí, hay solo una 'u' en el nombre" : "No hay solo una 'u' en el nombre";
echo "<br/>";

//Ejercicio 9 - Comprueba que en la variable "MiTexto" aparece la palabra "algoritmo", "ordenador", o "computación"
echo preg_match("/(algoritmo|ordenador|computación)/i", $MiTexto) ? 'Sí, salen "algoritmo", "ordenador", o "computación"' : 'No salen "algoritmo", "ordenador", o "computación"';
echo "<br/>";

//Ejericico 10 - Comprueba cuantas veces aparece la palabra "computación" en el texto
echo "La palabra 'computación' sale " . preg_match_all("/computación/i", $MiTexto) . " veces.";
echo "<br/>";

//Ejericico 11 - Comprueba cuantas veces aparece la palabra "computación" o "moderna" en el texto
echo "Las palabras 'computación' o moderna salen " . preg_match_all("/computación|moderna/i", $MiTexto) . " veces.";
echo "<br/>";

//Ejercicio 12 - Remplaza en "MiTexto" la palabra "padres" por "progenitores"
echo preg_replace("/padres/", "progenitores", $MiTexto);
echo "<br/>";

//Ejercicio 13 - Cuenta cuantos números hay en el texto "MiTexto
echo "Hay " . preg_match_all("/[0-9]+/", $MiTexto) . " números";
echo "<br/>";

//Ejercicio 14 - Comprueba que el correo de la variable $CorreoElectronico es un correo valido, es decir, esta formado por una cadena de al 
//menos 1 caracter de caracteres con letras o numeros, seguido de un "@", seguido de otra cadena de caracteres sin numeros, seguido de ".com"
echo preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+(.com)$/", $CorreoElectronico) ? "Email válido" : "Email NO válido";
// echo preg_match("/^[A-z0-9]+@[A-z]+\.com$/", $CorreoElectronico) 
