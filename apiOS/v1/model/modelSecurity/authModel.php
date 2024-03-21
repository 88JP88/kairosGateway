<?php
 
class authModel{


    public static function modelAuth($apk,$xapk){
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGateway/';
      
        $data = array(
          'ApiKey' =>$apk, 
          'xapiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);
      curl_close($curl);
      return $response1;

    }

    public static function modelAuthKairos($apk,$xapk){
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGatewayKairos/';
      
        $data = array(
          'ApiKey' =>$apk, 
          'xapiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);
      curl_close($curl);
      return $response1;

    }
}
?>