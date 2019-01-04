	<form action="<?=$_SERVER ['PHP_SELF']?>" method="POST"">
        <h2 style="text-align:center">Registro de Usuario</h2>
        
        <label for="nombreUsuario">Nombre de Usuario</label><?php if(isset($errores['nombreUsuario'])){echo "<br><span style='color:red;'>".$errores['nombreUsuario']."</span>";}?><br>
        <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario" value="<?php if(isset($_POST['nombreUsuario'])){echo $_POST['nombreUsuario'];}?>"><br>
        
        <label for="Contraseña">Contraseña</label><?php if(isset($errores['contrasena'])){echo "<br><span style='color:red;'>".$errores['contrasena']."</span>";}?><br>
        <input type="password" name="contrasena" placeholder="Contraseña" value="<?php if(isset($_POST['contrasena'])){echo $_POST['contrasena'];}?>"><br>
        
        <label for="Email">Email</label><?php if(isset($errores['email'])){echo "<br><span style='color:red;'>".$errores['email']."</span>";}?><br>
        <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"><br>
        
        <label for="Fecha de Nacimiento">Fecha de Nacimiento</label><?php if(isset($errores['fecha'])){echo "<br><span style='color:red;'>".$errores['fecha']."</span>";}?><br>
        <input type="date" name="fecha" placeholder="dia/mes/año" value="<?php if(isset($_POST['fecha'])){echo $_POST['fecha'];}?>"><br><br>
        
        <input type="submit" name="enviar">
    </form>