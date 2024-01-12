
<?php

require 'flight/Flight.php';

require 'database/db_users.php';
require 'env/domain.php';

 






Flight::route('POST /postClientOrder/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'cart' => Flight::request()->data->cart,
            'userId' => Flight::request()->data->userId,
            'fromIp' => Flight::request()->data->fromIp,
            'fromBrowser' => Flight::request()->data->fromBrowser,
            'customerId' => Flight::request()->data->customerId,
            'paymentMethod' => Flight::request()->data->paymentMethod,
            'paymentType' => Flight::request()->data->paymentType,
            'payWith' => Flight::request()->data->payWith,
            'bankEntity' => Flight::request()->data->bankEntity

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postClientOrder/$apk/$xapk";

      $curl = curl_init();
      
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




      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});




Flight::route('POST /postClientOrderEcm/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'cart' => Flight::request()->data->cart,
            'userId' => Flight::request()->data->userId,
            'fromIp' => Flight::request()->data->fromIp,
            'fromBrowser' => Flight::request()->data->fromBrowser,
            'customerId' => Flight::request()->data->customerId,
            'paymentMethod' => Flight::request()->data->paymentMethod,
            'paymentType' => Flight::request()->data->paymentType,
            'payWith' => Flight::request()->data->payWith,
            'bankEntity' => Flight::request()->data->bankEntity,
            'deliveryMethod' => Flight::request()->data->deliveryMethod,
            'deliveryAdd' => Flight::request()->data->deliveryAdd

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postClientOrderEcm/$apk/$xapk";

      $curl = curl_init();
      
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



      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});





Flight::route('POST /postCatalogBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postCatalogBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});


Flight::route('POST /putCatalogBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putCatalogBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});





Flight::route('POST /postProductBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postProductBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('POST /putProductBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putProductBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});


Flight::route('POST /postStoreBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postStoreBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});


Flight::route('POST /putStoreBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putStoreBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('POST /postCategorieBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postCategorieBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('POST /putCategorieBulk/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'bulk' => Flight::request()->data->bulk,
            'clientId' => Flight::request()->data->clientId

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putCategorieBulk/$apk/$xapk";

      $curl = curl_init();
      
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

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});




Flight::route('POST /postCustomer/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'customerName' => Flight::request()->data->customerName,
            'customerLastName' => Flight::request()->data->customerLastName,
            'customerMail' => Flight::request()->data->customerMail,
            'customerPhone' => Flight::request()->data->customerPhone,
            'customerType' => Flight::request()->data->customerType

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postCustomer/$apk/$xapk";

      $curl = curl_init();
      
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



      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('POST /postDelivery/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'deliveryName' => Flight::request()->data->deliveryName,
            'deliveryLastName' => Flight::request()->data->deliveryLastName,
            'deliveryMail' => Flight::request()->data->deliveryMail,
            'deliveryContact' => Flight::request()->data->deliveryContact

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/postDelivery/$apk/$xapk";

      $curl = curl_init();
      
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


    

      //inicio de log
 require_once 'kronos/postLog.php';
 
 $backtrace = debug_backtrace();
 $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
 $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
$justFileName = basename($currentFile);
$rutaCompleta = __DIR__;
$status = http_response_code();
$cid=Flight::request()->data->clientId;

//$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
$array = explode("|", $response2);
$response12=$array[0];
$message=$array[1];
kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
//final de log
echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('GET /getCustomers/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGatewayKairos/';
      
        $data = array(
            'ApiKey' =>$apiKey, 
            'xapiKey' => $xApiKey
            
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

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->domCom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $response1\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCom/apiClient/v1/getCustomers/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida1'.$response1;
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});



Flight::route('POST /putClientOrderPaymentStatus/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'orderId' => Flight::request()->data->orderId,
            'reference' => Flight::request()->data->reference

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putClientOrderPaymentStatus/$apk/$xapk";

      $curl = curl_init();
      
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



      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('POST /putClientOrderStatus/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'orderId' => Flight::request()->data->orderId,
            'param' => Flight::request()->data->param,
           'value' => Flight::request()->data->value

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putClientOrderStatus/$apk/$xapk";

      $curl = curl_init();
      
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



      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});




Flight::route('POST /putCustomer/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'customerId' => Flight::request()->data->customerId,
            'param' => Flight::request()->data->param,
           'value' => Flight::request()->data->value

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putCustomer/$apk/$xapk";

      $curl = curl_init();
      
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




      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});




Flight::route('POST /putDelivery/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'trackId' => Flight::request()->data->trackId,
            'deliveryId' => Flight::request()->data->deliveryId,
            'param' => Flight::request()->data->param,
           'value' => Flight::request()->data->value

        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/putDelivery/$apk/$xapk";

      $curl = curl_init();
      
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




      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     $trackId=Flight::request()->data->trackId;
     
     $response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response1);
     $response12=$array[0];
     $message=$array[1];
    //echo kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status,$trackId);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('GET /getClientOrders/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGatewayKairos/';
      
        $data = array(
            'ApiKey' =>$apiKey, 
            'xapiKey' => $xApiKey
            
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

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->domCom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $response1\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCom/apiClient/v1/getClientOrders/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida1'.$response1;
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});



Flight::route('GET /getDelivery/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGatewayKairos/';
      
        $data = array(
            'ApiKey' =>$apiKey, 
            'xapiKey' => $xApiKey
            
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

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->domCom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $response1\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCom/apiClient/v1/getDelivery/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida1'.$response1;
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});





Flight::route('POST /sendEcmValCode/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'customerMail' => Flight::request()->data->customerMail
        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/sendEcmValCode/$apk/$xapk";

      $curl = curl_init();
      
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



      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});



Flight::route('POST /validateEcmValCode/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'customerMail' => Flight::request()->data->customerMail,
            'valCode' => Flight::request()->data->valCode
        );



        // Acceder a los encabezados
    
        

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

      
      $dt=json_encode($dta);

      curl_close($curl);
      $sub_domain1=$sub_domaincon->domCom();
      $url = $sub_domain1."/kairosCom/apiClient/v1/validateEcmValCode/$apk/$xapk";

      $curl = curl_init();
      
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



      //inicio de log
      require_once 'kronos/postLog.php';
 
      $backtrace = debug_backtrace();
      $info['Función'] = $backtrace[1]['function']; // 1 para obtener la función actual, 2 para la anterior, etc.
      $currentFile = __FILE__; // Obtiene la ruta completa y el nombre del archivo actual
     $justFileName = basename($currentFile);
     $rutaCompleta = __DIR__;
     $status = http_response_code();
     $cid=Flight::request()->data->clientId;
     
     //$response1 = trim($response1); // Eliminar espacios en blanco alrededor de la respuesta
     $array = explode("|", $response2);
     $response12=$array[0];
     $message=$array[1];
     kronos($response12,$message,$message, $info['Función'],$justFileName,$rutaCompleta,$cid,$dt,$url,$status);
     //final de log

echo $response2;

        
    } else {
        echo 'false|¡Error: Encabezados faltantes!';
    }
});





Flight::route('GET /getClientPickupPoints/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGatewayKairos/';
      
        $data = array(
            'ApiKey' =>$apiKey, 
            'xapiKey' => $xApiKey
            
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

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->domCom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $response1\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCom/apiClient/v1/getClientPickupPoints/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida1'.$response1;
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});



Flight::start();
