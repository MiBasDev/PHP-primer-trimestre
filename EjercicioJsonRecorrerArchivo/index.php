<!DOCTYPE html>
<html>
    <head>
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

            table {
                width: 700px;
                margin-top:200px;
            }
            td {
                background-color: gray;
                border: 2px solid black;
            }
        </style>
    </head>
    <body>
        <table align="center">
            <caption style="font-size: 25px"><b>Películas <i>JSON</i></b></caption>
            <?php
            /**
             * @author Miguel Bastos Gándara.
             */
            $jsonArch = "peliculas.json";
            $jsonContent = file_get_contents($jsonArch);
            $jsonArchDecoded = json_decode($jsonContent, true);

            $arrayToConcat = ["La película ", " del año ", " dirigida por ", " tiene una nota de un ", " con ", " (", "), ", " (", ") y ", " (", ") como protagonistas."];

            foreach ($jsonArchDecoded as $value) {
                $finalString = "<tr><td> ";
                $counter = 0;
                $conCheck = false;
                foreach ($value as $key => $content) {
                    if (is_array($content)) {
                        foreach ($content as $innerContent) {
                            if ($conCheck == false) {
                                $finalString .= $arrayToConcat[$counter];
                                $counter++;
                                $conCheck = true;
                            }
                            foreach ($innerContent as $innerKey => $innerContent) {
                                $finalString .= $innerContent . $arrayToConcat[$counter];
                                $counter++;
                            }
                        }
                    } else if ($key == "id") {
                        $finalString .= "<b>" . $content . ".</b> ";
                    } else {
                        $finalString .= $arrayToConcat[$counter] . "<b><i>" . $content . "</i></b>";
                        $counter++;
                    }
                }
                echo $finalString . "</td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
            }
            ?>

        </table>
    </body>
</html>
