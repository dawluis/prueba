<?php
$notas= array(
    "Servidor"=>array("Jose"=>4,"Juan"=>6, "Raul"=>6, "Carlos"=>2, "Vicente"=>1),
    "Cliente"=>array("Jose"=>8,"Juan"=>3, "Raul"=>8, "Carlos"=>5, "Vicente"=>7),
    "Diseño"=>array("Jose"=>9,"Juan"=>6, "Raul"=>5, "Carlos"=>7, "Vicente"=>3), 
);

$mediaMateria=0;
$mediaJose=0;
$mediaJuan=0;
$mediaRaul=0;
$mediaCarlos=0;
$mediaVicente=0;
foreach($notas as $asignatura => $notas){
    echo "<table border=1px black solid><tr><td><b>ASIGNATURA</b></td><td><b>$asignatura</b></td></tr>";
    foreach ($notas as $alumno => $nota){
        echo"<tr><td>$alumno</td><td>$nota</td></tr>";
        $mediaMateria=$mediaMateria+$nota;
 
        if($alumno=="Jose"){
            
            $mediaJose=$mediaJose+$nota;
        }
        if($alumno=="Juan"){
            $mediaJuan=$mediaJuan+$nota;
            
        }
        if($alumno=="Raul"){
            $mediaRaul=$mediaRaul+$nota;
            
        }
        if($alumno=="Carlos"){
            $mediaCarlos=$mediaCarlos+$nota;
            
        }
        if($alumno=="Vicente"){
            $mediaVicente=$mediaVicente+$nota; 
        }
    }
        $num=count($notas);
        $mediaMateria=($mediaMateria/$num);
        echo "<tr><td><b>MEDIA ASIGNATURA</b></td><td>$mediaMateria</td></tr>";
        echo"</table><br>";
}
$mediaJose=round($mediaJose/3);
$mediaJuan=round($mediaJuan/3);
$mediaRaul=round($mediaRaul/3);
$mediaCarlos=round($mediaCarlos/3);
$mediaVicente=round($mediaVicente/3);

echo"LA MEDIA DE JOSE ES $mediaJose <br>";
echo"LA MEDIA DE JUAN ES $mediaJuan<br>";
echo"LA MEDIA DE RAUL ES $mediaRaul<br>";
echo"LA MEDIA DE CARLOS ES $mediaCarlos<br>";
echo"LA MEDIA DE VICENTE ES $mediaVicente<br>";




/*$mediaAlumno=0;
 $mediaAsignatura=0;
 $alumnos=array(
 array("Servidor"=>3, "Cliente"=>6, "Diseño"=>8),
 array("Servidor"=>8, "Cliente"=>2, "Diseño"=>7),
 array("Servidor"=>9, "Cliente"=>1, "Diseño"=>5)
 );
 echo "<table border=1px black solid>";
 for($i=0; $i < count($alumnos) ; $i++){
 echo "<tr><td>$i</td>";
 foreach($alumnos[$i] as $asignatura => $nota){
 echo "<td>$asignatura : </td><td>$nota</td>";
 $mediaAlumno=$mediaAlumno+$nota;
 }
 echo "<td>media notas $i : </td><td>". round($mediaAlumno/3) ."</td></tr>";
 }
 echo "</table>";*/
?>