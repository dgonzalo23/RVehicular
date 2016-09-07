<?php
  function refrescar(){
$doc = fopen("Coordenadas.txt","r") or die ("Error al leer el archivo");
  while(!feof($doc)){
    $texto = fgets($doc);
    $textoS = nl2br($texto);
    echo $textoS;
    $ubicacion = explode(" ", $texto);
      $lat = $ubicacion[1];
      $log = $ubicacion[3];
      $fecha = $ubicacion[5];
      $hora = $ubicacion[7];
  }
  $url=$_SERVER['REQUEST_URI'];
  header("Refresh: 180; URL=$url");
  fclose($doc);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Global Tracking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>
      html, body {
        height: 100%;
        margin: 0;
      }
      #map {
        height: 100%;
        width: 100%;
      } 
    </style>
  </head>
  <body>
    <div class="w3-container w3-teal">
    <h1>Global Tracking System</h1>
    
    </div>
    
    <div id="map">
    <script>
   var latitud = <?php echo $lat ?>;
    var longitud = <?php echo $log ?>; 
    </script>
    <script>
    
      var map;

      function initMap() {

        var myLatLng = {lat: latitud, lng: longitud};
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 15
        });
              
              setInterval(function(){
        var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        });           
      
        recorrido.setMap(map);
      }, 2000);
     
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtxNxHoSNOl8JMvcc4KAIlkoSlURTKL54&callback=initMap"
    async defer></script>
    </div>
      
  </body>
</html>
