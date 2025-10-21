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

?>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
  <fieldset>
    <legend>Registro de sugerencia del ciudadano</legend>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" size="30">

    <label for="tema">Tema</label>
    <select name="tema" id="tema">
      <option value="">Elija un tema... </option>
    <option value="in">Infraestructuras</option>
    <option value="lc">Limpieza de calles</option>
    <option value="fe">Feria</option>
    <option value="re">Recogida de enseres</option>
    </select>

    <label for="departamento">Departamento</label>
    <div>
      <input type="radio" name="departamento" id="departamento1" value="op">Obra publica<br>
      <input type="radio" name="departamento" id="departamento2" value="fe">Festejos<br>
      <input type="radio" name="departamento" id="departamento3" value="sa">Saneamiento
    </div>
      
    <label for="respuesta">¿Quiere respuesta por email?</label>
    <input type="checkbox" name="respuesta" id="respuesta" value="Si">

    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" size="40">

    <label for="sugerencia">Sugerencia</label>
    <textarea name="sugerencia" id="sugerencia" rows="4" cols="40" placeholder="Indique su sugerencia"></textarea>
  </fieldset>
  <button type="submit" name="operacion" id="operacion" value="regsug">Registrar sugerencia</button>


<?php

finHtml();
?>