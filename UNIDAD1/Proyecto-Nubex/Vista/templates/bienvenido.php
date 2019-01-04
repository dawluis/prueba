<?php ob_start();?>
<h1>Bienvenido <?php echo $_SESSION['nombre']?></h1>
<h4>Subir un archivo</h4>
<?php if(isset($resultado)&& $resultado!=1){echo $resultado."<br>";}?>
 <form action="index.php?ctl=subir" method="POST" class="form-container" enctype="multipart/form-data">
 	 Publico <input type="radio" name="tipo" value="publico">
 	 Privado <input type="radio" name="tipo" value="privado">
     <input type="file" name="archivo">
     <input type="submit" name="enviar" value="SUBIR">
 </form>

<h3>Tus archivos subidos</h3>
<?php 
while($resultado = $res->fetch()){
    echo "<div class='caja-archivo'><a href='/../UNIDAD1/Proyecto-Nubex/Archivos/".$_SESSION['nombre']."/".$resultado['nombre_archivo']."' download>".$resultado['nombre_archivo']."</a></div>";
}
    
    
?>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>