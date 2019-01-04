<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>formulario-registro</title>
</head>
<body>
<header>NUBEX</header>
 <nav>
        <ul>
            <li><a href="index.php?ctl=inicio">Inicio</a></li>
             <?php if(!isset($_SESSION['nombre'])){echo "<li><a href='index.php?ctl=registro'>Registrarse</a></li>";}?>
             <?php if(!isset($_SESSION['nombre'])){echo "<li><a href='index.php?ctl=login'>Iniciar Sesion</a></li>";}?>
             <?php if(isset($_SESSION['nombre'])){echo "<li><a href='index.php?ctl=subir'>Mi Nubex</a></li>";}?>
        </ul>
    </nav>
    <?php if(isset($_SESSION['nombre'])){echo "<a href='index.php?ctl=destroy'>Cerrar Sesion</a>";}?>

 <?php echo $contenido?>
</body>
</html>
