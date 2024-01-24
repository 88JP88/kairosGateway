<?php
// require './apiClient/v1/env/domain.php';
class modelPost{

public static function postOrderPOS($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiClient/v1/postClientOrder/$APK/$XAPK";

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
  echo  $response2;

}


public static function postOrderECM($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiClient/v1/postClientOrderEcm/$APK/$XAPK";

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
echo  $response2;

}
public static function postModel($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $serviceName=$data['apiValues']['serviceName'];
  $apiName=$data['apiValues']['apiName'];
  $apiVersion=$data['apiValues']['apiVersion'];
  $endPoint=$data['apiValues']['endPoint'];

  $url = $sub_domain1."/$serviceName/$apiName/$apiVersion/$endPoint/$APK/$XAPK";
  //$url = $sub_domain1."/kairosCom/apiClient/v1/postCustomer/$APK/$XAPK";
  unset($data['apiValues']);
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

echo  $response2;

}

public static function postCustomer($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $serviceName=$data['apiValues']['serviceName'];
  $apiName=$data['apiValues']['apiName'];
  $apiVersion=$data['apiValues']['apiVersion'];
  $endPoint=$data['apiValues']['endPoint'];

  $url = $sub_domain1."/$serviceName/$apiName/$apiVersion/$endPoint/$APK/$XAPK";
  //$url = $sub_domain1."/kairosCom/apiClient/v1/postCustomer/$APK/$XAPK";
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
echo  $response2;

}

public static function postDelivery($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiClient/v1/postDelivery/$APK/$XAPK";

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
echo  $response2;


}


public static function sendValCodeECM($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiClient/v1/sendEcmValCode/$APK/$XAPK";

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
echo  $response2;


}


public static function validateCodeECM($data){
  $sub_domaincon=new model_dom();
  $sub_domain1=$sub_domaincon->domCom();
  $APK=$data['apk'];
  $XAPK=$data['xapk'];
  $url = $sub_domain1."/kairosCom/apiClient/v1/validateEcmValCode/$APK/$XAPK";

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
echo  $response2;


}

}

class modelPut{

  public static function putOrderPaymentStatus($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiClient/v1/putClientOrderPaymentStatus/$APK/$XAPK";
  
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
  echo  $response2;
  
  
  }

  
  public static function putOrderStatus($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiClient/v1/putClientOrderStatus/$APK/$XAPK";
  
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
  echo  $response2;
  
  
  }

  public static function putCustomer($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiClient/v1/putCustomer/$APK/$XAPK";
  
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
  echo  $response2;
  
  
  }
  
  public static function putDelivery($data){
    $sub_domaincon=new model_dom();
    $sub_domain1=$sub_domaincon->domCom();
    $APK=$data['apk'];
    $XAPK=$data['xapk'];
    $url = $sub_domain1."/kairosCom/apiClient/v1/putDelivery/$APK/$XAPK";
  
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
  echo  $response2;
  
  
  }

}



?>