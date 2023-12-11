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

            input[type="checkbox"] + label:before {
                content: "";
                width: 26px;
                height: 26px;
                float: left;
                margin: 0.5em 0.5em 0 0;
                border: 2px solid #ccc;
                background: #fff;
            }
            input[type="checkbox"]:checked + label:before {
                border-color: #248727;
            }
            input[type="checkbox"]:checked + label:after {
                content: "";
                width: 12px;
                height: 6px;
                border: 4px solid #248727;
                float: left;
                margin-left: -1.95em;
                border-right: 0;
                border-top: 0;
                margin-top: 1em;
                transform: rotate(-55deg);
            }
            input[type="checkbox"] {
                display: none;
            }
            input[type="checkbox"] + label {
                font-weight: bold;
                line-height: 3em;
                color: #ccc;
                cursor: pointer;
            }
            input[type="checkbox"]:checked + label {
                font-style: italic;
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
        <form action="formresult3.php" method="POST" class="form">
            <fieldset>
                <legend><b>Identificación</b></legend>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe aquí tu nombre"> 
            </fieldset>
            <fieldset>
                <legend><b>Deportes que practica</b></legend>
                <ul>
                    <li>
                        <input type="checkbox" name="baloncesto" id="baloncesto" class="deportes" value="Baloncesto">
                        <label for="baloncesto">Baloncesto</label>
                    </li>
                    <li>
                        <input type="checkbox" name="futbol" id="futbol" class="deportes" value="Futbol">
                        <label for="futbol">Fútbol</label>
                    </li>
                    <li>
                        <input type="checkbox" name="tenis" id="tenis" class="deportes" value="Tenis">
                        <label for="tenis">Tenis</label>
                    </li>
                </ul>
            </fieldset>
            <input type="submit" name="submit" id="submit" value="Enviar datos">
        </form>
    </body>
</html>

<?php
