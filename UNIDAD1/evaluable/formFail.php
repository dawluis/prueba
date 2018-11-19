<h2>Mi pagina</h2>
<h3>Alta como usuario</h3>
<form action="<?=$_SERVER ['PHP_SELF'] //el archivo actual?>" method="POST" enctype="multipart/form-data">
Tu nombre <br> <input type="text" name="nombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];}?>"><?php if(isset($errores['nombre'])){echo $errores['nombre'];}?>
<br>
 Nombre Usuario <br> <input type="text" name="nombreUsuario" value="<?php if(isset($_POST['nombreUsuario'])){echo $_POST['nombreUsuario'];} ?>"><?php if(isset($errores['nombreUsuario'])){echo $errores['nombreUsuario'];}?>
<br>
Contraseña <br> <input type="password" name="contrasena" value="<?php if(isset($_POST['contrasena'])){echo $_POST['contrasena'];}?>"><?php if(isset($errores['contrasena'])){echo $errores['contrasena'];}?>
<br>
Email<br><input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" ><?php if(isset($errores['email'])){echo $errores['email'];}?>
<br>
Fecha de nacimiento <br> <input type="date" name="fecha" value="<?php if(isset($_POST['fecha'])){echo $_POST['fecha'];}?>"><?php if(isset($errores['fecha'])){echo $errores['fecha'];}?>
<br>
foto de perfil <br> <input type="file" name="img">
<?php 
if(isset($errores['img'])){
    echo $errores['img'];
}else if(is_array($resultadoSubida)){
    print_r($resultadoSubida);
}
?>
<br> <br>
<input type="submit" name="enviar">
</form>
        