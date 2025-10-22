<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/funciones.php");

inicioHtml("11. Sticky Forms", ["/estilos/general.css", "/estilos/formulario.css"]);

/* Sticky Forms
  ==============
   Formularios cuyos controles tienen como valores por defecto los enviados en una peticion anterior.
   
   La primera vez que se muestra el formulario, tiene valores en blanco o por defecto.

   Al enviar el formulario, se procesan los datos y se emplean los datos como valores por defecto en el siguiente formulario.
   
   Esto implica que en cada peticion se procesan los datos y ademas, se muestra otra vez el formulario
*/



function tema (string $codigo) : ? string {
  $temas = ['in' => 'Infraestructuras',
            'lc' => 'Limpieza de calles',
            'fe' => 'Feria',
            're' => 'Recogida de enseres'];
      if ( array_key_exists($codigo, $temas) )
          return $temas [$codigo];
      else 
          return null;
    }
            

$departamentos = ['op' => 'Obra publica',
                  'fe' => 'Festejos',
                  'sa' => 'Saneamiento'];

// $email = isset($_POST['email']) ? $_POST['email'] : '';
$email = $_POST['email'] ?? "";
$tema = $_POST['tema'] ?? "";
$departamento = $_POST['departamento'] ?? "";
$respuesta = isset($_POST['respuesta']) ? 'checked' : "";
$titulo = $_POST['titulo'] ?? "";
$sugerencia = $_POST['sugerencia'] ?? "";


if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  echo "<h3>Sugerencia recibida. Puede enviar otra si quiere</h3>";
  echo "<h4>Datos de la sugerencia del usuario</h4>";
  echo "<p>Email del usuario: $email<br>";
  echo "<p>Tema: " . tema($tema) . "<br>";
  echo "<p>Departamento: " . $departamentos[$departamento] . "<br>";
  echo "<p>Respuesta: " . ($respuesta ? 'El usuario desea respuesta por email' : 'El usuario no quiere respuesta') . "<br>";
  echo "<p>Título: $titulo<br>";
  echo "<p>Sugerencia: $sugerencia<br>";
}
?>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
  <fieldset>
    <legend>Registro de sugerencia del ciudadano</legend>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" size="30" value="<?=$email?>" >

    <label for="tema">Tema</label>
    <select name="tema" id="tema">
      <option value="">Elija un tema... </option>
      <option value="in" <?=$tema === 'in' ? 'selected' : ""?> >Infraestructuras</option>
      <option value="lc" <?=$tema === 'lc' ? 'selected' : ""?> >Limpieza de calles</option>
      <option value="fe" <?=$tema === 'fe' ? 'selected' : ""?> >Feria</option>
      <option value="re" <?=$tema === 're' ? 'selected' : ""?> >Recogida de enseres</option>
    </select>

    <label for="departamento">Departamento</label>
    <div>
      <input type="radio" name="departamento" id="departamento1" value="op" <?= $departamento === 'op' ? 'checked' : ""?> >Obra publica<br>
      <input type="radio" name="departamento" id="departamento2" value="fe" <?= $departamento === 'fe' ? 'checked' : ""?> >Festejos<br>
      <input type="radio" name="departamento" id="departamento3" value="sa" <?= $departamento === 'sa' ? 'checked' : ""?> >Saneamiento
    </div>
      
    <label for="respuesta">¿Quiere respuesta por email?</label>
    <input type="checkbox" name="respuesta" id="respuesta" value="Si" <?=$respuesta?> >

    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" size="40" value="<?=$titulo?>" >

    <label for="sugerencia">Sugerencia</label>
    <textarea name="sugerencia" id="sugerencia" rows="4" cols="40" placeholder="Indique su sugerencia"> <?=$sugerencia?> </textarea>
  </fieldset>
  <button type="submit" name="operacion" id="operacion" value="regsug">Registrar sugerencia</button>


<?php

finHtml();
?>