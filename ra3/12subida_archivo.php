<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/funciones.php");



/* SUBIDA DE ARCHIVOS
====================

  - Un formulario permite subir un archivo si:
    * Se añade al elemento <form> el atributo enctype="multipart/form-data" al formulario
    * Hay al menos un elemento <input type="file" ...>

  - Puede haber varios <input type="file" ...> y entonces se suben varios archivos

  - ¿Que tamaño maximo puede tener un archivo subido?
    Siempre hay que poner un limite a la subida de archivos

    Las directivas relacionadas con la subida de archivos en php.ini:
    - file_uploads  <bool>      --> On, la subida esta activada, Off la subida no esta activada.
    - upload_max_filesize <int> --> Por defecto 2MB. Tamaño maximo de archivo subido.
    - max_file_uploads <int>    --> Nº maximo de archivos que se pueden subir en una peticion.
    - post_max_size <int>       --> Tamaño maximo de la peticion POST. Por defecto 8MB.
    - upload_tmp_dir <dir>      --> Directorio donde se almacenan de forma temportal los archivos subidos. Por defecto: C:\TEMP (Windows) , /tmp (Linux)
    
    Todos los parametros anteriores se configuran editanto el archivo php.ini. En este caso, el cambio afecta a todas las aplicaciones que se ejecuten en el servidor y haria falta un reinicio de Apache.

    Ademas del limite de tamaño establecido con upload_max_filesize tengo otros limites:
    - Duro      --> Directiva upload_max_filesize.
    - Blando    --> Usar un campo oculto de formulario llamado MAX_FILE_SIZE (en bytes).
    - Usuario   --> El desarrollador puede establecer limites en campos ocultos. Viene bien cuando quiero poner un limite diferente para
                    diferentes tipos de archivos. PHP no lo controla, queda bajo responsabilidad del desarrollador.

                    - Como se procesa un archivo subido. Que tiene que hacer el script que recibe los datos del formulario con el archivo.
      1. Disponemos del array superglobal $_FILES que almacena los archivos subidos.
      2. El usuario ha incluido en el formulario un archivo para subir.
      3. El tamaño del archivo esta dentro de los limites. Lo controla PHP automaticamente.
      4. El tamaño del archivo esta dentro de los limites establecidos por el usuario. Se controla en el script PHP que recibe el archivo.
      5. El archivo es del tipo requerido. 

      Lo habitual es guardar el archivo subido. Tambien, puede abrirse el archivo, acceder a su contenido y procesarlo sin llegar a guardarlo.

      Si vamos a guardar, necesitamos un directorio para guardarlo, el directorio de subida de archivos. En este caso, el usuario del SO que ejecuta Apache (www-data) tiene que tener permiso de escritura sobre el directorio de subida.

    El directorio de subida, tiene que existir cuando se guarde el archivo. Puede crearse en el mismo script que guarda el archivo, pero antes de guardarse. Si se crea el directorio de subida, el usuario del SO que ejecuta Apache (www-data) tiene que tener permiso de escritura sobre el directorio padre.
    
    Enfoque del script:
    - Pagina autoprocesada o autogenerada.
    - Se suben archivos de forma ciclica.
    - Peticion GET: Se presenta el formulario.
      - Peticion POST:
        * Procesamos la subida del archivo.
        * Si hay algun error, se presenta la salida producida hasta el momento 
        * Si el directorio de subida no existe, se crea.
        * Si no hay error, se guarda el archivo y se vuelve a presentar el formulario.
*/

// Formulario de enviar CV a una empresa. Se envia un archivo PDF con el CV y un archivo JPG con la foto.
// Limite para el PDF: 256KB
// Limite para el JPG: 512KB

define("DIRECTORIO_SUBIDA", $_SERVER['DOCUMENT_ROOT'] . "/archivos_cv");

inicioHtml("12. Subida de Archivos", ["/estilos/general.css", "/estilos/formulario.css"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Procesamos el formulario
  // 1º Comprobamos si el directorio de subida existe. Si no existe, lo creamos.
  if (!file_exists(DIRECTORIO_SUBIDA) && !is_dir(DIRECTORIO_SUBIDA)) {
    // No existe, lo creamos
    if (!mkdir(DIRECTORIO_SUBIDA, 0775)) {
      echo "<h3>Error en la creacion del directorio de subida.</h3>";
      exit(1);
    }
  }


  // 2º Acceder al archivo subido
  // Array superglobal $_FILES
  /* Contiene la informacion de los archivos subidos. Es un array asociativo donde la clave de indexacion es el nombre del campo file del formulario.

    <input type="file" name="archivo_cv" ...>    --> CLave de indexacion es archivo_cv

    Cada elemento del array contiene informacion del archivo en otro array asociativo:
      - name        --> Nombre original del archivo en el cliente.
      - type        --> Tipo MIME del archivo,
      - size        --> Tamaño en bytes del archivo.
      - tmp_name    --> Nombre del archivo temporal del servidor.
      - error       --> Codigo numerico indicando si hubo algun error, que tipo de error o si no lo hubo.
    */

  // Comprobamos si ha una clave para el archivo de subida.
  if (!isset($_FILES['archivo_cv'])) {
    echo "<h3>Error en la subida de archivo. El nombre del control de formulario no es valido.</h3>";
    exit(2);
  }

  // Existe la clave del archivo
  echo <<<ARCHIVO
    <p>Nombre de archivo: {$_FILES['archivo_cv']['name']}<br
    Tipo de archivo: {$_FILES['archivo_cv']['type']}<br>
    Tamaño (bytes): {$_FILES['archivo_cv']['size']}<br>
    Archivo temporal: {$_FILES['archivo_cv']['tmp_name']}<br>
    Código de error: {$_FILES['archivo_cv']['error']}</p>
  ARCHIVO;

  if ( $_FILES['archivo_cv']['error'] === UPLOAD_ERR_FORM_SIZE ) {
    echo "<h3>Error en la subida de archivo. El tamaño del archivo supera MAX_FILE_SIZE.</h3>";
    exit(3);
  }

  if ( $_FILES['archivo_cv']['error'] === UPLOAD_ERR_INI_SIZE ) {
    echo "<h3>Error en la subida de archivo. El tamaño del archivo supera el limite en php.ini.</h3>";
    exit(4);
  }

  if ( $_FILES['archivo_cv']['error'] === UPLOAD_ERR_NO_FILE ) {
    echo "<h3>Error en la subida de archivo. EL usuario no ha proporcionado un archivo.</h3>";
    exit(5);
  }

  if ( $_FILES['archivo_cv']['error'] === UPLOAD_ERR_OK ) {
    echo "<h3>Error en la subida de archivo.</h3>";
    exit(4);
  }
}

// Presenta el formulario
?>

<h3>Registro de CV de demandantes de empleo</h3>
<form method="POST" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">
  <!-- Limite blando de PHP. 1MB -->
  <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="<?= 1024 * 1024 ?>">
  <fieldset>
    <label for="dni">DNI</label>
    <input type="text" name="dni" id="dni" size="10">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" size="40">

    <label for="archivo_cv">Archivo CV (solo PDF's)</label>
    <input type="file" name="archivo_cv" id="archivo_cv" size="50" accept="application/pdf">

    <label for="archivo_png">Foto</label>
    <input type="file" name="archivo_png" id="archivo_png" size="50" accept="image/png">
  </fieldset>

  <input type="submit" name="operacion" id="operacion" value="Enviar">
</form>

<?php
finHtml();
?>