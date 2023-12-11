<?php /*
  Ejercicio 1 - Calculo y redondeo  ----- 2'5 puntos

  Crea un formulario donde se le pida al usuario la altura y la base, en formato de dos cifras decimales,
  para calcular un area. En ese mismo formulario el usuario eligira si quiere calcular el area de un
  cuadrado, un rectangulo o un triangulo.

  A continuacion muestra el resultado de esa operacion por pantalla, redondeando los decimales para que solo
  se muestre un decimal en pantalla.

  Ejemplo: La base de un cuadrado es 25'34, su area es igual a 50'7.

  Ten en cuenta que:

  Para calcular el area:
  >Cuadrado: Base x Base
  >Rectangulo: Base X Altura
  >Triangulo: (Base X Altura) / 2

  Si el usuario quiere calcular un cuadrado debe escribir el mismo número en la base y en la altura.
  Si el usuario no introduce algun dato debe aparecer un mensaje de error para que rectifique.
  Si el usuario introduce caracteres en vez de numeros debe aparecer un mensaje de error para que rectifique.
  Ten en cuenta que este ultimo mensaje de error se debe realizar con filtros.

 */ ?>
<!DOCTYPE html>
<body style="background-color:rgba(125, 125, 155);">
    <h1>Ejercicio 1</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="form">
        <fieldset>
            <legend>Calcular área</legend>
            <p>Debes introducir la altura y la base con el siguiente formato: número.númeronúmero (2 decimales y punto de separación -> 3.40)</p>
            <p>Además, debes elegir la figura que quieres calcular.</p>
            <input type="text" name="altura" id="altura" placeholder="Altura">
            <input type="text" name="base" id="base" placeholder="Base">
            </br>
            <input type="radio" name="radio" id="cuadrado" value="cuadrado">
            <label for="cuadrado">Cuadrado</label>
            <input type="radio" name="radio" id="rectangulo" value="rectangulo">
            <label for="rectangulo">Rectángulo</label>
            <input type="radio" name="radio" id="triangulo" value="triangulo">
            <label for="triangulo">Triángulo</label>
            </br>
            <input type="submit" name="submit" id="submit" value="Calcular">
            <?php
// Creamos una variable resultado para la salida.
            $result;
// Si clicka en el botón submit, controlamos el formulario.
            if (isset($_GET["submit"])) {
                // Creamos una variable para saber si hacer la cuentas o no.
                $calcularArea = true;
                // Si la altura está vacía, se lo avisamos.
                if ($_GET["altura"] == "") {
                    echo "<p style='color:#ab2a3e ; font-weight:bold;'>-- Debes introducir una altura --</p>";
                    $calcularArea = false;
                } else if (preg_match("/^[0-9]+[^,]{1}[0-9][0-9]$/", $_GET["altura"]) == 0) {
                    // Si la altura no coincide con el patrón, se lo avisamos.
                    echo "<p style='color:#ab2a3e ; font-weight:bold;'>--- Altura mal definida ---</p>";
                    $calcularArea = false;
                }
                // Si la base está vacía, se lo avisamos.
                if ($_GET["base"] == "") {
                    echo "<p style='color:#ab2a3e ; font-weight:bold;'>-- Debes introducir una base --</p>";
                    $calcularArea = false;
                } else if (preg_match("/^[0-9]+[^,]{1}[0-9][0-9]$/", $_GET["base"]) == 0) {
                    // Si la base no coincide con el patrón, se lo avisamos.
                    echo "<p style='color:#ab2a3e ; font-weight:bold;'>--- Base mal definida ---</p>";
                }

                // Hacemos las cuentas si hay un radio seleccionado y todo lo 
                // anterior está bien.
                if (isset($_GET["radio"]) && $calcularArea) {
                    // Si el radio seleccionado es un cuadrado.
                    if ($_GET["radio"] == "cuadrado") {
                        if (floatval($_GET["altura"]) == floatval($_GET["base"])) {
                            $result = floatval($_GET["altura"]) * floatval($_GET["base"]);
                            echo "<p>El área del cuadrado es: " . round($result, 1) . "</p>";
                        } else {
                            // Si la altura y la base no coinciden, se lo avisamos.
                            echo "<p style='color:#ab2a3e ; font-weight:bold;'>-> Para calcular el área del cuadrado, la base y la altura deben ser la misma. <-</p>";
                        }
                    } else if ($_GET["radio"] == "rectangulo") {
                        // Si el radio seleccionado es un rectángulo.
                        $result = floatval($_GET["base"]) * floatval($_GET["altura"]);
                        echo "<p>El área del rectángulo es: " . round($result, 1) . "</p>";
                    } else {
                        // Si el radio seleccionado es un triángulo.
                        $result = (floatval($_GET["base"]) * floatval($_GET["altura"])) / 2;
                        echo "<p>El área del triángulo es: " . round($result, 1) . "</p>";
                    }
                } else {
                    // Si no hay un radio seleccionado se lo avisamos.
                    echo "<p style='color:#ab2a3e ; font-weight:bold;'>*** Elige una figura ***</p>";
                }
            }
            ?>
        </fieldset>
    </form>
</body>


