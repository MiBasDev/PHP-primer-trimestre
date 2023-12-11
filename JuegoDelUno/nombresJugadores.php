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

            fieldset {
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

            a {
                padding: 0.5em 1em;
                margin-top: 5px;
                width: 250px;
                border-radius: 2px;
                border: white 1px solid;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
                text-align: center;
                text-decoration: none;
                color: black;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <form action="mainJugar.php" method="GET" class="form">
            <fieldset>
                <?php
                $numberOfPlayers = $_POST["numberPlayers"];
                if ($numberOfPlayers <= 1) {
                    echo '<legend><b>ERROR</b></legend>';
                    echo '<input type="text" placeholder="Tiene que haber mínimo 2 jugadores" disabled>';
                } else {
                    echo '<legend><b>Nombre de los jugadores</b></legend>';
                    for ($i = 1; $i <= $numberOfPlayers; $i++) {
                        echo '<label for="player' . $i . '">Jugador ' . $i . ': </label>';
                        echo '<input type="text" name="player' . $i . '" id="player' . $i . '" placeholder="Escribe aquí">';
                    }
                }
                ?>
            </fieldset>
            <?php
            if ($numberOfPlayers <= 1) {
                echo '<a href="index.php">Volver al inicio</a>';
            } else {
                echo '<input type="submit" name="submit" id="submit" value="Empezar a jugar">';
            }

            // iniciamos la sesión y creamos una variable para controlar los 
            // parámetros del siguiente paso del juego.
            session_start();
            $_SESSION["initialParamsDone"] = false;
            $_SESSION["turn"] = 0;
            ?>
        </form>
    </body>
</html>

<?php
