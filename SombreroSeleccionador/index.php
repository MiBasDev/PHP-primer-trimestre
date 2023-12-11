<!DOCTYPE HTML>
<html>
    <head>
        <title>Sombrero seleccionador</title>
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

            p {
                text-align: center;
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
        </style>
    </head>
    <body>
        <form action="index.php" method="POST" class="form">
            <fieldset>
                <?php
                // Iniciamos la session para mover las variables de sesión.
                session_start();
                if (!isset($_POST["submit"])) {
                    // Creamos el fichero y lo escribimos.
                    $fileToCreate = "nombre.txt";
                    $textToWrite = "Miguel";
                    $fileToRead = fopen($fileToCreate, "w");
                    fwrite($fileToRead, $textToWrite);
                    fclose($fileToRead);

                    // Abrimos el fichero y lo leemos.
                    $fileToRead = fopen($fileToCreate, "r");
                    $_SESSION["nombre"] = fread($fileToRead, filesize($fileToCreate));
                    fclose($fileToRead);
                    $_SESSION["countQuestions"] = 1;

                    echo '<legend><b>Hola ' . $_SESSION["nombre"] . '</b></legend>';
                    echo '<p>Vamos a hacerte una serie de preguntas para saber a qué casa de Hogwharts perteneces. <b>¿Estás preparado?</b></p>';
                    echo '<input type="submit" name="submit" id="submit" value="Empecemos">';
                }

                // Guardamos las respuestas del usuario en variables de sesión.
                if ($_SESSION["countQuestions"] == 2) {
                    $_SESSION["respuesta1"] = $_POST["1"];
                } else if ($_SESSION["countQuestions"] == 3) {
                    $_SESSION["respuesta2"] = $_POST["2"];
                } else if ($_SESSION["countQuestions"] == 4) {
                    $_SESSION["respuesta3"] = $_POST["3"];
                }

                // Controlamos las preguntas del programa.
                if (isset($_POST["submit"])) {
                    switch ($_SESSION["countQuestions"]) {
                        case 1:
                            quests("¿Cuál de las siguientes opciones odiarías más que la gente te llamara?", "Ordinario", "Ignorante", "Cobarde", "Egoista");
                            break;
                        case 2:
                            quests("Después de su muerte ¿qué es lo que más le gustaría que hiciera la gente cuando escuche su nombre?",
                                    "Te extraña, pero sonríe", "Pide mas historias sobre tus aventuras", "Piensa con admiración tus logros",
                                    "No me importa");
                            break;
                        case 3:
                            quests("Dada la opción, preferirías inventar una poción que garantizara:", "El sabio", "El bueno", "El gran", "El audaz");
                            break;
                        default:
                            houseResult($_SESSION["respuesta1"], $_SESSION["respuesta2"], $_SESSION["respuesta3"]);
                            break;
                    }
                }

                /**
                 * Método que saca por pantalla las preguntas con sus opciones de
                 * respuesta, pasadas como parámetro.
                 * @param type $question Pregunta.
                 * @param type $option1 Opción 1.
                 * @param type $option2 Opción 2.
                 * @param type $option3 Opción 3.
                 * @param type $option4 Opción 4.
                 */
                function quests($question, $option1, $option2, $option3, $option4) {
                    echo '<legend><b>' . $_SESSION["countQuestions"] . '. ' . $question . '</b></legend>';
                    echo '<ul>';
                    echo '<li>';
                    echo '<input type = "radio" name = "' . $_SESSION["countQuestions"] . '" id = "1" value="' . $option1 . '">';
                    echo '<label for="1">' . $option1 . '</label>';
                    echo '</li>';
                    echo '<li>';
                    echo '<input type = "radio" name = "' . $_SESSION["countQuestions"] . '" id = "2" value="' . $option2 . '">';
                    echo '<label for="2">' . $option2 . '</label>';
                    echo '</li>';
                    echo '<li>';
                    echo '<input type = "radio" name = "' . $_SESSION["countQuestions"] . '" id = "3" value="' . $option3 . '">';
                    echo '<label for="3">' . $option3 . '</label>';
                    echo '</li>';
                    echo '<li>';
                    echo '<input type = "radio" name = "' . $_SESSION["countQuestions"] . '" id = "4" value="' . $option4 . '">';
                    echo '<label for="4">' . $option4 . '</label>';
                    echo '</li>';
                    echo '</ul>';
                    echo '<input type="submit" name="submit" id="submit" value="Responder">';

                    // Aumentamos el contador de preguntas.
                    $_SESSION["countQuestions"]++;
                }

                /**
                 * Método que elige la casa del usuario en función de sus respuestas 
                 * pasadas como parámetro.
                 * @param type $answer1 Respuesta 1.
                 * @param type $answer2 Respuesta 2.
                 * @param type $answer3 Respuesta 3.
                 */
                function houseResult($answer1, $answer2, $answer3) {
                    echo '<legend><b>' . $_SESSION["nombre"] . ', tu casa es:</b></legend>';
                    // Inicializamos las casas.
                    $slytherin = 0;
                    $ravenclaw = 0;
                    $griffindor = 0;
                    $hafflepuff = 0;

                    // Controlamos las respuestas.
                    if ($answer1 == "Ordinario") {
                        $slytherin++;
                    } else if ($answer1 == "Ignorante") {
                        $ravenclaw++;
                    } else if ($answer1 == "Cobarde") {
                        $griffindor++;
                    } else if ($answer2 == "Egoista") {
                        $hafflepuff++;
                    }

                    if ($answer2 == "Te extraña, pero sonríe") {
                        $hafflepuff++;
                    } else if ($answer2 == "Pide mas historias sobre tus aventuras") {
                        $slytherin++;
                    } else if ($answer2 == "Piensa con admiración tus logros") {
                        $ravenclaw++;
                    } else if ($answer2 == "No me importa") {
                        $griffindor++;
                    }

                    if ($answer3 == "El sabio") {
                        $ravenclaw++;
                    } else if ($answer3 == "El bueno") {
                        $griffindor++;
                    } else if ($answer3 == "El gran") {
                        $slytherin++;
                    } else if ($answer3 == "El audaz") {
                        $hafflepuff++;
                    }

                    // Miramos cuál es la casa con más puntuación.
                    $houses = [$ravenclaw, $slytherin, $hafflepuff, $griffindor];
                    $houseResult = 0;
                    foreach ($houses as $value) {
                        if ($houseResult <= $value) {
                            $houseResult = $value;
                        }
                    }

                    // Abrimos y escribimos el fichero con el nombre del usuario 
                    // y la casa a la que pertenecería.
                    $fileToRead = fopen("nombre.txt", "w");
                    if ($houseResult == $ravenclaw) {
                        echo "<p><b>¡<span style='color:blue;'>RAVENCLAW</span>!</b></p>";
                        $textToWrite = $_SESSION["nombre"] . " es de la casa de Ravenclaw.";
                    } else if ($houseResult == $slytherin) {
                        echo "<p><b>¡<span style='color:green;'>SLYTHERIN</span>!</b></p>";
                        $textToWrite = $_SESSION["nombre"] . " es de la casa de Slytherin.";
                    } else if ($houseResult == $hafflepuff) {
                        echo "<p><b>¡<span style='color:yellow;'>HAFFELPUFF</span>!</b></p>";
                        $textToWrite = $_SESSION["nombre"] . " es de la casa de Hafflepuff.";
                    } else if ($houseResult == $griffindor) {
                        echo "<p><b>¡<span style='color:red;'>GRIFFINDOR</span>!</b></p>";
                        $textToWrite = $_SESSION["nombre"] . " es de la casa de Griffindor.";
                    }
                    fwrite($fileToRead, $textToWrite);
                    fclose($fileToRead);
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
