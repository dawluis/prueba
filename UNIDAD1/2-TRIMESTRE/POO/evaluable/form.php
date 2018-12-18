<h2>Mi pagina</h2>
<h3>Alta como usuario</h3>
    <form action="<?=$_SERVER ['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        Tu numero <br> <input type="number" name="nombre" >
        <br>
        Nombre Usuario <br> <input type="text" name="nombre" >
        <br>
        Contraseña <br> <input type="password" name="contrasena" >
         <br>
         <br> Email <br> <input type="text" name="email" >
        <br>
        <input type="submit" name="enviar">
    </form>