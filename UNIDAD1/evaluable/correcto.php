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
            echo "<h2>USUARIOS</h2>";
            while(!feof($file)){
                
                $linea=fgets($file);
                if($linea==""){
                }else{
                $usuario=preg_split('/;/', $linea);
                
                echo "<b>Nombre :$usuario[0]</b><br>Nombre de Usuario: $usuario[1]<br>Email: $usuario[3]<br><hr>";
            }
            }
        }else if($seleccion=="mostrarImagenes"){
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'r+');
            
            echo "<table border='1px>'";
            echo "<caption>IMAGENES DE USUARIOS</caption>";
            while(!feof($file)){
                $linea=fgets($file);
                if($linea==""){
                }else{
                    $usuario=preg_split('/;/', $linea);
                    echo "<tr><td>$usuario[0]</td><td><img src='".$usuario[4]."' width='200px'></td></tr>";
                }
            }
            
            echo "</table>";
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