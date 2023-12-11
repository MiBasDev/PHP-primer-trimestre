<body style="background-color:rgba(205, 205, 235);">

    <h1>Ejercicios JSON</h1>


    <h3>1. Comprobación de la codificación JSON</h3>

    <?php
    /*
      Presentando este array peliculas:
      $peliculas = array("Sherk" => 8, "El Padrino" => 9, "El rey Leon" => 7);

      Codifica el array para que se trasformen en datos JSON usando json_encode();
      Luego, muestra el resultado obtenido.

     */
    // Declaramos e inicializamos el array de películas.
    $peliculas = array("Shrek" => 8, "El Padrino" => 9, "El Rey Leon" => 7);

    // Codificamos el array en json.
    $peliculas_json = json_encode($peliculas);

    // Sacamos por pantalla el array ya codificado.
    echo $peliculas_json;
    ?>


    <h3>2. Comprobación de la codificación como objeto</h3>

    <?php
    /* JSON convierte con json_decode() un objeto. Compruebalo con la función var_dump() 
      con el array de las peliculas del ejercicio anterior.

      JSON puede devolver con el json_decode() un array asociado. Investiga como es esto posible y
      muestralo por pantalla
     */
    // Mostramos por pantalla el array sin decodificar.
    var_dump($peliculas_json);

    echo "</br>";

    // Decodificamos y mostramos por pantalla el array.
    var_dump(json_decode($peliculas_json));
    ?>


    <h3>3. Buble para mostrar objetos en JSON</h3>

    <?php
    /*
      Muestra con un foreach los parametros de tu variable JSON con las peliculas
      y muestra cada una de ellas diciendo la nota que tienen.
      Hazlo de dos formas, con un objeto y con un array asociativo.
     */
    echo "Siendo un objeto: </br>";
    // Sacamos por pantalla las películas con su notas siendo estas objetos.
    foreach (json_decode($peliculas_json) as $key => $value) {
        echo "- " . $key . " => " . $value . "</br>";
    }

    echo "</br>Siendo un array asociativo: </br>";
    // Sacamos por pantalla las películas con su notas siendo estas un array 
    // asociativo.
    foreach (json_decode($peliculas_json, true) as $key => $value) {
        echo "- " . $key . " => " . $value . "</br>";
    }
    ?>


    <h3>4. Lectura archivo JSON</h3>

    <?php
    $jsonArch = "peliculas.json";
    $jsonContent = file_get_contents($jsonArch);
    $jsonArchDecoded = json_decode($jsonContent, true);
    //echo get_object_vars($jsonArchDecoded);

    foreach ($jsonArchDecoded as $value) {
        foreach ($value as $key => $content) {
            if (is_array($content)) {
                echo "* " . $key . ": </br>";
                foreach ($content as $innerContent) {
                    foreach ($innerContent as $innerKey => $innerContent) {
                        echo "<tab>" . "+ " . $innerKey . " : " . $innerContent . "</br>";
                    }
                }
            } else {
                echo "- " . $key . " => " . $content . "</br>";
            }
        }
        echo "</br>";
    }
    ?>
</body>