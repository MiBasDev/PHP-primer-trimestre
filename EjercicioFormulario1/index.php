<!DOCTYPE HTML>
<html>
    <head>
        <title>Formulario mayor de edad</title>
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
                padding-top: 15%;
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
                width: 92%;
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
        <form action="formresult1.php" method="GET" class="form">
            <fieldset>
                <legend><b>Formulario mayor de edad</b></legend>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe aquí tu nombre"> <br>

                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad" placeholder="Escribe aquí tu edad" min="0"><br>

                <input type="submit" name="submit" id="submit" value="Validar edad">
            </fieldset>
        </form>
    </body>
</html>

<?php
