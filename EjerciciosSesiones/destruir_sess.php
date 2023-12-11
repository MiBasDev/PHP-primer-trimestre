<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Destruir</title>
        <style>
            body {
                background-color: rgb(125, 125, 125);
            }

            form {
                width: 100%;
                max-width: 1000px;
                margin: 0 auto;
                padding: 13%;
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

            #submit{
                padding: 0.5em;
                margin-left: 7px;
                width: 350px;
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
                margin-left: 7px;
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
                <legend>Cerrado se sesión</legend>

                <p>¿Estás seguro de que deseas cerrar la sesión?</p>
                <input type="submit" name="submit" id="submit" value="Cerrar sesión">

                <a href="index.php">VOLVER AL INICIO</a>
                <?php
                //Completa las variables de inicio de sesion:
                if (isset($_GET["submit"])) {
                    session_start();
                    session_destroy();
                    echo "Sesión cerrada con éxito.";
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
