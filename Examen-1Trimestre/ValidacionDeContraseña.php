<?php

if (isset($_POST["submit"])) {
    // Creamos cookies para cada atributo.
    setcookie("nombre", $_POST["nombre"], time() + 60);
    setcookie("password1", $_POST["password1"], time() + 60);
    setcookie("password2", $_POST["password2"], time() + 60);

    // Sacamos por pantalla la frase usando las cookies.
    if ($_COOKIE["password1"] == $_COOKIE["password2"]) {
        echo $_COOKIE["nombre"] . " creado correctamente";
    } else {
        echo "Las dos contraseñas deben ser iguales";
    }
} else {
    // Si no las pone, le decimos que las ponga
    echo "Introduce todos los datos, por favor.";
}

// Borramos las cookies para cada atributo (No funcionaba si lo ponía).
//    setcookie("nombre", $_POST["nombre"], time() + 60);
//    setcookie("password1", $_POST["password1"], time() + 60);
//    setcookie("password2", $_POST["password2"], time() + 60);

echo "</br>";

// Enlace al formulario.
echo "<a href='ejercicio3.php'>Volver atrás</a>";
?>
