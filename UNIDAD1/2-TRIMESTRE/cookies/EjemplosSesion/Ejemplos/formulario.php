<?php
//Iniciamos sesión
session_start();
?>

<form action="procesa.php" id="forma1" method="post">
<input type="text" name="nombre" value=
"<?php if (isset ($_SESSION['nombre'])) 
echo $_SESSION['nombre']; ?>" 
/>
<input type="submit" value="Enviar" />
</form>
