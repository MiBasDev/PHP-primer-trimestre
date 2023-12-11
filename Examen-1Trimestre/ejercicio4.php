<!DOCTYPE html>
<body style="background-color:rgba(125, 125, 155);">
    <?php
    /*
      Ejercicio 4 - Objetos ----- 2'5 puntos

      Crea un objeto "Empleado" que contrendrá los atributos: "Nombre", "Apellido", "años en la empresa" y "salario original".

      Para calcular el salario Final, que es lo que cobra este mes la persona, se tiene que realizar un bono:

      Bono = (Salario original X (años en la empresa / 100))

      salario Final = Salario original + Bono

      Es decir:

      salario Final = Salario original + (Salario original X (años en la empresa / 100))

      A continuación crea dos clases abstractas.

      Una de esas clases, sera de "jefe", que calcula el salario final con un bono diferente:
      Bono = (Salario original X (años en la empresa / 20))

      La otra será "becario", que calcula el salario final con otro bono diferente:
      Bono = (Salario original X (años en la empresa / 500))

      A continuación crea un formulario para calcular el salario del empleado, donde se pedira el nombre, apellido,
      años en la empresa, salario original y si es un empleado normal, un jefe o un becario.

      Luego, usando objetos, muestra por pantalla su nombre, puesto y salario final. Puedes realizar tantas paginas php como necesites.

     */

    /**
     * Clase que define a un empleado.
     */
    abstract class Empleado {

        public $name; // Nombre del empleado
        public $surname; // Apellidos del empleado
        public $originalSalary; // Salario del empleado
        public $yearsWorking; // Años en la empresa

        /**
         * Constructor de la clase empleado.
         * @param type $name Nombre del empleado.
         * @param type $surname Apellidos del empleado.
         * @param type $originalSalary Salario del empleado.
         * @param type $yearsWorking Años en la empresa.
         */
        public function __construct($name, $surname, $originalSalary, $yearsWorking) {
            $this->name = $name;
            $this->surname = $surname;
            $this->originalSalary = $originalSalary;
            $this->yearsWorking = $yearsWorking;
        }

        /**
         * Método que calcula el salario final de un empleado.
         */
        abstract public function finalSalary();
    }

    /**
     * Clase que defino un empleado Jefe.
     */
    class Jefe extends Empleado {

        /**
         * Método que calcula el salario final de un empleado jefe.
         * @return type Salario final.
         */
        public function finalSalary() {
            return $this->originalSalary + ($this->originalSalary * ($this->yearsWorking / 20));
        }
    }

    /**
     * Clase que defino un empleado Becario.
     */
    class Becario extends Empleado {

        /**
         * Método que calcula el salario final de un empleado becario.
         * @return type Salario final.
         */
        public function finalSalary() {
            return $this->originalSalary + ($this->originalSalary * ($this->yearsWorking / 500));
        }
    }

    /**
     * Clase que defino un empleado Normal.
     */
    class Normal extends Empleado {

        /**
         * Método que calcula el salario final de un empleado normal.
         * @return type Salario final.
         */
        public function finalSalary() {
            return $this->originalSalary + ($this->originalSalary * ($this->yearsWorking / 100));
        }
    }
    ?>
    <h1>Ejercicio 4</h1>
    <form action = "ejercicio4.php" method = "POST" class = "form">
        <fieldset>
            <legend>Datos empleado</legend>
            <input type = "text" name = "nombre" id = "nombre" placeholder = "Nombre">
            </br>
            <input type = "text" name = "apellidos" id = "apellidos" placeholder = "Apellidos">
            </br>
            <input type = "text" name = "años" id = "años" placeholder = "Años en la empresa">
            </br>
            <input type = "text" name = "salario" id = "salario" placeholder = "Salario">
            </br>
            <input type = "text" name = "trabajador" id = "trabajador" placeholder = "Tipo trabajador">
            </br>
            <input type = "submit" name = "submit" id = "submit" value = "Crear usuario">
            <?php
            if (isset($_POST["submit"])) {
                $empleado;
                // Controlamos el tipo de empleado y cremos un objeto de cada
                // clase en función del mismo.
                $type = $_POST["trabajador"];
                if ($type == "jefe") {
                    $empleado = new Jefe($_POST["nombre"], $_POST["apellidos"], intval($_POST["años"]), intval($_POST["salario"]));
                } else if ($type == "becario") {
                    $empleado = new Becario($_POST["nombre"], $_POST["apellidos"], intval($_POST["años"]), intval($_POST["salario"]));
                } else if ($type == "normal") {
                    $empleado = new Normal($_POST["nombre"], $_POST["apellidos"], intval($_POST["años"]), intval($_POST["salario"]));
                }
                // He intentado arreglarlo, pero la salida del finalSalary() 
                // siempre me saca un 0 menos de lo que debería.
                echo "<p>" . $empleado->name . " " . $empleado->surname . ", eres un trabajador " . $type . " y tu salario final es de " . $empleado->finalSalary() . "€</p>";
            }
            ?>
        </fieldset>
    </form>
</body>
