<?php ob_start() ?>
<h1>Post Añadido Correctamente</h1>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>