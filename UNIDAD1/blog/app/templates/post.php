<?php ob_start() ?>
<h2>Añade una nueva noticia al blog</h2>

<p>AQUI PODRAS AÑADIR UNA NUEVA NOTICIA</p>

<form action="index.php?ctl=addPost" method="POST">
	Autor:<br>
	<input type="text" name="autor"><br>
	Titulo:<br>
	<input type="text" name="titulo"><br>
	Contenido:<br>
	<input type="text" name="contenido" style="width:100%; height:150px"><br><br>
	
	<input type="submit" value="Add Post" name="postea">
</form>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>