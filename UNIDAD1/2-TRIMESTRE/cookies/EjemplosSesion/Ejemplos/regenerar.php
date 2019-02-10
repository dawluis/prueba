<?php

session_start();

//Recogemos el id de la sesión en marcha
$id_sesion_antigua = session_id();

//Cambiamos el id de sesión para aumentar seguridad
session_regenerate_id(true);

//Vemos como a cambiado el id de sesión
$id_sesion_nueva = session_id();

echo "Sesión Antigua: $id_sesion_antigua<br />";
echo "Sesión Nueva: $id_sesion_nueva<br />";

print_r($_SESSION);
?>
