 <h2>Alta de usuarios</h2>
    <form action="<?=$_SERVER ['PHP_SELF']?>" method="POST">
       Nombre<input type="text" name="nombre"><br>
       Puesto<input type="text" name="puesto"><br>
       Fecha de Nacimiento <input type="date" name="fecha_nacimiento"><br>
       Salario<input type="number" name="salario"><br>
       Localidad <select name="localidad">
        <option value="Valencia">Madrid</option>
        <option value="Madrid">Madrid</option>
     	 </select><br>
          <button type="submit" name="enviar">Enviar</button>
    </form>