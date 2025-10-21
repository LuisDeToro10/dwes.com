<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/funciones.php");

inicioHtml("09. Proceso del formulario", ["/estilos/general.css"]);

echo "<h1>Proceso de la solicitud de empleo</h1>";

// Identificar el metodo de la peticion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo "<h3>Datos recibidos desde la peticion</h3>";
  echo "<p>Nombre: {$_POST['nombre']}<br>";
  echo "Email: {$_POST['email']}<br>";
  echo "Clave: {$_POST['clave']}<br>";
  echo "URL perfil: {$_POST['linkedin']}<br>";
  echo "Fecha disponibilidad: {$_POST['fecha_disponibilidad']}<br>";
  echo "Hora entrevista: {$_POST['hora_entrevista']}<br>";
  echo "Salario: {$_POST['salario']}<br>";

  $areas = $_POST['areas'];
  $areas_interes = [
  'ds' => 'Desarrollo Web',
  'dg' => 'Diseño grafico',
  'mk' => 'Marketing',
  'rh' => 'Recursos humanos'];
  $areas_usuario = "";
  foreach ($areas as $area) {
    $areas_usuario .= $areas_interes[$area] . " - ";
  }
  // echo "Areas de interes: " . implode(", ", $areas) . "<br>";
  echo "Areas de interes: " . $areas_usuario . "<br>";

  echo "Modalidad de contrato: {$_POST['modalidad']}<br>";
  echo "Tipo de contrato: {$_POST['tipo_contrato']}<br>";

  echo "Habilidades: " . implode(", ", $_POST['habilidades']) . "<br>";

  echo "Comentarios: {$_POST['comentarios']}<br>";
  echo "Operacion: {$_POST['operacion']}<br>";
  echo "</p>";
}
else {
  echo <<<ERROR
  <h3>Error en el envio del formulario</h3>
  <p>Solo puede acceder aqui a traves del formulario en este enlace <a href="/ra3/09formulario.php">09formulario.php</a></p>
  ERROR;
}





finHtml();
?>