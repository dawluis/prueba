<?php
//incluimos la biblioteca de funciones para separar y limpiar el codigo
include 'bGeneral.php';
cabecera("correcto");
?>
<a href="index.php">Volver a Alta de Usuarios</a>
<?php
//si consulta no se ha pulsado aun, mostramos el formulario
if(!isset($_REQUEST['consulta'])){
    echo "<h1>El alta de usuario ha sido correcta</h1>";
    include 'formCorrecto.php';
//si consulta ya se ha pulsado pasamos a procesar los datos
}else{
    //comprobamos que seleccion tiene un valor
    if(isset($_REQUEST['seleccion'])){
        $seleccion=$_REQUEST['seleccion'];
        //Si el valor es "mostrarUsuarios nos mostrara los usuarios
        if($seleccion=="mostrarUsuarios"){
            include 'formCorrecto.php';
            echo "<h2>USUARIOS</h2>";
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'r+');
            //Mientras que no llege al final del archivo que vaya leyendo linea por linea
            while(!feof($file)){
                $linea=fgets($file);
                //Si la linea esta vacia que no haga nada
                if($linea==""){
                //Si tiene informacion que la divida en partes y cree un array
                }else{
                
                $usuario=preg_split('/;/', $linea);
                
                //Imprimos partes del array a nuestro gusto
                echo "<b>Nombre :$usuario[0]</b><br>Nombre de Usuario: $usuario[1]<br>Email: $usuario[3]<br><hr>";
                }
            }
        //Sino si seleccion es "mostrarImagenes" nos mostrara las imagenes junto al nombre del usuario que le correspona en una tabla
        }else if($seleccion=="mostrarImagenes"){
            include 'formCorrecto.php';
            //imprimos tabla
            echo "<table border='1px>'";
            echo "<caption>IMAGENES DE USUARIOS</caption>";
            $archivo="usuarios.txt";
            $file=fopen($archivo, 'r+');
            
            while(!feof($file)){
                $linea=fgets($file);
                if($linea==""){
                }else{
                    $usuario=preg_split('/;/', $linea);
                    echo "<tr><td>$usuario[0]</td><td><img src='".$usuario[4]."' width='200px'></td></tr>";
                }
            }
            echo "</table>";
    //Sino es ninguna de ellas que imprima el fomrulario        
    }else{
        include 'formCorrecto.php';
      
    }
    
    }
}
pie();
?>