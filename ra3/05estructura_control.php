<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estructuras de control</title>
</head>

<body>
  <h1>Estructuras de control</h1>
  <h2>Sentencias</h2>
  <p>Las sentencias simples acaban en ; , pudiendo haber mas de una en una misma linea</p>

  <?php
  $numero = 3;
  echo "<p>El numero es $numero<br>";
  $numero += 3;
  print "Ahora es $numero</p>";
  ?>

  <p>Un bloque de sentencias es un conjunto de sentencias simples encerradas entre llaves. No suelen ir sueltas, sino formar parte de una estructura de control. Ademas, se pueden anidar</p>

  <?php {
    $numero = 5;
    echo "<p>El numero es $numero<br>";
    $numero -= 2;
    echo "<p>El numero es $numero<br>"; {
      $numero = 8;
      $numero *= 2;
      echo "<p>El numero es $numero<br>";
    }
  }
  ?>

  <h3>Estructura condicional simple</h3>

  <?php
  /* SINTAXIS:
  
    if (<condicion>) <sentencia>;
  */

  $numero = 4;
  if ($numero >= 4) echo "<p>El numero es mayor o igual a 4</p>";

  if ($numero === 4 and $numero %2 === 0)
    echo "<p>El numero es igual a 4 y por tanto numero par</p>";
  ?>

</body>

</html>