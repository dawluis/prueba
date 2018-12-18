<?php
session_start();
session_destroy();
unset ($_SESSION);

echo "Ha salido del sistema<br>";
echo "<a href=index.php>Volver al inicio</a>";
?>