 <?php 
 require_once 'conexionDB.php';
 
 $db= modelo::GetInstance();
 
 $resultado=$db->getLocalidades();


 ?>
 <h2>Alta de usuarios</h2>
    <form action="<?=$_SERVER ['PHP_SELF']?>" method="POST">
       Nombre<input type="text" name="nombre"><br>
       Puesto<input type="text" name="puesto"><br>
       Fecha de Nacimiento <input type="date" name="fecha_nacimiento"><br>
       Salario<input type="number" name="salario"><br>
       Localidad <select name="localidad">
       <?php 
       while($res = $resultado->fetch()){
           echo "<option value='{$res['id_localidad']}'>".$res['localidad']."</option>";
       }
       ?>
      
        
     	 </select><br>
          <button type="submit" name="enviar">Enviar</button>
    </form>