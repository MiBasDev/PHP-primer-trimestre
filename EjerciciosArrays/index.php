<body style="background-color:rgba(125, 125, 155);">
    <?php
    /**
     * @author Miguel Bastos Gándara.
     */
    /*
      ARRAYS

      Ya hemos trabajado en clase con arrays, a si que no son nada nuevo, pero vamos a darles un repaso.

      Para crear un array, solo tenemos que indicarlo en nuestra variable:
      $Peliculas = array("Sherk", "El padrino", "Batman");

      También puedes crear arrays vacios:
      %series;

     */
    ?>


    <h1>Ejercicios "Arrays"</h1>

    <h3>1. Array Indexados</h3>

    <?php
    /*
      Indexados: se usa un índice numérico para acceder o crear a los elementos del array.
      Ejemplo:

      $Peliculas[4] = "La extraña pareja";



      Un metodo para convertir arrays en texto y textos en arrays son las funciones join() y exlode(). Investiga sobre ellas y
      usa el ejemplo $IngredientesPizza para convertir el texto en un array, luego convierte el array $Peliculas a texto
      .
      $IngredientesPizza = "Jamon queso peperonni champiñoches aceitunas atun panceta"

     */

    $IngredientesPizza = "Jamon queso peperonni champiñoches aceitunas atun panceta";
    // Usamos el var_dump() para sacar por pantalla el array por pantalla, 
    // usando el explode() para crearlo a partir del string.
    echo "<p>";
    var_dump(explode(" ", $IngredientesPizza));
    echo "</p>";

    // Sacamos por pantalla el array usando el join() para pasarlo a un string.
    $Peliculas = array("Sherk", "El padrino", "Batman");
    echo join(", ", $Peliculas) . "</br>";
    ?>



    <h3>2. Array asociativos</h3>

    <?php
    /*
      Los arrays asociativos son arrays donde puedes asignar nombres a las claves del array, ejemplo:

      $Peliculas = array("Sherk"=>"2001","El padrino"=>"1972","Batman"=>"1981");

      echo "El padrino se estrenó en " . $Peliculas['El padrino'] . ".";


      El metodo "foreach" presenta ahora una nueva variable, ya que hay que guardar tanto la llave como el valor asociado a la llave.
      Crea un array asociativo con por lo menos 4 valores y haz que se muestren esos valores con un foreach.

     */
    // Creamos un array asociativo de meses.
    $Meses = array("Enero" => "1", "Feberero" => "2", "Marzo" => "3", "Abril" => "4",
        "Mayo" => "5", "Junio" => "6", "Julio" => "7", "Agosto" => "8", "Septiembre" => "9",
        "Octubre" => "10", "Noviembre" => "11", "Diciembre" => "12");

    // Sacamos por pantalla el número del mes con su respectivo nombre.
    foreach ($Meses as $key => $value) {
        echo "El mes número " . $value . " se llama " . $key . ".</br>";
    }
    ?>

    <h3>3. Array multidimensionales</h3>

    <?php
    /*

      ¿Se puede crear un array de array?, Correcto.
      Vamos a ejemplirizarlo:

      $Peliculas = array(
      array("Sherk",2001,7.7),
      array("El padrino",1972,9.0),
      array("Batman",1981,6.8)
      );

      echo $Peliculas[0][0].": del año: ".$Peliculas[0][1].", con una nota de: ".$Peliculas[0][2].".<br>";
      echo $Peliculas[1][0].": del año: ".$Peliculas[1][1].", con una nota de:  ".$Peliculas[1][2].".<br>";
      echo $Peliculas[2][0].": del año: ".$Peliculas[2][1].", con una nota de:  ".$Peliculas[2][2].".<br>";



      Este ejemplo tiene 3 lineas de echo iguales donde solo cambia las variables.
      ¿Se pueden usar 1 o varios for/foreach para no tener que repetir tanto los echo's?
      Si la respuesta es afirmativa, resuelvelo.

     */

    // Sí se puede
    $PeliculasMultidimensionales = array(
        array("Sherk", 2001, 7.7),
        array("El padrino", 1972, 9.0),
        array("Batman", 1981, 6.8)
    );

    /*
      // Sacamos los valores por pantalla concatenando con la info.
      foreach ($PeliculasMult as $value) {
      $film = "";
      for ($i = 0; $i < count($value); $i++) {
      if ($i == 0) {
      $film .= $value[$i] . " -> del año ";
      } else if ($i == 1) {
      $film .= $value[$i] . ": con una nota de, ";
      } else {
      $film .= $value[$i] . ".</br>";
      }
      }
      echo $film;
      }
     */
    /*
      //Sacamos todo por pantalla poniendo los indicadores del array.
      foreach ($PeliculasMult as $value) {
      echo $value[0] . " -> del año " . $value[1] . ": con una nota de, " . $value[2] . ".</br>";
      }
     */

    // Array de strings para concatenar.
    $stringsParaConcatenar = array(" -> del año ", ", con una nota de: ", ".</br>");

    // Sacamos los valores por pantalla concatenándolo con el de strings.
    foreach ($PeliculasMultidimensionales as $value) {
        $film = "";
        for ($i = 0; $i < count($value); $i++) {
            $film .= $value[$i] . $stringsParaConcatenar[$i];
        }
        echo $film;
    }
    ?>


    <h3>4. Funciones asociadas a los arrays </h3>

    <?php
    /*

      PHP presenta funciones internas para poder realizar acciones:

      count() 	-	Retorna la longitud del array.
      sort() 	- 	Ordena el array en forma ascendente.
      rsort() 	- 	Ordena el array en forma descendente.
      asort() 	- 	Ordena el array en forma ascendente, acorde a su valor.
      ksort() 	- 	Ordena el array en forma ascendente, acorde a su llave.
      arsort()	- 	Ordena el array en forma descendente, acorde a su valor.
      krsort()	- 	Ordena el array en forma descendente, acorde a su llave.


      4.1  ¿La función sort() y rsort() puede ordenar arrays que no sean de Integers? Pruebalo creando un array de strings
      e intenta ordenarla en orden alfabetico ascendente y descendente.

      4.2 En los comentarios se ha presentado un array multidimensional de peliculas, me gustaria verlas ordenadas
      por nota. (crear array asociativo cuyo valor sea integer)

      4.3 Partiendo del ejercicio anterior, ¿cual es el ranking de la peor a la mejor?

     */

    // 4.1 Sí puede:
    // Declaramos array de strings a ordenar.
    $arrayStringsParaOrdenar = array("a", "c", "e", "d", "b", "f", "g");

    // Orden ascendente.
    sort($arrayStringsParaOrdenar);
    echo "<p>";
    foreach ($arrayStringsParaOrdenar as $key => $value) {
        echo $key . ". " . $value . ", ";
    }
    echo "</p>";

    // Orden descendente.
    rsort($arrayStringsParaOrdenar);
    echo "<p>";
    foreach ($arrayStringsParaOrdenar as $key => $value) {
        echo $key . ". " . $value . ", ";
    }
    echo "</p>";

    // 4.2 
    // Declaramos array de meses con su número de meses para ordenarlo.
    $mesesOrdenar = array("Feberero" => "2", "Marzo" => "3", "Diciembre" => "12", "Abril" => "4",
        "Mayo" => "5", "Enero" => "1", "Julio" => "7", "Agosto" => "8", "Septiembre" => "9",
        "Octubre" => "10", "Noviembre" => "11", "Junio" => "6");

    // Asort() ordena en función del valor de manera ascendente.
    asort($mesesOrdenar);
    echo "<p>";
    foreach ($mesesOrdenar as $key => $value) {
        echo $value . ". " . $key . ", ";
    }
    echo "</p>";

    // Arsort() ordena en función del valor de manera descendente.
    arsort($mesesOrdenar);
    echo "<p>";
    foreach ($mesesOrdenar as $key => $value) {
        echo $value . ". " . $key . ", ";
    }
    echo "</p>";

    // 4.3
    // Nuevo array de juegos favoritos.
    $juegosFavs = array("Lol" => "4", "Genshin Impact" => "5", "Fortnite" => "2",
        "MineCraft" => "3", "WOW" => "1");
    asort($juegosFavs);
    echo "<p>";
    echo "Ranking juegos favoritos:";
    foreach ($juegosFavs as $key => $value) {
        echo "</br>" . $value . ". " . $key;
    }
    echo "</p>";
    ?>

</body>