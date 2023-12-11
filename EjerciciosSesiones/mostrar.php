<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mostrar</title>
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
        <form>
            <fieldset>
                <legend>Mostrado de datos</legend>
                <?php
                session_start();
                if (isset($_SESSION["nombre"])) {
                    echo "**** <b>Sesión de iniciada</b> **** " . "</br>";
                    echo "- Tu nombre es: " . $_SESSION["nombre"] . "</br>";
                    echo "- Tu edad es: " . $_SESSION["edad"] . "</br>";
                    echo "- Estás en el curso: " . $_SESSION["curso"] . "</br>";
                    echo "- Tu película favorita es: " . $_SESSION["peliculaFavorita"];
                } else {
                    echo "**** <b>No existen variables de sesión</b> ****" . "</br>";
                }
                ?>
                <p><a href="inicio.php">Volver al inicio</a><br/></p>
            </fieldset>
        </form>
    </body>
</html>

<?php


