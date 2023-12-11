<!DOCTYPE HTML>
<html>
    <head>
        <title>Resultado Formulario mayor de edad</title>
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
                padding-top: 20%;
            }
            fieldset {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend><b>¿Deportes?</b></legend>
            Nombre: <?php echo $_POST["nombre"]; ?> <br>
            Deportes practicados (<?php
            $arraySports = [];
            if (isset($_POST["baloncesto"])) {
                array_push($arraySports, "Baloncesto");
            }

            if (isset($_POST["futbol"])) {
                array_push($arraySports, "Fútbol");
            }

            if (isset($_POST["tenis"])) {
                array_push($arraySports, "Tenis");
            }
            
            echo count($arraySports) . "):";
            
            echo "<ul>";
            foreach ($arraySports as $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul>";
            ?>
        </fieldset>
    </body>
</html>

