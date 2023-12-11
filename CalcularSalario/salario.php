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
                max-width: 600px;
                margin: 0 auto;
                padding-top: 13%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .form input {
                width: 90%;
                height: 30px;
                margin: 0.5rem;
                text-align: center;
            }

            fieldset{
                width: 400px;
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

            p {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form action="index.php" method="POST" class="form">
            <fieldset>
                <legend><b>Salario de la persona</b></legend>
                <?php

                /**
                 * Clase que define a una una persona.
                 */
                class Person {

                    private $name; // Nombre de la persona
                    private $surname; // Apellidos de la persona
                    private $salary; // Salario de la persona
                    private $age; // Edad de la persona

                    /**
                     * Constructor de la clase person.
                     */
                    public function __construct($name, $surname, $salary, $age) {
                        $this->name = $name;
                        $this->surname = $surname;
                        $this->salary = $salary;
                        $this->age = $age;
                    }

                    /**
                     * Método que devuelve el nombre de la persona
                     * @return type Nombre de la persona
                     */
                    public function getName() {
                        return $this->name;
                    }

                    /**
                     * Método que cambia el nombre de la persona.
                     * @param type $name Nombre de la persona.
                     * @return void Nada.
                     */
                    public function setName($name): void {
                        $this->name = $name;
                    }

                    /**
                     * Método que devuelve los apellidos de la persona.
                     * @return type Apellidos de la persona.
                     */
                    public function getSurname() {
                        return $this->surname;
                    }

                    /**
                     * Método que cambia los apellidos de la persona.
                     * @param type $surname Apellidos de la persona.
                     * @return void Nada.
                     */
                    public function setSurname($surname): void {
                        $this->surname = $surname;
                    }

                    /**
                     * Método que devuelve el salario de la persona.
                     * @return type Salario de la persona.
                     */
                    public function getSalary() {
                        return $this->salary;
                    }

                    /**
                     * Método que devuelve la edad de la persona.
                     * @return type Edad de la persona.
                     */
                    public function getAge() {
                        return $this->age;
                    }

                    /**
                     * Método que cambia el salario de la persona.
                     * @param type $salary Salario de la persona.
                     * @return void Nada.
                     */
                    public function setSalary($salary): void {
                        $this->salary = $salary;
                    }

                    /**
                     * Método que cambia la edad de la persona.
                     * @param type $age Edad de la persona.
                     * @return void Nada.
                     */
                    public function setAge($age): void {
                        $this->age = $age;
                    }
                }

                // Creamos un objeto de persona.
                $person = new Person($_POST["nombre"], $_POST["apellidos"], $_POST["salario"], $_POST["edad"]);

                // Controlamos el programa.
                if ($person->getName() == "" || $person->getSurname() == "" || $person->getSalary() == "" || $person->getAge() == "") {
                    echo '<p style="color:red;"><b> ¡FALTAN DATOS! </b></p>';
                    echo '<input type="submit" name="submit" id="submit" value="Volver al inicio">';
                } else {
                    if (intval($person->getSalary()) < 1000) {
                        if ($person->getAge() < 30) {
                            $person->setSalary(1100);
                        } else if ($person->getAge() >= 30 && $person->getAge() <= 45) {
                            $person->setSalary($person->getSalary() * 1.03);
                        } else {
                            $person->setSalary($person->getSalary() * 1.15);
                        }
                    } else if (intval($person->getSalary()) >= 1000 && intval($person->getSalary()) <= 2000) {
                        if ($person->getAge() > 45) {
                            $person->setSalary($person->getSalary() * 1.03);
                        } else {
                            $person->setSalary($person->getSalary() * 1.1);
                        }
                    }

                    // Sacamos por pantalla la frase.
                    echo '<p> <b>' . $person->getName() . ' ' . $person->getSurname() . '</b> de <b>' . $person->getAge()
                    . '</b> años tiene un salario de <b>' . $person->getSalary() . '€</b></p>';

                    // Creamos cookies para cada atributo.
                    setcookie("nombre", $person->getName());
                    setcookie("apellidos", $person->getSurname());
                    setcookie("salario", $person->getSalary());
                    setcookie("edad", $person->getAge());

                    // Sacamos por pantalla la frase usando las cookies.
                    echo '<p>Ahora con cookies: <b>' . $_COOKIE["nombre"] . ' ' . $_COOKIE["apellidos"] . '</b> de <b>' . $_COOKIE["edad"]
                    . '</b> años tiene un salario de <b>' . $_COOKIE["salario"] . '€</b></p>';

                    // Borramos las cookies.
                    setcookie("nombre", $person->getName(), time() - 60);
                    setcookie("apellidos", $person->getSurname(), time() - 60);
                    setcookie("salario", $person->getSalary(), time() - 60);
                    setcookie("edad", $person->getAge(), time() - 60);
                }
                ?>
            </fieldset>
        </form>
    </body>
</html>
