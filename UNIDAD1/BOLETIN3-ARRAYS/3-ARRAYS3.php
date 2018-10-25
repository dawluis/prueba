<?php
$rand=rand(0,4);
$img= array(
    array("nombre"=>"lemur","tipo"=>"Mamifero","familia"=>"lemures","imagen"=>"img/1.jpg"), 
    array("nombre"=>"Perro","tipo"=>"Mamifero","familia"=>"Perruna","imagen"=>"img/2.jpg"),
    array("nombre"=>"Rata","tipo"=>"Mamifero","familia"=>"Ratuna","imagen"=>"img/3.jpg"),
    array("nombre"=>"Vaca","tipo"=>"Mamifero","familia"=>"Vacuna","imagen"=>"img/4.jpg"),
    array("nombre"=>"Lobo","tipo"=>"Mamifero","familia"=>"lobezna","imagen"=>"img/5.jpg")
);
    echo "<img src=".$img[$rand]["imagen"]."></img><br>";
    echo 'Nombre: '.$img[$rand]["nombre"].'<br>';
    echo 'Tipo: '.$img[$rand]["tipo"].'<br>';
    echo 'Familia: '.$img[$rand]["familia"].'<br>';
?>