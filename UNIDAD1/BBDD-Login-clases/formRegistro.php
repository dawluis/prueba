<form action="<?=$_SERVER ['PHP_SELF']?>" method="POST">
	USUARIO: <input type="text" name="user" value="<?php if(isset($_POST['user'])){echo $_POST['user'];}?>"><?php if(isset($errores['nombre'])){echo $errores['nombre'];}?><br>
	CONTRASEÑA: <input type="text" name="password"><br>
	USUARIO AMIGO 1 <input type="text" name="user_amigo1"><br>
	EMAIL AMIGO 1 <input type="text" name="email_amigo1"><br>
	USUARIO AMIGO 2 <input type="text" name="user_amigo2"><br>
	EMAIL AMIGO 2 <input type="text" name="email_amigo2"><br>
	<input type="submit" name="enviar" value="Log In">
</form>