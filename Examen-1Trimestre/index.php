<!DOCTYPE html>
<body style="background-color:rgba(125, 125, 155);">
    <h1>Examen Desenvolvemento Web Contorno Servidor </h1>
    <p>27-11-23</p>
    <a href='ejercicio1.php'>ejercicio 1</a>
    </br>
    <a href='ejercicio2.php'>ejercicio 2</a>
    </br>
    <a href='ejercicio3.php'>ejercicio 3</a>
    </br>
    <a href='ejercicio4.php'>ejercicio 4</a>
</body>

<?php

/*
CONSIDERACION INICIAL

Si durante el desarrollo de alguna pregunta del examen el alumno se encuentra
con algun error de ejecucion que no es capaz de resolver puede volcar ese ejercicio
en otro archivo .php y continuar el examen.

*/


/*
Ejercicio 1 - Calculo y redondeo  ----- 2'5 puntos

Crea un formulario donde se le pida al usuario la altura y la base, en formato de dos cifras decimales,
para calcular un area. En ese mismo formulario el usuario eligira si quiere calcular el area de un 
cuadrado, un rectangulo o un triangulo.

A continuacion muestra el resultado de esa operacion por pantalla, redondeando los decimales para que solo
se muestre un decimal en pantalla.

Ejemplo: La base de un cuadrado es 25'34, su area es igual a 50'7.

Ten en cuenta que:

Para calcular el area:
    >Cuadrado: Base x Base
    >Rectangulo: Base X Altura
    >Triangulo: (Base X Altura) / 2

Si el usuario quiere calcular un cuadrado debe escribir el mismo número en la base y en la altura.
Si el usuario no introduce algun dato debe aparecer un mensaje de error para que rectifique.
Si el usuario introduce caracteres en vez de numeros debe aparecer un mensaje de error para que rectifique.
Ten en cuenta que este ultimo mensaje de error se debe realizar con filtros.

*/
// ejercicio1.php


/*
Ejercicio 2 - Creación de listas ----- 2'5 puntos

Lee el fichero "peliculas.json" y crea una tabla mostrando por pantalla la pelicula,
su fecha y su nota, a continuación guarda en un fichero nuevo la nota media de 
todas las peliculas, señalando dentro del fichero tambien el nombre de todas las peliculas, pero 
no muestres su fecha de creación. A ese fichero llamalo "NotaMedia".

*/
// ejercicio2.php


/*
Ejercicio 3 - Cookies ----- 2'5 puntos

Crea un formulario que emule una pagina para crear una contraseña para un usuario.
La pagina solicita por pantalla un nombre y una contraseña, que el usuario tiene que escribir dos
veces para verificar que realmente quiere tener esa contraseña. Usando Cookies guarda esas dos 
contraseñas y el nombre del usuario. A continuación, cuando la persona finaliza el formulario, este
te llevara a una pagina web php nueva llamada "ValidacionDeContraseña" la cual lee las cookies
de las dos contraseñas; si coiniciden, mandara un mensaje de "Usuario <nombre de usuario> creado correctamente."
Si no coincide, mandara un mensaje de error pidiendo que las dos contraseñas seran iguales.

Para ambos casos, crea un boton que vuelva a la pagina web "Examen 27-11-23".
Ten en cuenta que el usuario no puede ver las contraseñas que está escribiendo, como sucede en la vida real.

*/
// ejercicio3.php


/*
Ejercicio 4 - Objetos ----- 2'5 puntos

Crea un objeto "Empleado" que contrendrá los atributos: "Nombre", "Apellido", "años en la empresa" y "salario original".

Para calcular el salario Final, que es lo que cobra este mes la persona, se tiene que realizar un bono:

    Bono = (Salario original X (años en la empresa / 100))

    salario Final = Salario original + Bono

Es decir:

    salario Final = Salario original + (Salario original X (años en la empresa / 100))

A continuación crea dos clases abstractas.

Una de esas clases, sera de "jefe", que calcula el salario final con un bono diferente:
    Bono = (Salario original X (años en la empresa / 20))

La otra será "becario", que calcula el salario final con otro bono diferente:
    Bono = (Salario original X (años en la empresa / 500))

A continuación crea un formulario para calcular el salario del empleado, donde se pedira el nombre, apellido, 
años en la empresa, salario original y si es un empleado normal, un jefe o un becario.

Luego, usando objetos, muestra por pantalla su nombre, puesto y salario final. Puedes realizar tantas paginas php como necesites.

*/
// ejercicio4.php