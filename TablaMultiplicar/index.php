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
                max-width: 800px;
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
                width: 800px;
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

            td {
                background-color: gray;
                border: 2px solid white;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
            <fieldset>
                <?php
                if (!isset($_GET["submit"])) {
                    echo '<legend><b>Tabla de multiplicar</b></legend>';
                    echo '<input type="number" name="number" id="number" placeholder="Escribe aquí el número">';
                    echo '<input type="submit" name="submit" id="submit" value="Aceptar número">';
                } else {
                    $num = $_GET["number"];
                    $count = 1;
                    echo '<legend><b>Tabla del número ' . $num . ':</b></legend>';
                    echo '<table align="center">';
                    for ($i = 0; $i < 5; $i++) {
                        for ($j = 0; $j < 5; $j++) {
                            echo '<td align="center">' . $num . " x " . $count . " = <b>" . ($num * $count) . '</b></td>';
                            $count++;
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
