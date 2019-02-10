<?php
session_start();
include ("bGeneral.php");
cabecera('Ejemplo 2');
//Inicializamos $_SESSION Total
if (!isset ($_SESSION["Total"]))
	$_SESSION["Total"]=0;
if (!isset($_POST['bEnviar'])&&!isset($_POST["bDesconectar"])){


include ("fSesiones.php");

}


	if (isset($_POST["bDesconectar"]))
		{
		session_destroy();
		unset ($_SESSION);
		//Con el siguiente código destruimos la cookie de sesión al instante
		//Conseguimos los parámetros de la cookie
		 $params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],$params["secure"], $params["httponly"]);
		
		echo "<p>Sesión finalizada</p>";
			
	}

		
	if (isset($_POST["bEnviar"]))
		{
			switch ($_POST["productos"])
			{
			case "Placa MMX-100":
				$_SESSION["Total"] = $_SESSION["Total"] + 700;
				break;
			case "Placa MMX-200":
					$_SESSION["Total"] = $_SESSION["Total"] + 1400;
					break;
			case "Tel�fono ALSTER":
					$_SESSION["Total"] = $_SESSION["Total"] + 850;
					break;
			case "Tel�fono MOVILON":
					$_SESSION["Total"] = $_SESSION["Total"] + 623;
				break;
		}
	echo "<p>Total a facturar: " . $_SESSION["Total"] ."</p>";
	echo "<a href='" . $_SERVER["PHP_SELF"] ."'>Volver</a>";
	
}
?>
</body>
</html>

