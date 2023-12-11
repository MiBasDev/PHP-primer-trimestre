<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                background-color: rgb(125, 125, 125);
            }

            form {
                width: 100%;
                max-width: 1000px;
                margin: 0 auto;
                padding: 10%;
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
        </style>
    </head>
    <body>
        <form action="inicio.php" method="GET" class="form">
            <fieldset>
                <legend>Login (creación de variables)</legend>

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
                <input type="submit" name="submit" id="submit" value="Guardar datos">
            </fieldset>
        </form>
    </body>
</html>
