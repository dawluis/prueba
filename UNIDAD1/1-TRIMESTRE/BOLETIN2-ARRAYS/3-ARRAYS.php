<?php
$rand=rand(0,4);
$img= array("img/1.jpg", "img/2.jpg", "img/3.jpg", "img/4.jpg", "img/5.jpg");
echo "<img src='$img[$rand]'></img>";
?>