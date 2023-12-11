<!DOCTYPE HTML>
<html>
    <head>
        <title>Formulario tipo de usuario</title>
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
            }

            fieldset{
                width: 300px;
            }

            ul{
                list-style: none;
            }

            li{
                margin-bottom: 10px;
            }

            input[type="radio"] + label:before {
                content: "";
                width: 15px;
                height: 15px;
                float: left;
                margin: 0 11px 0 0;
                border: 2px solid #ccc;
                background: #fff;
                border-radius: 100%;
            }
            input[type="radio"]:checked + label:after {
                content: "";
                width: 0;
                height: 0;
                border: 6px solid #ce495c;
                float: left;
                margin-left: -1.6em;
                margin-top: 0.25em;
                border-radius: 100%;
            }

            input[type="radio"] {
                display: none;
            }
            #submit {
                padding: 0.5em 1em;
                width: 250px;
                border-radius: 2px;
                border: white 1px solid;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
            }
        </style>
    </head>
    <body>
        <form action="formresult2.php" method="POST" class="form">
            <fieldset>
                <legend><b>Identificación</b></legend>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe aquí tu nombre"> 
            </fieldset>
            <fieldset>
                <legend><b>Tipo de usuario</b></legend>
                <ul>
                    <li>
                        <input type="radio" name="usuario" id="estudiante" class="radio" value="Estudiante">
                        <label for="estudiante">Estudiante</label>
                    </li>
                    <li>
                        <input type="radio" name="usuario" id="profesor" class="radio" value="Profesor">
                        <label for="profesor">Profesor</label>
                    </li>
                    <li>
                        <input type="radio" name="usuario" id="administrador" class="radio" value="Administrador">
                        <label for="administrador">Administrador</label>
                    </li>
                </ul>
            </fieldset>
            <input type="submit" name="submit" id="submit" value="Validar usuario">
        </form>
    </body>
</html>

<?php
