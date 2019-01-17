	<?php ob_start() ?>
	<form action="index.php?ctl=registro" method="POST" class="form-container">
        <h2 style="text-align:center">Registro de Usuario</h2>
		<?php if(isset($resultado)){echo "<br><span style='color:red;'>".$resultado."</span><br>";}?>
        <label for="nombreUsuario">Nombre de Usuario</label><?php if(isset($errores['nombreUsuario'])){echo "<br><span style='color:red;'>".$errores['nombreUsuario']."</span>";}?><br>
        <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario" value="<?php if(isset($_POST['nombreUsuario'])){echo $_POST['nombreUsuario'];}?>"><br>
        
        <label for="Contrasena">Contraseña</label><?php if(isset($errores['contrasena'])){echo "<br><span style='color:red;'>".$errores['contrasena']."</span>";}?><br>
        <input type="password" name="contrasena" placeholder="Contraseña" value="<?php if(isset($_POST['contrasena'])){echo $_POST['contrasena'];}?>"><br>
        
        <label for="Email">Email</label><?php if(isset($errores['email'])){echo "<br><span style='color:red;'>".$errores['email']."</span>";}?><br>
        <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"><br>
        
        <input type="submit" name="enviar">
    </form>
    <?php $contenido = ob_get_clean() ?>
    <?php include 'layout.php' ?>