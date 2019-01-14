<?php
if(isset($_REQUEST['enviar'])){
    setcookie('color', $_POST['color'], time()+60);
    header('location:1-cookies2.php');
}else{
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
ROJO<input type="radio" name="color" value="red">
AZUL<input type="radio" name="color" value="blue">
VERDE<input type="radio" name="color" value="green">
<input type="submit" name="enviar" value="enviar">
</form>
<?php 
}
?>