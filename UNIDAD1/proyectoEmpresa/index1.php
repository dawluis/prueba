<?php 
   include 'conexion.php';
   require_once 'datos.php';
   include 'bGeneral.php';
   $error=false;
?>
<html>
  <head>
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
  </head>
  <body>
  <?php 
 
  
  if(!isset($_REQUEST['insertar'])){
      include 'form.php';
      
  }else{
     $ocio=recoge('ocio');
     $combustible=recoge('combustible');
     $factura=recoge('facturas');
     $restauracion=recoge('restauracion');
     
     if(!is_numeric($ocio) || empty($ocio)){
         $error=true;
     }
     if(!is_numeric($combustible) || empty($combustible)){
         $error=true;
     }
     if(!is_numeric($factura) || empty($factura)){
         $error=true;
     }
     if(!is_numeric($restauracion) || empty($restauracion)){
         $error=true;
     }
     
     if($error){
         echo "Datos Incorrectos";
         include 'form.php';
         
     }else{
         try {
             $insert="INSERT INTO gastos (restauracion,combustible,facturas,ocio) VALUES ($restauracion,$combustible,$factura,$ocio)";
             $base->exec($insert);
             echo "DATOS INSERTADOS CORRECTAMENTE";
             header('location:index1.php');
         } catch (Exception $e) {
             die('Error: '.$e->getMessage());
         }  
         include 'form.php';
     }   
  }
  
  ?>
    <div id="piechart" style="width: 100%; height: 500px;">Cargando Datos<br><img width="100px" src="img/cargando.gif"></div>
  	<script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	 
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Combustible',    <?php echo $mediaCombustible?>],
          ['Facturas',  <?php echo $mediaFacturas?>],
          ['Restauracion', <?php echo $mediaRestauracion?>],
          ['Ocio', <?php echo $mediaOcio?>]
        ]);

        var options = {
          title: 'Gastos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </body>
  
</html>