<?php
require_once 'clases.php';
include 'conexion.php';

$sql="SELECT ocio, facturas, combustible, restauracion FROM gastos";
$resultado=$base->prepare($sql);
$resultado->execute();
while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
    $ocios[]=$registro['ocio'];
    $restauraciones[]=$registro['restauracion'];
    $facturas[]=$registro['facturas'];
    $combustibles[]=$registro['combustible'];
}
$resultado->closeCursor();

$media= new Operaciones;

$mediaOcio=$media->MediaArray($ocios);
$mediaRestauracion=$media->MediaArray($restauraciones);
$mediaFacturas=$media->MediaArray($facturas);
$mediaCombustible=$media->MediaArray($combustibles);

?>