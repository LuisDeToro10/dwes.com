<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Operadores y expresiones</title>
</head>

<body>
  <h1>Expresiones, operadores y operandos</h1>
  <p>Una expresion es una combinacion de operandos y operadores que arroja un resultado. Tiene un tipo de datos, que depende del tipo de datos de sus operandos y de la operacion realizada.<br>Un operador es un simbolo formado por uno, dos o tres caracteres que denota una operacion.<br>Los operadores pueden ser:
  <ul>
    <li>Unarios: solo necesitan un operando</li>
    <li>Binarios: necesitan 2 operandos</li>
    <li>Ternarios: utilizan 3 operandos</li>
  </ul>
  Un operando es una expresion en si misma, siendo la mas simple unn literal o una variable, pero tambien puede ser una valor devuelto por una funcion o el resultado de otra expresion.<br>Las operaciones de una expresion no se ejecutan a la vez, sino en un orden segun la precedencia (prioridad) y asociatividad del operador. Esto se puede cambiar a conveniencia.</p>
<h2>Operadores</h2>
<h3>Asignacion</h3>

<?php
// El operador de asignacion =
$numero = 45;
$resultado = $numero + 5 - 29;
$sin_valor = null;
?>

<h3>Aritmeticos</h3>

<?php
// + suma
// - resta
// * multiplicacion
// / division
// % modulo o resto de la division entera
// ** exponente

// UNARIOS
// + Conversion a entero
// - El opuesto

$numero1 = 15;
$numero2 = 18;
$suma = $numero1 + 10;
$resta = 25 - $numero2;
echo "<p>La suma de $numero1 y $numero2 es $suma, la resta es $resta</p>";

// El opuesto
$opuesto = -$numero1;
echo "<p>El opuesto de $numero1 es $opuesto</p>";

$resta = $numero2 - 75;
$opuesto = -$resta;
echo "<p>El opuesto de $resta es $opuesto</p>";

?>

<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>
<?php

?>

</body>

</html>