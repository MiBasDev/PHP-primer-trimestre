<?php /*
  Ejercicio 2 - Creación de listas ----- 2'5 puntos

  Lee el fichero "peliculas.json" y crea una tabla mostrando por pantalla la pelicula,
  su fecha y su nota, a continuación guarda en un fichero nuevo la nota media de
  todas las peliculas, señalando dentro del fichero tambien el nombre de todas las peliculas, pero
  no muestres su fecha de creación. A ese fichero llamalo "NotaMedia".

 */ ?>
<!DOCTYPE html>
<body style="background-color:rgba(125, 125, 155);">
    <h1>Ejercicio 2</h1>
    <table align="center" border="2px">
        <caption style="font-size: 25px"><b>Películas <i>JSON</i></b></caption>
        <tr>
            <td style="font-weight: bold;">Nombre</td>
            <td style="font-weight: bold;">Año</td>
            <td style="font-weight: bold;">Nota</td>
        </tr>
        <?php
        // Abrimos y leemos el JSON.
        $jsonArch = "peliculas.json";
        $jsonContent = file_get_contents($jsonArch);
        $jsonArchDecoded = json_decode($jsonContent, true);

        // Variables para el texto, nota media y contador de películas.
        $textToWrite = "";
        $notaMedia = 0;
        $counterFilms = 0;
        foreach ($jsonArchDecoded as $film) {
            foreach ($film as $atributes) {
                echo "<tr>";
                foreach ($atributes as $key => $innerValue) {
                    echo "<td>" . $innerValue . "</td>";
                    if ($key == "nombre") {
                        $textToWrite .= $innerValue . " ";
                    }
                    if ($key == "Nota") {
                        $notaMedia += intval($innerValue);
                    }
                }
                echo "</tr>";
                $textToWrite .= "|| ";
                $counterFilms++;
            }
        }
        // Agregamos la nota media al texto que vamos a ecribir en el fichero.
        $textToWrite .= "Nota media: " . ($notaMedia / $counterFilms);

        // Creamos el fichero y lo escribimos.
        $fileToCreate = "NotaMedia.txt";
        $fileToRead = fopen($fileToCreate, "w");
        fwrite($fileToRead, $textToWrite);
        fclose($fileToRead);
        ?>
    </table>
</body>

