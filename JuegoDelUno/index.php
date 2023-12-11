<!DOCTYPE HTML>
<html>
    <head>
        <title>Juego del UNO</title>
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
                width: 300px;
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
        <form action="nombresJugadores.php" method="POST" class="form">
            <fieldset>
                <legend><b>Número de jugadores</b></legend>
                <label for="numberPlayers">Jugadores: </label>
                <input type="text" name="numberPlayers" id="numberPlayers" placeholder="Escribe aquí el número de jugadores"> 
            </fieldset>
            <input type="submit" name="submit" id="submit" value="Aceptar número">
        </form>
    </body>
</html>

<?php
