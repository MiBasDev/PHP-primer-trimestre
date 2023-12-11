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
                text-align: center;
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

            #submit, #playAgain, #startGame {
                padding: 0.5em 1em;
                width: 250px;
                border-radius: 2px;
                border: white 1px solid;
                background: rgb(100, 200, 255);
                cursor: pointer;
                transition: all .3s ease;
            }

            p {
                text-align: center;
                background-color: gray;
                border: 2px solid white;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
            <?php
            session_start();
            // Controlamos la funcionalidad el juego.
            if (isset($_GET["startGame"])) {
                startGame($_GET["numberOfTrys"]);
            } elseif (isset($_GET['submit'])) {
                if ($_SESSION["secretNumber"] < $_GET["number"]) {
                    $_SESSION["trys"]++;
                    echoForm("mayor");
                } elseif ($_SESSION["secretNumber"] > $_GET["number"]) {
                    $_SESSION["trys"]++;
                    echoForm("menor");
                } else {
                    $_SESSION["trys"]++;
                    echoForm("igual");
                }
            } elseif (isset($_GET['playAgain'])) {
                echoTryMenu();
            } else {
                echoTryMenu();
            }

            // Método para empezar el juego.
            function startGame($maxTrys) {
                define("MIN", 1);
                define("MAX", 100);
                $_SESSION["secretNumber"] = random_int(MIN, MAX);
                $_SESSION["trys"] = 0;
                $_SESSION["maxTrys"] = abs($maxTrys);
                if ($maxTrys != 0) {
                    $_SESSION["endGame"] = false;
                    echoForm("maxTrys");
                } else {
                    echoForm("start");
                }
                echo $_SESSION["secretNumber"];
            }

            // Método para sacar por pantalla el menú de inicio.
            function echoTryMenu() {
                echo '<fieldset>';
                echo '<legend><b>Elige la dificultad del juego</b></legend>';
                echo '<input type="text" name="numberOfTrys" id="numberOfTrys" placeholder="Escribe cuántos intentos quieres (0 = infinito)"> ';
                echo '</fieldset>';
                echo '<input type="submit" name="startGame" id="startGame" value="Empezar el juego">';
            }

            // Método para sacar por pantalla el formulario.
            function echoForm($case) {
                if ($_SESSION["trys"] == $_SESSION["maxTrys"]) {
                    $_SESSION["endGame"] = true;
                }
                if (!$_SESSION["endGame"] || $_SESSION["maxTrys"] == 0) {
                    if ($case == "igual") {
                        echo '<fieldset>';
                        echo '<legend><b>Número secreto adivinado</b></legend>';
                        echo '<p>¡Enhorabuena, has acertado el número secreto <b>' . $_SESSION["secretNumber"] . '</b>!</p>';
                        echo $_SESSION["trys"] == 1 ? '<p>Has necesitado <b>' . $_SESSION["trys"] . '</b> intento.</p>' : '<p>Has necesitado <b>' . $_SESSION["trys"] . '</b> intentos.</p>';
                        echo'</fieldset>';
                        echo '<input type="submit" name="playAgain" id="playAgain" value="Volver a jugar">';
                    } else {
                        echo '<fieldset>';
                        echo '<legend><b>Adivina el número secreto</b></legend>';
                        echo '<input type="number" name="number" id="number" placeholder="Escribe un número" del 1 al 100"> ';
                        if ($case == "mayor") {
                            echo '<p>El número secreto es MENOR que <b>' . $_GET["number"] . '</b>.</p>';
                            if ($_SESSION["maxTrys"] != 0) {
                                echo '<p><b>Trys -> ' . $_SESSION["trys"] . '/' . $_SESSION["maxTrys"] . '</b></p>';
                            }
                        } elseif ($case == "menor") {
                            echo '<p>El número secreto es MAYOR que <b>' . $_GET["number"] . '</b>.</p>';
                            if ($_SESSION["maxTrys"] != 0) {
                                echo '<p><b>Trys -> ' . $_SESSION["trys"] . '/' . $_SESSION["maxTrys"] . '</b></p>';
                            }
                        }
                        echo'</fieldset>';
                        echo '<input type="submit" name="submit" id="submit" value="Probar">';
                    }
                } else {
                    echo '<fieldset>';
                    echo '<legend><b>Número secreto adivinado</b></legend>';
                    echo '<p>¡HAS PERDIDO!</p>';
                    echo '<p><b>Trys -> ' . $_SESSION["trys"] . '/' . $_SESSION["maxTrys"] . '</b></p>';
                    echo'</fieldset>';
                    echo '<input type="submit" name="playAgain" id="playAgain" value="Volver a jugar">';
                }
            }
            ?>
        </form>
    </body>
</html>

<?php
