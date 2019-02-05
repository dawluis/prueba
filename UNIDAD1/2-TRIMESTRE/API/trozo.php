<?php
$nombre=$json->results['0']->name->title;
$Apellido1=$json->results['0']->name->first;
$Apellido2=$json->results['0']->name->last;
$edad=$json->results['0']->dob->age;
$direccion=$json->results['0']->location->street;
$ciudad=$json->results['0']->location->city;
$codigoPostal=$json->results['0']->location->postcode;
$email=$json->results['0']->email;
$telefono=$json->results['0']->phone;
$dni=$json->results['0']->id->value;
$img=$json->results['0']->picture->large;

echo "<div class='ficha'>";
echo "<img src='".$img."' class='imgFicha'>";
echo"<hr class='separador'>
                <div class='contenido-texto'>";

echo "
                <b>Nombre:</b> ".$Apellido1."
                <br><b>Apellido:</b> ".$Apellido2."
                <br><b>Genero:</b> ".$gender."
                <br><b>Edad:</b> ".$edad."
                <br><b>Direccion:</b> ".$direccion."
                <br><b>Ciudad:</b> ".$ciudad."
                <br><b>Codigo Postal:</b> ".$codigoPostal."
                <br><b>Email:</b> ".$email."
                <br><b>Telefono:</b> ".$telefono."
                <br><b>DNI:</b>".$dni;

echo "</div></div>";
?>