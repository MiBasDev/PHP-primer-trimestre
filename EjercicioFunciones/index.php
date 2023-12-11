<body style="background-color:rgba(125, 125, 155);">
    <?php
    /**
     * @author Miguel Bastos Gándara.
     */
    /*
      COMO CREAR FUNCIONES

      Crear funciones en php es sencillo, crear funciones no es otra cosa que darle un nombre a unas líneas de código para poder llamarlas mas tarde.
      Para nombrar las líneas de código con PHP y definirlas como función haremos lo siguiente:


      function nombre_de_mi_funcion() {
      //líneas de código que pertenecen a la función
      }


      Ejemplo:

      function primera_funcion() {
      echo 'Hola mundo';
      }


      Para lanzar la función tan solo tengo que indicar su nombre y paréntesis:

      primera_funcion();


      Las funciones pueden tener argumentos de entrada:

      function sumar_con_Parametros ( $var1, $var2, $var3 ) {
      $suma = $var1 + $var2 + $var3;
      echo 'La suma de los tres números es : ' . $suma . ';
      }


      En el ejemplo anterior:

      function sumar_con_Parametros ( int $var1, int $var2, int $var3 ) {
      $suma = $var1 + $var2 + $var3;
      echo 'La suma de los tres números es : ' . $suma . ';
      }


      Tambien podemos hacer que las funciones nos devuelven valores:


      function sumar_con_Parametros ( int $var1, int $var2, int $var3 ) {
      $suma = $var1 + $var2 + $var3;
      return $suma;
      }


      Podemos tambien pasar variables por referencia y conseguir cambiar la variable añadiendo "&" al argumento.
      Ejemplo:

      function añadir_cinco(&$value) {
      $value += 5;
      }

      $num = 2;
      añadir_cinco($num);
      echo $num;


     */
    ?>

    <h1>Ejercicios "Funciones"</h1>

    <h3>1. Cilindro</h3>

    <?php
    /*
      Crea una función que reciba como parámetros el valor del radio de la base y la altura de un cilindro y devuelva el volumen del cilindro,
      teniendo en cuenta que el volumen de un cilindro se calcula como Volumen = númeroPi * radio * radio * Altura
      siendo númeroPi = 3.1416 aproximadamente.
      Utiliza float
     */

    /**
     * Función que calcula el volumen de un cilindro.
     * @param type $radio Radio del cilindro.
     * @param type $altura Altura del cilindro.
     * @return type Volumen del clindro.
     */
    function volumenCilindro($radio, $altura) {
        return pi() * ($radio * $radio) * $altura;
    }

    // Sacamos por pantalla el volumen del cilindro.
    echo "El radio del círculo es " . volumenCilindro(3, 4);
    ?>


    <h3>2. Máximo valor del array</h3>

    <?php
    /*
      Haya en una función el valor máximo de un array de ints, pasando como argumento el vector
     */
    // Declaramos un array de números.
    $array = array(1, 2, 7, 4, 5, 3, 6);

    /**
     * Función que devuelve el valor numérico máximo de un array.
     * @param type $arrayNums Array en el que buscar el máximo.
     * @return type Número mayor del array.
     */
    function maxValue($arrayNums) {
        return max($arrayNums);
    }

    /**
     * Función que devuelve el valor numérico máximo de un array.
     * @param type $arrayNums Array en el que buscar el máximo.
     * @return type Número mayor del array.
     */
    function maxValueV2($arrayNums) {
        $max = 0;
        foreach ($arrayNums as $value) {
            if ($value >= $max) {
                $max = $value;
            }
        }
        return $max;
    }

    // Sacamos por pantalla el valor máximo del array.
    echo "El valor máximo del array es (con max()): " . maxValue($array) . "</br>";
    echo "El valor máximo del array es: " . maxValueV2($array);
    ?>


    <h3>3. Ordenar array</h3>

    <?php
    /*
      Realiza una función que, dado un array de integers, me muestre por pantalla el array ordenado de mayor e menos número
     */

    /**
     * Función que ordena un Array de números.
     * @param type $arrayNums Array de números a ordenar.
     * @return string Array de números ordenado.
     */
    function ordenarArray($arrayNums) {
        rsort($arrayNums);
        $result = "";
        foreach ($arrayNums as $value) {
            $result .= $value . " ";
        }
        return $result;
    }

    /**
     * Función que ordena un Array de números.
     * @param type $arrayNums Array de números a ordenar.
     * @return string Array de números ordenado.
     */
    function ordenarArrayV2($arrayNums) {
        $arraySorted = [];
        $arraypositions = [];
        for ($i = 0; $i < count($arrayNums); $i++) {
            $max = PHP_INT_MIN;
            $position = PHP_INT_MIN;
            for ($index = 0; $index < count($arrayNums); $index++) {
                if ($arrayNums[$index] >= $max && !in_array($index, $arraypositions)) {
                    $max = $arrayNums[$index];
                    $position = $index;
                }
            }
            array_push($arraySorted, $max);
            array_push($arraypositions, $position);
        }
        $result = "";
        foreach ($arraySorted as $value) {
            $result .= $value . " ";
        }
        return $result;
    }

    // Sacamos pro pantalla el resultado de ordenar el array.
    echo "El array ordenado de mayor a menor sería (con sort()): " . ordenarArray($array) . "</br>";
    echo "El array ordenado de mayor a menor sería: " . ordenarArrayV2($array);
    ?>


    <h3>4. Función dentro de función</h3>

    <?php
    /*
      Ya que se puede usar una función dentro de otra función, realiza una calculadora en una función que tenga como parametros
      tres variables: num1, num2 y "Operación". Donde la operación sea un string que nos indica cual de las 4 operaciones basicas
      queremos hacer. Esa calculadora hazla llamando a 4 funciones:
      sumar($n1, $n2);
      restar($n1, $n2);
      multiplicar($n1, $n2);
      dividir($n1, $n2);

     */

    /**
     * Función que hace diferentes operaciones según el operador pasado como 
     * parámetro.
     * @param type $num1 Número 1 con el que calcular.
     * @param type $num2 Número 2 con el que calcular.
     * @param type $operation Operador para la operación a llevar a cabo.
     * @return string Resultado de la operación realizada.
     */
    function operations($num1, $num2, $operation) {
        $result = 0;
        switch ($operation) {
            case "+":
                $result = sumar($num1, $num2);
                break;
            case "-":
                $result = restar($num1, $num2);
                break;
            case "*":
                $result = multiplicar($num1, $num2);
                break;
            case "/":
                $result = dividir($num1, $num2);
                break;
            default:
                return "Operación no válida";
        }
        return $result;
    }

    /**
     * Función que suma dos números.
     * @param type $num1 Número 1 que sumar.
     * @param type $num2 Número 2 que sumar.
     * @return type Resultado de la suma de los números.
     */
    function sumar($num1, $num2) {
        return $num1 + $num2;
    }

    /**
     * Función que resta dos números.
     * @param type $num1 Número 1 que restar.
     * @param type $num2 Número 2 que restar.
     * @return type Resultado de la resta de los números.
     */
    function restar($num1, $num2) {
        return $num1 - $num2;
    }

    /**
     * Función que multiplica dos números.
     * @param type $num1 Número 1 que multiplicar.
     * @param type $num2 Número 2 que multiplicar.
     * @return type Resultado de la multiplicación de los números.
     */
    function multiplicar($num1, $num2) {
        return $num1 * $num2;
    }

    /**
     * Función que divide dos números.
     * @param type $num1 Dividendo.
     * @param type $num2 Divisor.
     * @return type Resultado de la división de los números.
     */
    function dividir($num1, $num2) {
        return $num1 / $num2;
    }

    // Sacamos por pantalla los resultados.
    echo "La operación de 5 + 10 = " . operations(5, 10, "+") . "</br>";
    echo "La operación de 10 - 5 = " . operations(10, 5, "-") . "</br>";
    echo "La operación de 5 * 10 = " . operations(5, 10, "*") . "</br>";
    echo "La operación de 10 / 5 = " . operations(10, 5, "/") . "</br>";
    ?>


</body>