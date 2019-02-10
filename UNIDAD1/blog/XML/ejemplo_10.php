<?php
$string = <<<XML
<animales>
    <animal tipo="mamifero">
       <nombre>Tigre</nombre>
    </animal>
    <animal tipo="anfibio">
        <nombre>rana</nombre>
</animal>
</animales>
XML;
// Cargamos el archivo:
$xml = simplexml_load_string($string);
// Se puede obtener el atributo así:
echo $xml->animal[0]->attributes(); // Devuelve: mamífero
echo '<br>';
echo $xml->animal[1]->attributes(); // Devuelve: anfibio
?>


