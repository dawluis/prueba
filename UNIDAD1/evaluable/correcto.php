<?php
if(!isset($_REQUEST['consulta'])){
  ?>
  <form action="<?=$_SERVER ['PHP_SELF'] //el archivo actual?>" method="POST" enctype="multipart/form-data">
          <input type="radio" name="seleccion" value="mostrarUsuarios">Mostrar Usuarios<br>
          <input type="radio" name="seleccion" value="mostrarImagenes">Mostrar Imagenes<br>
          <input type="submit" name="consulta">
    </form>

  <?php
}else{
    if(isset($_REQUEST['seleccion'])){
        $seleccion=$_REQUEST['seleccion'];
        if($seleccion=="mostrarUsuarios"){
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'r+');
            
            while(!feof($file)){
                
                $linea=fgets($file);
                $usuario=preg_split('/;/', $linea);
                echo $usuario[0];
            }
        }else if($seleccion=="mostrarImagenes"){
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'r+');
            
            while(!feof($file)){
                $linea=fgets($file);
                $usuario=preg_split('/;/', $linea);
                echo "<img src='".$usuario[4]."'><br>";
        }
    }else{
        ?>
        <h4>SELECCIONA UNO</h4>
        <form action="<?=$_SERVER ['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <input type="radio" name="seleccion" value="mostrarUsuarios">Mostrar Usuarios<br>
        <input type="radio" name="seleccion" value="mostrarImagenes">Mostrar Imagenes<br>
        <input type="submit" name="consulta">
        </form>
      <?php 
    }
    
    }
}

?>