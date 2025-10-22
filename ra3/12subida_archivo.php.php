<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/include/funciones.php");

inicioHtml("12. Subida de Archivos", ["/estilos/general.css", "/estilos/formulario.css"]);


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
    - post_max_size <int>       --> Tamaño maximo de la peticion POST.

*/




finHtml();