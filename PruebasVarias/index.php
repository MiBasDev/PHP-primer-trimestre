<?php

$var1 = 5;
$var2 = 7.18;
$b = true;
$a1 = array(5, "eh", 7.18);
echo var_dump($a1);
echo "<br/>";
$o = new class() {

    public $var3 = 5;
};
var_dump($o);
echo "<br/>";
$n = null;
var_dump($n);
echo "<br/>";
echo "<br/>";

for ($i = 0; $i <= 10; $i++) {
    if ($i == 4) {
        break;
    }
    echo "número " . $i;
    echo "<br/>";
}
