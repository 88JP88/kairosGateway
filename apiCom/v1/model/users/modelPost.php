<?php

class modelPost{

public static function postProduct($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiCom/v1/postProduct/$APK/$XAPK";

    $curl = curl_init();
    $dt=json_encode($data);

    // Configurar las opciones de la sesión cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $dt);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
      'Content-Type: application/json'
  );
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    // Ejecutar la solicitud y obtener la respuesta
    $response2 = curl_exec($curl);
    


  curl_close($curl);
  return $response2;

}

}



?>