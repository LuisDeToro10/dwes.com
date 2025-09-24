<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tipos de datos</title>
</head>
<body>

<h1>Tipo de datos</h1>
<h2>Tipos escalares (primitivos)</h2>

<ul>
  <li>Booleanos</li>
  <li>Numerico entero</li>
  <li>Numerico en coma flotante</li>
  <li>Cadenas de caracteres</li>
</ul>

<h2>Tipos de datos compuestos</h2>
<ul>
  <li>Arrays</li>
  <li>Objetos</li>
  <li>Callable (funciones)</li>
  <li>Iterable</li>
</ul>

<h2>Tipos especiales</h2>
<ul>
  <li>Null</li>
  <li>Resource</li>
</ul>

<h2>Booleanos</h2>
<p>Inicialmente las constantes true y false son valores de tipo booleano. Sin embargo PHP extiende el significado de valor booleano a valor cierto y falsedad en otros tipos de datos.</p>
<ul>
  <li>Numerico entero: 0 y -0 es false, cualquier otro es true</li>
  <li>Numerico en coma flotante: 0.0 y -0.0 es false, cualquier otro es true</li>
  <li>Un array con 0 elementos es false, con elementos es true</li>
  <li>El tipo especial null es false, un valor distinto de null es true</li>
  <li>Una variable no definida es false</li>
  <li>La cadena vacia es false, cualquier otra es true</li>
</ul>

<?php
$valor_booleano = true;
$edad = 20;
$mayor_edad = $edad > 20;

echo "<p>Mayor de edad es booleano: " . is_bool($mayor_edad) . "</p>";

$dinero = 20;
// Pregunta si $dinero es != 0
if( $dinero ) echo "<p>Soy rico</p>";

$mi_nombre = "Juan";
// Pregunta si $mi_nombre es != de ""
if ($mi_nombre) echo "<p>Me llamo $mi_nombre</p>";
?>

<h2>Enteros</h2>
<p>En PHP los numeros enteros son de 32 bits. Pueden expresarse en diferentes notaciones</p>

<?php
$numero_entero = 1234;
echo "<p>El numero entero es $numero_entero</p>";

$numero_negativo = -123;
echo "<p>Un numero negativo precede con -: $numero_negativo</p>";

// Podemos expresar un numero en octal
$numero_octal = 0120;
echo "<p>El numero octal 0120 es en el sistema decimal: $numero_octal</p>";

// Puedo mostrar el numero en octal con la funcion decoct()
echo "<p>El numero octal 0120 expresado en octal es " . decoct($numero_octal) . "</p>";

// Numero en hexadecimal
$numero_hex = 0xAB9C;
echo "<p>El numero hexadecimal AB9C es en el sistema decimal: $numero_hex</p>";

// Puedo mostrar el numero en hexadecimal con la funcion dechex()
echo "<p>El numero hexadecimal AB9C expresado en hexadecimal es " . dechex($numero_hex) . "</p>";

// Un numero expresado en binario
$numero_binario = 0b10101010;
echo "<p>El numero binario 0b10101010 es: $numero_binario</p>";

// Puedo mostrar el numero en binario con la funcion decbin()
echo "<p>El numero binario 0b10101010 expresado en hexadecimal es " . decbin($numero_binario) . "</p>";

// Los numeros enteros se almacenan en memoria en el sistema decimal aunque los haya expresado en diferentes notaciones.

// Con cualquier funcion dec...() obtengo el numero en un sistema de numeracion
echo "<p>El numero binario $numero_binario en hexadecimal es " . dechex(($numero_binario)) . "</p>";

$numero_binario = 0b11111111; // El 255 en decinaml y FF en hexadecimal
echo "<p>El numero binario $numero_binario en hexadecimal es " . dechex(($numero_binario)) . "</p>";
?>

<h2>Numeros en coma flotante</h2>
<p>El separador decimal es el punto. y se pueden expresar numeros muy grandes o muy pequeños con notacion cientifica</p>

<?php
$pi = 3.14159;

echo "<p>El numero PI (relacion entre longitud y diametro de una circunferencia) es $pi</p>";
// Funcion round, redondea a 3.142
echo "<p>El numero PI pero con 3 decimales " . round($pi, 3) . "</p>";

$inf_int = 7.9e13; // 7.9 x 10¹³
echo "<p>La informacion que circula por internet en un dia es: $inf_int</p>";

$tamanho_virus = 0.2e-9;
echo "<p>El tamaño del virus es: $tamanho_virus</p>";
?>

<h2>Cadenas de caracteres</h2>
<p>El tipo string o cadena de caracteres es una serie de caracteres donde cada caracter equivale a un byte. PHP solo admite 256 caracteres, las cadenas estan en ASCII y no hay soporte UTF-8. Hay 4 formas de expresar una cadena de caracteres:</p>
<ul>
  <li>Comillas simples</li>
  <li>Comillas dobles</li>
  <li>Cadena Heredoc</li>
  <li>Cadena Nowdoc</li>
</ul>

<h3>Comillas simples</h3>

<?php
// Una cadena de caracteres entre comillas simples no reconoce ningun caracter de escape excepto el de la propia comilla simple \' y \\ y ademas, no podemos interpolar variables
echo '<p>Esto es una cadena sencilla</p>';
echo '<p>Puedo poner una cadena
en varias lineas
porque la sentencia
no acaba hasta
el punto y coma</p>';

// No se reconocen caracteres de escape salvo \'
// La primera \ es para que reconozca el siguiente caracter que puede ser ' o \
echo '<p>El mejor pub irlandes es O\'Donnel</p>';
echo '<p>La raiz del disco duro en Windows es C:\</p>'; // Aqui no sale C:\\ sino C: unicamente
echo '<p>La raiz del disco duro en Windows es C:\\</p>';

echo '<p>Esta cadena tiene salto\n de linea</p>';

// No interpola variables
echo '<p>Hola, $mi_nombre, ¿como estas?</p>';
?>

<h3>Comillas dobles</h3>
<p>Es la forma habitual de expresar cadenas de caracteres, ya que expande los caracteres de escape y las varibales</p>

<?php
$cadena = "Esto es una cadena con comillas dobles";
echo "<p>Es una cadena un objeto? " . is_object($cadena) . "</p>";
if (is_object($cadena)) echo "<p>La cadena es objeto</p>";
else echo "<p>La cadena no es un objeto</p>";

$con_secuencias = "<p>\t\tEl simbolo \$ se emplea para las variables \n y si lo quieres en una cadena hay que escaparlo con \\. Es mejor usar \" para delimitar las cadenas en lugar de '</p>";

echo $con_secuencias;
?>

<h3>Cadenas HEREDOC</h3>
<p>Es una cadena muy larga, incluyendo saltos de linea que se respetan, que comienza por <<< y un identificador (generalmente en mayusculas). Justo despues hay un salto de linea y se escribe la cadena, con saltos de linea que sean necesarios, con interpolacion de variables y caracteres de escape. Para finalizar la cadena se hace un salto de linea y se vuelve a poner el mismo identificador</p>

<?php
$cadena_hd = <<<CADENAHD
<p>Esto es una cadena
HEREDOC que respeta los
saltos de linea, le puedo
poner variables como $mi_nombre y
ademas secuencias de escape. El
identificador no necesita \$ y tampoco
usamos \", simplemente la escribimos y
acabamos con un salto de linea mas el
identificador</p>
CADENAHD;

echo <<<TABLA
<table>
  <caption>Tabla de prueba</caption>
  <thead>
    <tr>
      <th>Referencia</th><th>Descripcion</th><th>PVP</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
TABLA;

?>

<h3>Cadenas NOWDOC</h3>
<p>La cadena NOWDOC es como la HEREDOC pero con comillas simpleas, no se interpolan variables, ni se reconocen secuencias de escape mas alla de la \ y '. NO se respetan los saltos de linea</p>

<?php
// El identificador tiene que ir entre comillas simples 'ND', en heredoc nada
$cadena_nd = <<<'ND'
<p>Esta es una cadena NOWDOC
y el salto de linea no lo respeta,
no puedo meter variables
y solo reconoce \\ y \'</p>
ND;
?>

</body>
</html>