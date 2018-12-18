<?php
//Sacamos los datos de configuración a la BD a un fichero de configuración config.php

include_once ("config.php");

//Para utilizar esta conexión es suficiente con hacer include de este fichero
//A partir de ahi usaremos $db 
       
            // Conectamos
            $db = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave);
            // Realiza el enlace con la BD en utf-8
            $db->exec("set names utf8");
            //Accionamos el uso de excepciones
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Impedimos que se muestren los errores enviados por MySQL que no lanzan excepción
            //Por ejemplo hacer una consulta a una tabla que no existe
            //En modo desarrollo nos ayuda ver los errores pero en producción hay que silenciarlos
            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            
         


?>