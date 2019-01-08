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
    <header>
        <div id="logo"><img src="img/cloud.png" alt="" width="100px"></div>
        <div id="tittle"><h1>NUBEX</h1></div>
        <div id="bienvenido"><?php if(isset($_SESSION['nombre'])){echo $_SESSION['nombre'];}?></div>
    </header>
    <nav>
        <div class="nav-item"><a href="index.php?ctl=inicio">Inicio</a></div>
        <?php if(!isset($_SESSION['nombre'])){echo "<div class='nav-item'><a href='index.php?ctl=registro'>Registrarse</a></div>";}?>
        <?php if(!isset($_SESSION['nombre'])){echo "<div class='nav-item'><a href='index.php?ctl=login'>Iniciar Sesion</a></div>";}?>
        <?php if(isset($_SESSION['nombre'])){echo "<div class='nav-item'><a href='index.php?ctl=subir'>Mi Nubex</a></div>";}?>
        <?php if(isset($_SESSION['nombre'])){echo "<div class='nav-item'><a href='index.php?ctl=destroy'>Cerrar Sesion</a></div>";}?>
        <div class="nav-item"><a href="index.php?ctl=nosotros">Nosotros</a></div>
    </nav>
    <main>
        <?php echo $contenido?>
    </main>
    <footer>
        Footer
    </footer>
</body>
</html>
