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


public static function postCatalog($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiCom/v1/postCatalog/$APK/$XAPK";

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

public static function postStore($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiCom/v1/postStore/$APK/$XAPK";

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

public static function postCategorie($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiCom/v1/postCategorie/$APK/$XAPK";

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


class modelPut{

  public static function putProduct($data){
      $sub_domaincon=new model_dom();
      $sub_domain1=$sub_domaincon->domCom();
      $APK=$data['apk'];
      $XAPK=$data['xapk'];
      $url = $sub_domain1."/kairosCom/apiCom/v1/putProduct/$APK/$XAPK";
  
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
    echo $response2;
  
  }
  public static function putCatalog($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiCom/v1/putCatalog/$APK/$XAPK";

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


public static function putCategorie($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiCom/v1/putCategorie/$APK/$XAPK";

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


public static function putStore($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiCom/v1/putStore/$APK/$XAPK";

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