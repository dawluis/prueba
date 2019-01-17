<?php
if(isset($_SESSION['nombre'])){?>
 
 <h3><?php echo  $mensaje ?></h3>
 <a href='index.php?ctl=subir'>PULSE AQUI PARA VOLVER</a>

<?php $contenido = ob_get_clean();
}else{
    $contenido = "NECESITA ESTAR LOGEADO PARA ACCEDER A ESTA PAGINA";
}
?>
<?php include 'layout.php' ?>
?>
