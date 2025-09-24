<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Elementos del lenguaje</title>
</head>
<body>
    <h1>Elementos del lenguaje</h1>
    <h2>Entrada y Salida</h2>
    <p>La entrada de datos en PHP es con un formulario o enlace. La salida siempre se produce con la funcion echo, y su forma abreviada y la funcion print.

    Ademas, tenemos la funcion printf para salido con formato.
    </p>
    <h3>Funcion echo</h3>

<?php
echo "<p>La funcion echo emite el resultado de una expresion a la salida (del servidor al cliente web). Se puede usar como funcion o como construccion del lenguaje (sin parentesis)</p>";

echo "<p>Esto es un parrafo HTML enviado con echo</p>";

$nombre = "Juan";
echo "<p>Hola, $nombre, ¿cómo estás?</p>";

echo ("<p>Hola, $nombre, ¿cómo estás?</p>");

// Quiero un salto de linea al final de la linea
echo "<p>Hola, esta linea acaba en un salto \n";
echo "Supuestamente esta linea es la siguiente a la anterior \n y esta va despues</p>";

$nombre = "Jose";
$apellidos = "Gómez";
echo "<br>Mi nombre es $nombre y mi apellido es $apellidos<br>";
echo "<br>Mi nombre es " . $nombre . "y mi apellido es " . $apellidos . "<br>";

echo "<br>Uno mas dos son " . 1 + 2 . " y tiene que haber salido 3 <br>";

echo "<h4>Forma abreviada de echo</h4>";
echo "<p>Cuando hay que enviar a la salida el resultado de una expresion pequeña disponemos de la forma abreviada de echo que permita intercalarse en el codigo HTML con menos esfuerzo y mas legible</p>";

$tiene_portatil = true;
?>

<!-- Estamos en modo HTML -->
<p>Mi nombre es <?= $nombre . " " . $apellidos ?> y estoy programando en PHP</p>

<!-- Uso habitual de echo abreviado es en los formularios -->
 <input type="text" size="30" name="nombre" id="nombre" value="<?=$nombre?>">
 <input type="checkbox" name="portatil" id="portatil" <?= $tiene_portatil ? "checked" : ""?> >

<?php
// Que ocurre si tengo que enviar a la salida codigo HTML con cadenas de caracteres
// "PHP comillas dobles" y para 'HTML comillas simples'
echo "<input type='text' name='apellidos' id='apellidos' size='30'>";
?>

<!-- Funcion print -->
<h4>Funcion print</h4>
<p>Funciona como echo</p>

<?php
print "<p>Esto es una cadena\n que tiene mas de una linea\n y se envia a la salida</p>";

$pi = 3.14159;
$radio = 3;
$circunferencia = 2* $pi * $radio;
print "<p>La longitud de la circunferencia de radio $radio es $circunferencia</p>";

// La funcion printf permite dar salida con formato
echo "<h4>Funcion printf()</h4>";
printf("<br>La circunferencia de radio %d es %f", $radio, $circunferencia);
printf("<br>La circunferencia de radio %d es %10.2f", $radio, $circunferencia);
printf("<br>La circunferencia de radio %d es %010.2f", $radio, $circunferencia);
printf("<br>La circunferencia de radio %d es %1$010.2f", $radio, $circunferencia);
?>

</body>
</html>