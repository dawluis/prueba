<FORM CLASS="borde" ACTION="<?=$_SERVER['PHP_SELF']?>" NAME="inserta" METHOD="POST" ENCTYPE="multipart/form-data">


<P>Nombre: <INPUT  NAME="nombre" TYPE="TEXT" > </P>
<P>Apellido: <INPUT  NAME="usuario" TYPE="TEXT" > </P>
<P>Fecha Nacimiento: <INPUT  NAME="fecha" TYPE="TEXT" > </P>
<P>Formato de la fecha dd/mm/aaaa </P>
<P><LABEL>Foto:</LABEL>
<INPUT TYPE="FILE" SIZE="44" NAME="foto">   

<P><INPUT TYPE="SUBMIT" NAME="insertar" VALUE="Vinsertar"></P>

</FORM>
