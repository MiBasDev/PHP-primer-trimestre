<!DOCTYPE HTML>
<html>
    <head>
        <title>Juego del número secreto</title>
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
                padding-top: 13%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .form input {
                width: 90%;
                height: 30px;
                margin: 0.5rem;
                text-align: center;
            }

            fieldset{
                width: 400px;
            }

            #submit {
                padding: 0.5em 1em;
                width: 91%;
                border-radius: 2px;
                border: white 1px solid;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
            }
        </style>
    </head>
    <body>
        <form action="salario.php" method="POST" class="form">
            <fieldset>
                <legend><b>Datos de la persona</b></legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe aquí el nombre">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" placeholder="Escribe aquí los apallidos">
                <label for="salario">Salario:</label>
                <input type="number" name="salario" id="salario" placeholder="Escribe aquí el salario">
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" placeholder="Escribe aquí la edad">
                <input type="submit" name="submit" id="submit" value="Aceptar número">
            </fieldset>
        </form>
    </body>
</html>
