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
                width: 80px;
                height: 30px;
                margin: 0.5rem;
                text-align: center;
            }

            #fullDeck {
                border:2px solid black;
                cursor:pointer;
                width: 80px;
                height: 36px;
                margin: 0.5rem;
                text-align: center;
            }

            #fullDeck:hover {
                transition: 0.8s;
                background-color: cyan;
            }

            fieldset{
                width: 400px;
                background-color: gray;
                border-radius: 5px;
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
        <?php

        /**
         * Clase que define a un jugador del juego del UNO.
         */
        class Player {

            private $name; // Nombre del jugador.
            private $cartas; // Cartas del jugador.

            /**
             * Constructor de la clase player.
             */
            public function __construct() {
                $this->name = "";
                $this->cartas = [];
            }

            /**
             * Método que devuelve el nombre del jugador.
             * @return type Nombre del jugador.
             */
            public function getName() {
                return $this->name;
            }

            /**
             * Método que cambia el nombre del jugador
             * @param type $name Nombre del jugador.
             * @return void Nada.
             */
            public function setName($name): void {
                $this->name = $name;
            }

            /**
             * Método que devuelve las cartas del jugador.
             * @return type Cartas del jugador.
             */
            public function getCartas() {
                return $this->cartas;
            }

            /**
             * Método que cambia las cartas del jugador.
             * @param type $cartas Cartas del jugador.
             * @return void Nada.
             */
            public function setCartas($cartas): void {
                $this->cartas = $cartas;
            }
        }

        // Iniciamos la sesión.
        session_start();

        // Controlamos los turnos de la sesión.
        if (isset($_GET['button'])) {
            if ($_SESSION["turn"] < count($_SESSION["playersInGame"]) - 1) {
                $_SESSION["turn"]++;
            } else {
                $_SESSION["turn"] = 0;
            }
        }

        /*
         * Iniciamos los parámetros del principio del juego, trayendo la baraja 
         * del json, guardando los nombre de los jugadores y creándolos, asignándoles 
         * sus respectivas cartas y poniendo el turno a 0.
         */
        if (!$_SESSION["initialParamsDone"]) {
            // Traemos la baraja del json.
            $barajaJson = "baraja.json";
            $barajaContent = file_get_contents($barajaJson);
            $_SESSION["baraja"] = json_decode($barajaContent, true);
            shuffle($_SESSION["baraja"]);

            // Metemos la baraja en un array.
            $playerNames = [];
            for ($i = 1; $i < count($_GET); $i++) {
                array_push($playerNames, $_GET["player" . $i]);
            }

            // Constante que define el número máximo de cartas a repartir al 
            // principio de la partida.
            define("CARTAS_MANO_AL_REPARTIR", 3);

            // Array de cartas de la baraja ya repartidas.
            $_SESSION["barajaDone"] = [];

            // Creamos un array de jugadores e iniciamos la sesión para guardarlo 
            // como variable de sesión.
            $_SESSION["playersInGame"] = [];

            // Generamos jugadores dinámicamente, asignándoles su respectivo nombre
            // y repartiéndole sus cartas.
            for ($i = 1; $i <= count($playerNames); $i++) {
                // Creamos un jugador y le asignamos un nombre en cada iteración.
                $player = "player" . $i;
                $$player = new Player();
                $$player->setName($playerNames[($i - 1)]);
                // Creamos un contador para las cartas a repartir.
                $count = 0;
                // Creamos el array de cartas de la mano cada jugador.
                $arrayOfCardsForPlayer = [];
                while ($count < CARTAS_MANO_AL_REPARTIR) {
                    array_push($arrayOfCardsForPlayer, $_SESSION["baraja"][$count]);
                    array_push($_SESSION["barajaDone"], $_SESSION["baraja"][$count]);
                    $count++;
                }
                $_SESSION["baraja"] = array_slice($_SESSION["baraja"], 7);
                $$player->setCartas($arrayOfCardsForPlayer);
                array_push($_SESSION["playersInGame"], $$player);
            }
            // Creamos una variable de sesión para manejar el turno del juego.
            $_SESSION["turn"] = 0;
        }

        // Creamos una "flag" de session para controlar el final del juego.
        $_SESSION["endGame"] = false;
        // Controlamos el final del juego
        if ($_SESSION["turn"] == 0) {
            if (count($_SESSION["playersInGame"][count($_SESSION["playersInGame"]) - 1]->getCartas()) == 0) {
                $_SESSION["endGame"] = true;
            }
        } else {
            if (count($_SESSION["playersInGame"][$_SESSION["turn"] - 1]->getCartas()) == 0) {
                $_SESSION["endGame"] = true;
            }
        }

        /**
         * Método que controla las cartas ya usadas y las interacciones de los 
         * jugadores con sus cartas.
         * @return string Última carta usada por un jugador.
         */
        function showDeckAlreadyUsed() {
            $cardPlayedToShowOnDeckPlayed = "";
            // Entramos en este if si la partida aún no ha comenzado
            if (!$_SESSION["initialParamsDone"]) {
                // Sacamos una carta por pantalla con la que los jugadores puedan 
                // jugar.
                $cardPlayedToShowOnDeckPlayed .= lastCardPlayed($_SESSION["baraja"], 0);
                // Metemos la carta ya usada en el mazo de cartas usadas.
                array_push($_SESSION["barajaDone"], $_SESSION["baraja"][0]);
                // Ponemos la variable de parámetros iniciales a true para no 
                // volver a entrar por aquí.
                $_SESSION["initialParamsDone"] = true;
            } else {
                // Si cogen una carta de la baraja.
                if (isset($_GET["fullDeck"])) {
                    // Pasamos de turno al siguiente jugador.
                    if ($_SESSION["turn"] < count($_SESSION["playersInGame"]) - 1) {
                        $_SESSION["turn"]++;
                    } else {
                        $_SESSION["turn"] = 0;
                    }
                    // Añadimos una carta de la baraja al jugador que le dió click 
                    // a ella.
                    if ($_SESSION["turn"] == 0) {
                        refreshHandOnFullDeck(count($_SESSION["playersInGame"]) - 1);
                    } else {
                        refreshHandOnFullDeck($_SESSION["turn"] - 1);
                    }
                    // Sacamos la última carta jugada.
                    $cardPlayedToShowOnDeckPlayed .= lastCardPlayed($_SESSION["barajaDone"], count($_SESSION["barajaDone"]) - 1);
                } else {
                    if ($_SESSION["turn"] == 0) {
                        // Si es el turno del primer jugador, agregamos al array 
                        // de cartas usadas la carta jugada por el último jugador.
                        array_push($_SESSION["barajaDone"], $_SESSION["playersInGame"][count($_SESSION["playersInGame"]) - 1]->getCartas()[$_GET["button"]]);
                        // Sacamos la última carta jugada.
                        $cardPlayedToShowOnDeckPlayed .= lastCardPlayed($_SESSION["barajaDone"], count($_SESSION["barajaDone"]) - 1);
                        $countLoop = 0;
                        // Controlamos la carta usada por el último jugador.
                        foreach ($_SESSION["playersInGame"][count($_SESSION["playersInGame"]) - 1]->getCartas()[$_GET["button"]] as $value) {
                            if ($value == "+" . "2") {
                                newHand(count($_SESSION["playersInGame"]) - 1);
                                // Si es un +2, agregamos 2 cartas al siguiente 
                                // jugador.
                                eatCards(2);
                            } else if ($value == "+" . "4") {
                                newHand(count($_SESSION["playersInGame"]) - 1);
                                // Si es un +4, agregamos 4 cuartas al siguiente 
                                // jugador.
                                eatCards(4);
                            } else if ($value == "Ø") {
                                newHand(count($_SESSION["playersInGame"]) - 1);
                                // Si es un prohibido, saltamos turno.
                                $_SESSION["turn"]++;
                            } else if ($value == "«»") {
                                newHand(count($_SESSION["playersInGame"]) - 1);
                                // Si es un cambio de sentido, hacemos un reverse
                                // al array de jugadores.
                                reversePlayers();
                            } else {
                                // Si no es ninguna de estás cartas, simplemente 
                                // refrescamos la mano del jugador anterior
                                if ($countLoop == 1) {
                                    newHand(count($_SESSION["playersInGame"]) - 1);
                                }
                            }
                            $countLoop++;
                        }
                    } else {
                        // Si es el turno del cualquier otro jugador, agregamos 
                        // al array de cartas usadas la carta jugada por el anterior
                        // jugador.
                        array_push($_SESSION["barajaDone"], $_SESSION["playersInGame"][$_SESSION["turn"] - 1]->getCartas()[$_GET["button"]]);
                        // Sacamos la última carta jugada.
                        $cardPlayedToShowOnDeckPlayed .= lastCardPlayed($_SESSION["barajaDone"], count($_SESSION["barajaDone"]) - 1);
                        $countLoop = 0;
                        // Controlamos la carta usada por el jugador anterior.
                        foreach ($_SESSION["playersInGame"][$_SESSION["turn"] - 1]->getCartas()[$_GET["button"]] as $value) {
                            if ($value == "+" . "2") {
                                newHand($_SESSION["turn"] - 1);
                                // Si es un +2, agregamos 2 cartas al siguiente 
                                // jugador.
                                eatCards(2);
                            } else if ($value == "+" . "4") {
                                newHand($_SESSION["turn"] - 1);
                                // Si es un +4, agregamos 4 cuartas al siguiente 
                                // jugador.
                                eatCards(4);
                            } else if ($value == "Ø") {
                                // Si es un prohibido, saltamos turno.
                                if ($_SESSION["turn"] == count($_SESSION["playersInGame"]) - 1) {
                                    newHand(count($_SESSION["playersInGame"]) - 1);
                                    // Si es el turno del último jugador.
                                    $_SESSION["turn"] = 1;
                                } else if ($_SESSION["turn"] == count($_SESSION["playersInGame"]) - 2) {
                                    newHand(count($_SESSION["playersInGame"]) - 2);
                                    // Si es el turno del penúltimo jugador.
                                    $_SESSION["turn"] = 0;
                                } else {
                                    $_SESSION["turn"]++;
                                    // Array para la nueva mano.
                                    newHand($_SESSION["turn"] - 2);
                                }
                            } else if ($value == "«»") {
                                // Refrescamos la mano.
                                newHand($_SESSION["turn"] - 1);
                                // Si es un cambio de sentido, hacemos un reverse
                                // al array de jugadores.
                                reversePlayers();
                            } else {
                                // Si no es ninguna de estás cartas, simplemente 
                                // refrescamos la mano del jugador anterior
                                if ($countLoop == 1) {
                                    newHand($_SESSION["turn"] - 1);
                                }
                            }
                            $countLoop++;
                        }
                    }
                }
            }
            /*
             * ¡¡¡¡COMENTARIOS!!!!
             * - El 4 y el 2 sigue interprentándolos como +2 y +4.
             * - El 0 lo interpreta como un Ø.
             * - El Ø funciona casi en su totalidad, sólo rompe si juegan 2 personas.
             * - El «» funciona bien, pero al darle la vuelta al array, le quita la 
             * carta de la mano al jugador incorrecto.
             * 
             * - Por lo demás, el juego es funcional. Intenté mejorarlo todo, pero
             * cuando arreglo algo rompo otra cosa, así que mejor dejarlo así por
             * ahora.
             */
            return $cardPlayedToShowOnDeckPlayed;
        }

        /**
         * Método que devuelve un botón con el número de cartas de la baraja restante.
         * @return type Botón de robar carta con número de cartas que quedan en 
         * la baraja.
         */
        function showDeck() {
            return '<button name="fullDeck" id="fullDeck">DECK(' . count($_SESSION["baraja"]) . ')</button>';
        }

        /**
         * Método que devuelve la última carta jugada.
         * @return string La última carta jugada.
         */
        function lastCardPlayed($deck, $position) {
            // Sacamos por pantalla la última carta jugada.
            $cardPlayed = "";
            $count = 0;
            $cardPlayedToShowOnDeckPlayed = "";
            foreach ($deck[$position] as $key => $value) {
                if ($count == 0) {
                    // Guardamos el color de la carta.
                    $color = $value;
                } else {
                    // Guardamos la carta jugada para tratarla abajo.
                    $cardPlayed = $value;
                    // Sacamos un botón con el valor y el color de la carta.
                    if ($color == "black" || $color == "blue") {
                        $cardPlayedToShowOnDeckPlayed .= "<input type='text' name='usedDeck' id='usedDeck' value='" . $value . "' style='background-color:" . $color . "; color:white; border:2px solid white;' disabled>";
                    } else {
                        $cardPlayedToShowOnDeckPlayed .= "<input type='text' name='usedDeck' id='usedDeck' value='" . $value . "' style='background-color:" . $color . "; color:black; border:2px solid black;' disabled>";
                    }
                }
                $count++;
            }
            // Tratamos la carta.
            if ($cardPlayed == "«»") {
                if ($_SESSION["turn"] == 0) {
                    $_SESSION["turn"] = 0;
                } else {
                    $_SESSION["turn"]--;
                }
            }
            return $cardPlayedToShowOnDeckPlayed;
        }

        /**
         * Método que refresca la mano de una jugador cuando coge carta.
         * @param type $playerToControl Jugador al que refrescar la mano.
         */
        function refreshHandOnFullDeck($playerToControl) {
            $arrCards = []; // Array de nuevas cartas del jugador en cuestión.
            // Almacenamos las cartas del jugador.
            for ($i = 0; $i < count($_SESSION["playersInGame"][$playerToControl]->getCartas()); $i++) {
                array_push($arrCards, $_SESSION["playersInGame"][$playerToControl]->getCartas()[$i]);
            }
            // Cogemos la primera carta de la baraja.
            array_push($arrCards, $_SESSION["baraja"][0]);
            // Quitamos la primera carta, ya cogida, de la baraja.
            $_SESSION["baraja"] = array_slice($_SESSION["baraja"], 1);
            // Refrescamos la mano del último jugador.
            $_SESSION["playersInGame"][$playerToControl]->setCartas($arrCards);
        }

        /**
         * Método que da la vuelta al array de jugadores.
         */
        function reversePlayers() {
            // Creamos un array auxiliar.
            $arrayReverse = [];
            // Recorremos el array jugadores al revés y los guardamos uno a uno
            // en el array auxiliar.
            for ($i = count($_SESSION["playersInGame"]) - 1; $i >= 0; $i--) {
                array_push($arrayReverse, $_SESSION["playersInGame"][$i]);
            }
            // Guardamos el valor del array de jugadores como el array auxiliar.
            $_SESSION["playersInGame"] = $arrayReverse;
        }

        /**
         * Método que genera una nueva mano al jugador.
         * @param type $playerToControl Jugador al que generarle una nueva mano.
         */
        function newHand($playerToControl) {
            // Array para la nueva mano.
            $newHand = [];
            // Almacenamos las cartas que no ha usado en un array
            // y le referescamos la mano con ellas.
            for ($i = 0; $i < count($_SESSION["playersInGame"][$playerToControl]->getCartas()); $i++) {
                if ($_SESSION["playersInGame"][$playerToControl]->getCartas()[$i] != $_SESSION["playersInGame"][$playerToControl]->getCartas()[$_GET["button"]]) {
                    array_push($newHand, $_SESSION["playersInGame"][$playerToControl]->getCartas()[$i]);
                }
            }
            $_SESSION["playersInGame"][$playerToControl]->setCartas($newHand);
        }

        /**
         * Método que reparte un número de cartas pasado como parámetro al jugador
         * actual.
         * @param type $num Número de cartas a comer.
         */
        function eatCards($num) {
            // Creamos un array auxiliar para almacenar las cartas.
            $cardsForNextPlayer = [];
            // Guardamos las cartas del jugador en el array auxiliar.
            for ($i = 0; $i < count($_SESSION["playersInGame"][$_SESSION["turn"]]->getCartas()); $i++) {
                array_push($cardsForNextPlayer, $_SESSION["playersInGame"][$_SESSION["turn"]]->getCartas()[$i]);
            }
            // Cogemos cartas de la baraja pasadas como parámetro y las agregamos 
            // al array auxiliar.
            for ($i = 0; $i < $num; $i++) {
                array_push($cardsForNextPlayer, $_SESSION["baraja"][$i]);
            }
            // Quitamos de la baraja el número de cartas pasadas como parámetro.
            $_SESSION["baraja"] = array_slice($_SESSION["baraja"], $num);
            // Seteamos a las cartas del jugador el array auxiliar.
            $_SESSION["playersInGame"][$_SESSION["turn"]]->setCartas($cardsForNextPlayer);
        }

        /**
         * Método que devuelve la mano del jugador del turno.
         * @return string Cartas del jugador.
         */
        function showPlayerHandCards() {
            // Controlamos las cartas de la mano de los jugadores 
            // sacándolas por pantalla como botones.
            $showCards = "";
            $barajaDoneColor = "";
            $barajaDoneValue = "";
            $count = 0;
            // Guardamos el valor y color de la carta de la baraja que está "boca
            // arriba".
            foreach ($_SESSION["barajaDone"][count($_SESSION["barajaDone"]) - 1] as $key => $value) {
                if ($count == 0) {
                    $barajaDoneColor = $value;
                    $count++;
                } else {
                    $barajaDoneValue = $value;
                }
            }
            // Controlamos la salida de las cartas de la mano del jugador en función
            // del valor y color de la carta de la baraja antes guardada.
            for ($i = 0; $i < count($_SESSION["playersInGame"][$_SESSION["turn"]]->getCartas()); $i++) {
                $count = 0;
                $color = "";
                foreach ($_SESSION["playersInGame"][$_SESSION["turn"]]->getCartas()[$i] as $key => $innerValue) {
                    if ($count == 0) {
                        $color = $innerValue;
                    } else {
                        if ($value == "©") {
                            if ($color == "black" || $color == "blue") {
                                $showCards .= "<button id='button-" . $i . "' name='button' value='" . $i . "' style='background-color:" . $color . "; color:white; border:2px solid white; cursor:pointer;'>" . $innerValue . "</button> ";
                            } else {
                                $showCards .= "<button id='button-" . $i . "' name='button' value='" . $i . "' style='background-color:" . $color . "; border:2px solid black; cursor:pointer;'>" . $innerValue . "</button> ";
                            }
                        } else {
                            if ($barajaDoneColor == $color || $barajaDoneValue == $innerValue || $barajaDoneColor == "black") {
                                if ($color == "black" || $color == "blue") {
                                    $showCards .= "<button id='button-" . $i . "' name='button' value='" . $i . "' style='background-color:" . $color . "; color:white; border:2px solid white; cursor:pointer;'>" . $innerValue . "</button> ";
                                } else {
                                    $showCards .= "<button id='button-" . $i . "' name='button' value='" . $i . "' style='background-color:" . $color . "; border:2px solid black; cursor:pointer;'>" . $innerValue . "</button> ";
                                }
                            } else {
                                if ($color != "black") {
                                    $showCards .= "<button id='button-" . $i . "' name='button' value='" . $i . "' style='background-color:" . $color . "; border:2px solid black; cursor:pointer;' disabled>" . $innerValue . "</button> ";
                                } else {
                                    $showCards .= "<button id='button-" . $i . "' name='button' value='" . $i . "' style='background-color:" . $color . "; color:white; border:2px solid white; cursor:pointer;'>" . $innerValue . "</button> ";
                                }
                            }
                        }
                    }
                    $count++;
                }
                // Separador para "dejarlo bonito".
                if (($i + 1) != count($_SESSION["playersInGame"][$_SESSION["turn"]]->getCartas())) {
                    $showCards .= "| ";
                }
            }
            return $showCards;
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
            <fieldset>
                <table align="center">
                    <tr>
                        <td></td>
                        <td align="center" id="player3"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center" id="player1"></td>
                        <td align="center">
                            <?php
                            // Controlamos el final del juego.
                            echo showDeck();
                            do {
                                echo showDeckAlreadyUsed();
                            } while ($_SESSION["endGame"]);
                            ?> 
                        </td>
                        <td align="center" id="player2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center" id="player4"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <p id="playerHand"><?php
                                echo showPlayerHandCards();
                                ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <?php
                            // Sacamos por pantalla el nombre del jugador al cual 
                            // pertenece el turno.
                            echo "-><b> " . $_SESSION["playersInGame"][$_SESSION["turn"]]->getName() . " </b><-";
                            ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>
