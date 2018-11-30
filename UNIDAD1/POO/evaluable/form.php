<h2>Mi pagina</h2>
<h3>Alta como usuario</h3>
    <form action="<?=$_SERVER ['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        Tu nombre <br> <input type="text" name="nombre" >
        <br>
        Nombre Usuario <br> <input type="text" name="nombreUsuario" >
        <br>
        Contraseña <br> <input type="password" name="contrasena" >
         <br>
        Email <br> <input type="email" name="email" >
        <br>
        <input type="submit" name="enviar">
    </form>