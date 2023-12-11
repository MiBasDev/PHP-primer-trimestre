<!DOCTYPE HTML>
<html>
    <head>
        <title>Mi primer formulario</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre"> <br>

            <label for="edad">Edad: </label>
            <input type="number" name="edad" id="edad"><br>

            <label for="email">Email: </label>
            <input type="text" name="email" id="email"><br>

            <input type="submit" name="submit" value="Enviar">
        </form>
    </body>
</html>

<?php

// Función que filtra los datos
function filtrado($datos) {
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

if (isset($_GET["submit"])) {

    // Validación del formulario
    $nombre = $_GET['nombre'];
    $edad = $_GET['edad'];
    $email = $_GET['email'];
    $errores = [];

    if (isset($_GET['submit'])) {
        if (empty($nombre)) {
            $errores[] = "El nombre es obligatorio.";
        }
        if ($_GET["edad"] < 10 || empty($_GET["edad"])) {
            $errores[] = "La edad es menor que 10";
        }
        // El email es obligatorio y ha de tener formato adecuado
        if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL) || empty($_GET["email"])) {
            $errores[] = "No se ha indicado email o el formato no es correcto";
        }
    }

    // Si hay errores, muestra los errores en el HTML
    if (!empty($errores)) {
        echo "<h2>Errores:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        $nombre = filtrado($nombre);
        $edad = filtrado($edad);
        $email = filtrado($email);
        // Si no hay errores y el formulario se ha enviado, redirecciona a otro archivo PHP
        header("Location:formpost.php?nombre=$nombre&edad=$edad&email=$email");
        exit();
    }
}

     


