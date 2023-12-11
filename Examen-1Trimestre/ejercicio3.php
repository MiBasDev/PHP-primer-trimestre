<?php /*
  Ejercicio 3 - Cookies ----- 2'5 puntos

  Crea un formulario que emule una pagina para crear una contraseña para un usuario.
  La pagina solicita por pantalla un nombre y una contraseña, que el usuario tiene que escribir dos
  veces para verificar que realmente quiere tener esa contraseña. Usando Cookies guarda esas dos
  contraseñas y el nombre del usuario. A continuación, cuando la persona finaliza el formulario, este
  te llevara a una pagina web php nueva llamada "ValidacionDeContraseña" la cual lee las cookies
  de las dos contraseñas; si coiniciden, mandara un mensaje de "Usuario <nombre de usuario> creado correctamente."
  Si no coincide, mandara un mensaje de error pidiendo que las dos contraseñas seran iguales.

  Para ambos casos, crea un boton que vuelva a la pagina web "Examen 27-11-23".
  Ten en cuenta que el usuario no puede ver las contraseñas que está escribiendo, como sucede en la vida real.

 */ ?>
<!DOCTYPE html>
<body style="background-color:rgba(125, 125, 155);">
    <h1>Ejercicio 3</h1>
    <form action="ValidacionDeContraseña.php" method="POST" class="form">
        <fieldset>
            <legend>Generar usuario</legend>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            </br>
            <input type="password" name="password1" id="password1" placeholder="Password">
            </br>
            <input type="password" name="password2" id="password2" placeholder="Password">
            </br>
            <input type="submit" name="submit" id="submit" value="Crear usuario">
        </fieldset>
    </form>
</body>


