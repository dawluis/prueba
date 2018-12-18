<h2>SELECCIONE CONSULTA DE DATOS</h2>
<form action="<?=$_SERVER ['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
<input type="radio" name="seleccion" value="mostrarUsuarios">Mostrar Usuarios<br>
<input type="radio" name="seleccion" value="mostrarImagenes">Mostrar Imagenes<br>
<input type="submit" name="consulta">
</form>