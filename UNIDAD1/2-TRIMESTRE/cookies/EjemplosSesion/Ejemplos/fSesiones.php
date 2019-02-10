
<html>
<head>
<title>Sesiones</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<p>Elija el producto y pulse en Enviar:</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <select size="1" name="productos">
    <option>Placa MMX-100</option>
    <option>Placa MMX-200</option>
    <option>Teléfono ALSTER</option>
    <option>Teléfono MOVILON</option>
    </select>
    <input type="submit" name="bEnviar" value="Enviar">
    <p><input type="submit" name="bDesconectar" value="Desconectar"></p>
    </form>