<?php

function kronos($valores) {

  // Establecer la zona horaria a Bogotá
date_default_timezone_set('America/Bogota');

// Obtener la fecha y hora actual en Bogotá
$now = new DateTime();
$now->setTimezone(new DateTimeZone('America/Bogota'));

// Formatear la fecha y hora actual
$currentDateTime = $now->format('Y-m-d H:i:s');


$jsonData = '{
    "log":{
      "front":{
        "timestamp": "'.$valores.'"
      }
      
  }';




  
  $url ="https://dev-kronos.lugma.tech/kronos/apiLogs/v1/prueba/";
  
  // Definir los datos a enviar en la solicitud POST
  $data6 = array(
      'data' => $jsonData
     
      
  );
  
  // Convertir los datos a formato JSON
  $json_data = json_encode($data6);
  
  // Inicializar la sesión cURL
  $curl = curl_init();
   
  // Configurar las opciones de la sesión cURL
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data6);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
  // Ejecutar la solicitud y obtener la respuesta
  $responselog = curl_exec($curl);
  
  // Cerrar la sesión cURL
  curl_close($curl);
echo $responselog;

}

?>