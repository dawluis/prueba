
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Api</title>
</head>
<body>
    <header><h1>API GENTE RANDOM</h1></header>
    
    <form action="<?php $_SERVER ['PHP_SELF']?>" method="POST" class="form-container">
     	Usuarios a generar: <br>
        4<input type="range" name="numero" min="4" max="12">12<br>
        Genero: <br>
        <select name="sexo" id="">
            <option value="female">Mujer</option>
            <option value="male">Hombre</option>
        </select><br>
        <b>Rango de Edad:</b><br>
        Limite de Edad<br>
        <input type="number" name="rangoMax"><br>
    	<input type="submit" name="enviar" value="Generar">
	</form>
	<hr>
	<section>
	
            <?php
            if(isset($_REQUEST['enviar'])){
                $usuarios=$_POST['numero'];
                $genero=$_POST['sexo'];
                $edadMax=$_POST['rangoMax'];
                
                
                $datos=file_get_contents('https://randomuser.me/api/');
                $json=json_decode($datos);
                
                
                for($i=0; $i < $usuarios ; $i++){
                    $datos=file_get_contents('https://randomuser.me/api/');
                    $json=json_decode($datos);
                    $gender=$json->results['0']->gender;
                    $edad=$json->results['0']->dob->age;
                    if(empty($edadMax)){
                        while($genero != $gender){
                            $datos=file_get_contents('https://randomuser.me/api/');
                            $json=json_decode($datos);
                            $gender=$json->results['0']->gender;
                        }
                        include 'trozo.php';
                    
                    }else{
                        
                    while($genero != $gender || $edad > $edadMax){
                        $datos=file_get_contents('https://randomuser.me/api/');
                        $json=json_decode($datos);
                        $edad=$json->results['0']->dob->age;
                        $gender=$json->results['0']->gender;
                        
                    }
                    include 'trozo.php';
                    }
                }
            }
            ?>
    </section>
    <script>
    	$(document).ready(function(){
			
        	
        	});
		
    </script>
</body>
</html>