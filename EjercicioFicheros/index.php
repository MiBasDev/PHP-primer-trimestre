<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Ficheros</title>
        <style>
            @keyframes anim{
                0% {
                    background-color: #8c9489;
                } /*Rosa pálido*/
                20% {
                    background-color: #767e74;
                } /*Marrón-naranja*/
                40% {
                    background-color: #61685e;
                } /*Gris*/
                60% {
                    background-color: #4b5249;
                } /*Morado*/
                80% {
                    background-color: #61685e;
                } /*Verde*/
                100% {
                    background-color: #8c9489;
                } /*Rosa pálido*/
            }
            body {
                animation-name: anim;
                animation-duration: 8s;
                animation-iteration-count: infinite;
            }
            .form {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .form input {
                width: 90%;
                height: 30px;
                margin: 0.5rem;
            }

            #submit {
                padding: 0.5em 1em;
                width: 96%;
                border: none;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
            }
            fieldset{
                width: 300px;
            }
        </style>
    </head>
    <body>
        <h1>1. Abrir, leer, escribir y cerrar un archivo</h1>

        <h3>1. Abrir un archivo</h3>

        <?php
        /*
          Los archivos en PHP se abren con la función fopen(), que requiere dos parámetros: el archivo que se quiere abrir y el modo en el que abrir el archivo

          $fp = fopen("miarchivo.txt", "r");

          Los modos de acceso existentes para fopen son:

          Modo	  Descripción
          r	      Apertura para lectura. Puntero al principio del archivo
          r+	    Apertura para lectura y escritura. Puntero al principio del archivo
          w	      Apertura para escritura. Puntero al principio del archivo y lo sobreescribe. Si no existe se intenta crear.
          w+	    Apertura para lectura y escritura. Puntero al principio del archivo y lo sobreescribe. Si no existe se intenta crear.
          a	      Apertura para escritura. Puntero al final del archivo. Si no existe se intenta crear.
          a+	    Apertura para lectura y escritura. Puntero al final del archivo. Si no existe se intenta crear.
          x	      Creación y apertura para sólo escritura. Puntero al principio del archivo. Si el archivo ya existe dará error E_WARNING. Si no existe se intenta crear.
          x+	    Creación y apertura para lectura y escritura. Mismo comportamiento que x.
          c	      Apertura para escritura. Si no existe se crea. Si existe no se sobreescribe ni da ningún error. Puntero al principio del archivo.
          c+	    Apertura para lectura y escritura. Mismo comportamiento que C.
         */

        // Crea un archivo "miarchivo.txt" en el que escribas 3 lineas cualesquiera.
        //$Archivoabierto = fopen("miarchivo.txt", "r");
        //Si no es posible abrir el archivo, devuelve cero, por eso es frecuente utilizar esta función en una condición:
        /*
          if (!$Archivoabierto = fopen("miarchivo.txt", "r")){
          echo "No se ha podido abrir el archivo";
          }
         */

        //Añade la nueva condición y comprueba que funciona.
        //Intentamos abrir el archivo y controlamos que se abra o no.
        $openedFile = fopen("miarchivo.txt", "r");
        if (!$openedFile = fopen("miarchivo.txt", "r")) {
            echo "No se ha podido abrir el archivo.";
        } else {
            echo "El fichero se ha abierto con éxito.";
        }
        ?>


        <h3>2. Leer un archivo</h3>

        <?php
        /*
          Ahora que sabemos abrir archivos, vamos a leerlo por pantalla, para eso si usa la función:
          $contenido = fread($NombreDelArchivoGuardadoComoVariable, filesize(miarchivo.txt));

          La variable $contenido guardará el contenido que obtengamos con la función fread(). Esta función requiere dos parámetros,
          el archivo abierto y la longitud que queremos leer de dicho archivo (en bytes). En este caso hemos empleado la función
          filesize() para obtener el tamaño del archivo y así devolver todo su contenido.

          Leer el archivo que has creado, mostrandolo por pantalla.

          Es una buena práctica cerrar los archivos una vez que has terminado de trabajar en ellos. Se cierra con la sintaxis "Fclose"

          fclose($archivo);

          Cierra el ejercicio con fclose.

          Ahora prueba a realizar la lectura con readfile();
         */

        //Abrimos con fopen() y leemos con fread()
        $fileToRead = fopen("miarchivo.txt", "r");
        $content = fread($fileToRead, filesize("miarchivo.txt"));
        fclose($fileToRead);
        echo $content . "<br>";

        // Probamos a leer con readfile()
        readfile("miarchivo.txt");
        ?>


        <h3>3. Limitar la longitud de datos que queremos escribir</h3>

        <?php
        /*
          Podemos limitar la longitud de datos que queremos escribir (todos los datos que había en el archivo se borrarán por completo igualmente):

          $file = "miarchivo.txt";
          $texto = "Hola que tal";
          $fp = fopen($file, "w"); //Esta vez hemos empleado el modo w, que permite escribir sobreescribiendo el archivo.
          fwrite($fp, $texto, 4); // Escribirá sólo: Hola

          Si el archivo miarchivo.txt no existe, se creará automáticamente con el modo w de la función fopen.

          Crea un archivo nuevo llamado "rosas.txt" en el que añadas el texto "Por eso esperaba con la carita empapada, a que llegaras con rosas, con mil rosas para mí,
          porque ya sabes que me encantan esas cosas, que no importa si es muy tonto, soy así. ". Luego, muestra unicamente la primera frase.
         */

        //Creamos y escribimos el archivo.
        $fileToCreate = "rosas.txt";
        $textToWrite = "Por eso esperaba con la carita empapada, a que llegaras con rosas, con mil rosas para mí,
          porque ya sabes que me encantan esas cosas, que no importa si es muy tonto, soy así.";
        $fileOpened1 = fopen($fileToCreate, "w");
        fwrite($fileOpened1, $textToWrite);
        fclose($fileOpened1);

        // Abrimos el fichero y lo leemos.
        $fileOpened2 = fopen($fileToCreate, "r");
        echo fread($fileOpened2, 40);
        fclose($fileOpened2);
        ?>


        <h3>4. Leer una sola linea</h3>

        <?php
        /*
          Tambien podemos leer una unica linea con la función "fgets($MiArchivo);
          Realiza el ejercicio anterior usando esta función



          Con la función feof($myfile) podemos ver si alcanzamos el final del archivo, de esta manera lo podemos usar para recorer archivos si no sabemos
          cual es su final. ¿Cómo se podría implementar con un while?
         */

        // Abrimos el archivo y lo leemos con fgets().
        $fileOpened3 = fopen("miarchivo.txt", "r");
        echo fgets($fileOpened3) . "</br>";
        fclose($fileOpened3);

        // Abrimos el archivo y leemos todas las líneas con un while y fgets().
        $fileOpened4 = fopen("miarchivo.txt", "r");
        while (!feof($fileOpened4)) {
            echo fgets($fileOpened4);
        }
        fclose($fileOpened4);
        ?>


        <h3>5. Escribir</h3>

        <?php
        /*
          Para escribir en un fichero se usa la función

          fwrite(Nombre del archivo, texto a introducir);


          Pruebalo creando un archivo nuevo y añadiendo este texto guardado en una variable:
          $txt = "Sherk\n El padrino\n Star Wars\n Batman\n";

          No olvides cerrar el documento al terminar.

          ¿Puedo escribir nuevas lineas?, depende de los parametros a la hora de abrir el documento, estos se van a sobreescribir, a escribir delante de todo, o al final de todo.

          Escribe en el documento "rosas.txt" la siguiente parte de la canción.

          $Parte2 = "Y aún me parece mentira que se escape mi vida imaginando que vuelves a pasarte por aquí, donde los viernes cada tarde, como siempre, la esperanza dice: "Quieta, hoy quizá sí. ";

          A continuación, muestralo por pantalla.

         */

        // Creamos un nuevo fichero y le introducimos las películas.
        $fileToCreate2 = "nuevoarchivo.txt";
        $textToWrite2 = "Sherk\n El padrino\n Star Wars\n Batman\n";
        $fileToOpen = fopen($fileToCreate2, "w");
        fwrite($fileToOpen, $textToWrite2);
        fclose($fileToOpen);

        // Abrimos y gregamos el texto al archivo rosas.txt con el parámetro "a".
        $textToWrite3 = " Y aún me parece mentira que se escape mi vida imaginando que vuelves a pasarte por aquí, "
                . "donde los viernes cada tarde, como siempre, la esperanza dice: 'Quieta, hoy quizá sí.' ";
        $fileToOpen2 = fopen("rosas.txt", "a");
        fwrite($fileToOpen2, $textToWrite3);
        fclose($fileToOpen2);
        // Abrimos y leemos el nuevo archivo rosas.txt
        $fileToOpen3 = fopen("rosas.txt", "r");
        while (!feof($fileToOpen3)) {
            echo fgets($fileToOpen3);
        }
        fclose($fileToOpen3);
        ?>


        <h3>6. Formularios para escribir en ficheros</h3>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
            <fieldset>
                <legend>
                    Escribe una canción
                </legend>
                <textarea rows="10" cols="80" placeholder="Escriba aquí tu canción" name="song" id="song"></textarea>
                <input type="submit" name="submit" id="submit" value="Crear fichero">
            </fieldset>
        </form>

        <?php
        /*
          Usa todos tus conocimientos que has aprendido para guardar con un formulario un texto y luego crear y escribir un nuevo documento
          donde guardar ese texto.
         */

        // Si presionan el submit hacemos lo siguiente.
        if (isset($_GET["submit"])) {
            // Almacenamos el texto del textarea
            $song = $_GET['song'];
            $fileToCreateSong = "cancion.txt";

            // Creamos un nuevo fichero y le introducimos la letra de la canción.
            $fileToOpenSong = fopen($fileToCreateSong, "w");
            fwrite($fileToOpenSong, $song);
            fclose($fileToOpenSong);
        }
        ?>
    </body>
</html>