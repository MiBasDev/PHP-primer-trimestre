<body style="background-color:rgba(125, 125, 155);">
    <?php
    /*
      FILTROS

      Los filtros facilitan la comprobación de la entra de usuario. Permiten verificar que
      los datos están en el formato correcto (validate) y eliminar cualquier carácter ilegal
      de los mismos (sanitize)

      filter_var(): permite validar y sanear los datos. Un parámetro es la variable a
      comprobar y otro el filtro que se va a usar.
     */
    ?>

    <h1>Ejercicios "Filtros"</h1>


    <h3>1. Filtro simple</h3>

    <?php
    /*
      Teniendo en cuenta este ejemplo

      $cadena ="<h1><i>Holaaaa</i></h1>";
      $cadena= filter_var($cadena, FILTER_SANITIZE_STRING);
      echo $cadena;
      $entero = 0;
      if (filter_var($entero, FILTER_VALIDATE_INT) === 0 ||
      filter_var($entero, FILTER_VALIDATE_INT)) {
      echo "<br />" . "Entero validado!";
      } else {
      echo "<br />" . "Entero NO validado!";
      }

      Crea un filtro que compruebe si una dirección IP es valida o no, teniendo en cuenta que una dirección IP
      va a tener este formato: $IP = "127.0.0.1"
     */

    $IP = "127.0.0.1";
    echo filter_var($IP, FILTER_VALIDATE_IP) ? "IP " . $IP . " VÁLIDA" : "IP " . $IP . " NO VÁLIDA";
    ?>


    <h3>2. Filtrar ficheros</h3>

    <?php
    /*
      Si tengo un fichero con datos, puedo intentar comprobar si hay datos incorrectos.

      En  este ejercicio se presenta el fichero "correos.txt". Comprueba con un filtro si los correos son validos.
      Si un correo no es valido, muestralo por pantalla. al final, señala la cantidad de correos no validos.
     */

    $fileToOpen = fopen("correos.txt", "r");
    $countIncorrectEmails = 0;
    while (!feof($fileToOpen)) {
        $mail = filter_var(fgets($fileToOpen), FILTER_SANITIZE_EMAIL);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            echo $mail . "</br>";
            $countIncorrectEmails++;
        }
    }
    echo "- El número de correos incorrecto es: " . $countIncorrectEmails;
    fclose($fileToOpen);
    ?>


    <h3>3. Filtro avanzado</h3>

    <?php
    /*
      Los filtros tienen opciones para comprobar si un entero está comprendido en un determinado rango de números.
      Investiga como "FILTER_VALIDATE_INT" presenta un "array de opciones" que puede guardar el rango minimo y el
      rango maximo y comprobar si el variable está dentro o fuera del rango. Compruebalo con un ejemplo.
     */

    $intAComprobar = 10;
    echo filter_var($intAComprobar, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 20))) ?
            "Está comprendido en el rango dado." : "NO está comprendido en el rango dado.";
    ?>


    <h3>4. Filtros especiales </h3>

    <?php
    /*
      filter_var() puede tener tres variables, en la última de esas variables puedes recoger opciones para filtrar
      caracteres especiales, como, por ejemplo la "ñ". Crea un filtro en el que eliminemos las eñes de una cadena de caracteres
      y realiza un echo de la cadena de caracteres nueva.
     */

    $caracteresAComprobar = "Nos vamos a españa de viaje.";
    echo filter_var($caracteresAComprobar, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
    ?>


    <h3>5. Filtros para IPv6 </h3>

    <?php
    /*
      IPv6 es un nueva protocolo para filtrar IPs. Teniendo presente el archivo "DireccionesIPv6.txt", comprueba, igual que
      en el ejercicio 2, si los datos de cada fila son validos.
     */

    $fileToOpenIPv6 = fopen("DireccionesIPv6.txt", "r");
    echo "- Las siguientes IPs <b>NO</b> son válidas. </br>";
    while (!feof($fileToOpenIPv6)) {
        if (!filter_var(fgets($fileToOpenIPv6), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            echo(fgets($fileToOpenIPv6) . "</br>");
        }
    }
    fclose($fileToOpenIPv6);
    ?>


    <h3>6. Filtros con formulario </h3>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
        <fieldset>
            <legend><b>Validación de emails</b></legend>
            <label for="url">Escribe una URL: </label>
            <input type="text" name="url" id="url" placeholder="Escribe aquí"> </br>
            <input type="submit" name="submit" id="submit" value="Enviar URL">
            <?php
            /*
              Modifica el ejercicio 1 para enviar por formulario una URL y comprobar con un filtro si esa URL es valida o no.
              Ten en cuenta que filter_var() tiene opciones para filtrar URLs llamadas FILTER_VALIDATE_URL y FILTER_SANITIZE_URL
             */
            if (isset($_GET["submit"])) {
                // Almacenamos la ip dada
                $url = $_GET['url'];
                // Creamos un nuevo fichero y le introducimos la letra de la canción.
                if (filter_var($url, FILTER_VALIDATE_URL)) {
                    echo "--> <b>" . $url . " es una URL válida.</b>";
                } else {
                    echo "--> <b>URL incorrecta, te la hemos corregido: " . filter_var($url, FILTER_SANITIZE_URL) . ".</b>";
                }
            }
            ?>
        </fieldset>
    </form>
</body>