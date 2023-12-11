<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar</title>
        <style>
            body {
                background-color: rgb(125, 125, 125);
            }

            form {
                width: 100%;
                max-width: 1000px;
                margin: 0 auto;
                padding: 9%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            form input {
                width: 90%;
                height: 30px;
                margin: 0.5rem;
            }

            fieldset {
                width: 600px;
            }

            button {
                padding: 0.5em;
                margin-left: 7px;
                width: 540px;
                border: 1px solid black;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
                border-radius: 5px;
            }

            a{
                text-decoration: none;
                color: black;
                padding: 0.5em;
                margin-left: 15px;
                border: 1px solid black;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
            <fieldset>
                <legend>Modificación de datos</legend>

                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
                </br>

                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad">
                </br>

                <label for="curso">Curso: </label>
                <input type="text" name="curso" id="curso">
                </br>

                <label for="peliculaFavorita">Película favorita: </label>
                <input type="text" name="peliculaFavorita" id="peliculaFavorita">
                </br>
                <input type="submit" name="submit" id="submit" value="Guardar nuevos datos">
                <br/><br />

                <a href="inicio.php">Volver al inicio</a><br/><br />
                <?php
                //Completa las variables de inicio de sesion:
                if (isset($_GET["submit"])) {
                    session_start();
                    $_SESSION["nombre"] = $_GET["nombre"];
                    $_SESSION["edad"] = $_GET["edad"];
                    $_SESSION["curso"] = $_GET["curso"];
                    $_SESSION["peliculaFavorita"] = $_GET["peliculaFavorita"];

                    echo "Variables de sesión, modificadas!<br />";
                }
                /* Realiza las cuatro paginas PHP de manejo de sesiones sabíendo que 
                  -Para mostrar variables, basta con señalar el array $_SESSION donde se encuentran
                  -Para modificar una sesión solo hace falta cambiar los valores del array.
                  -Para borrar las variables basta con usar session_unset();
                  -Para destruir la sesión, se usa desson_destoy();

                  En las paginas crear Links con la etiqueta <a> para poder comprobar las modificaciones, borrados y destrucciones.
                 */
                ?>
            </fieldset>
        </form>

    </body>
</html>
