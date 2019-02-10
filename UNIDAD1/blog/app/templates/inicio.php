<?php ob_start() ?>
<h1>Inicio</h1>
<p>BIENVENIDO AL BLOG DE NOTICIAS</p>
<?php 
if (!$xml = simplexml_load_file('../app/noticias.xml')) {
     
    echo "No se ha podido cargar el archivo";
} else {
    echo "El archivo se ha cargado correctamente";
    echo '</br><pre>';
    print_r($xml);
    echo '</pre>';
    foreach ($xml->xpath("//item") as $noticia) {
        echo 'Titulo: ' . $noticia->titulo . '<br>';
        echo 'Autor: ' . $noticia->autor . '<br>';
        echo 'Contenido: ' . $noticia->titulo . '<br>';
    }
}

?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>