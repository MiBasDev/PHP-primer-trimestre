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
            <legend><b>¿Mayor de edad?</b></legend>
            <?php
            echo $_GET['edad'] < 18 ? "Lo sentimos, " . $_GET['nombre'] . " ¡ERES MENOR DE EDAD! :(" :
                    "Enhorabuena, " . $_GET['nombre'] . " ¡ERES MAYOR DE EDAD! :D";
            ?> <br>
        </fieldset>
    </body>
</html>

