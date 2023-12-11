<!DOCTYPE HTML>
<html>
    <head>
        <title>FormPost</title>
    </head>
    <body>
        Hola <?php echo htmlspecialchars($_GET['nombre']); ?>. <br>
        Tu edad es: <?php echo htmlspecialchars($_GET["edad"]); ?>. <br>
        Tu email es: <?php echo htmlspecialchars($_GET["email"]); ?><br>
    </body>
</html>



