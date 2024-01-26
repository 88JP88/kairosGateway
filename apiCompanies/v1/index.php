
<?php

require 'flight/Flight.php'; 
require 'env/domain.php';
require_once 'model/users/postModel.php';
require_once 'model/users/getModel.php';
require_once 'model/modelSecurity/authModel.php';
require_once 'model/users/responses.php';
 



Flight::route('POST /postClientCalendar/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'month' => Flight::request()->data->month,
            'monthDays' => Flight::request()->data->monthDays,
            'dayWeek' => Flight::request()->data->dayWeek

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
      $url = $sub_domain."/kairosCore/apiCompanies/v1/postClientCalendar/$apk/$xapk";

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



Flight::route('POST /postClientRoom/@apk/@xapk', function ($apk,$xapk) {
  
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCompanies",
    "apiVersion"=>"v1",
    "endPoint"=>"postClientRoom"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});


Flight::route('POST /postAssignRoom/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCompanies",
    "apiVersion"=>"v1",
    "endPoint"=>"postAssignRoom"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});



Flight::route('POST /postClientElement/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCompanies",
    "apiVersion"=>"v1",
    "endPoint"=>"postClientElement"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});



Flight::route('POST /putClientCalendar/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCompanies",
    "apiVersion"=>"v1",
    "endPoint"=>"putClientCalendar"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});



Flight::route('POST /putClientRoom/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCompanies",
    "apiVersion"=>"v1",
    "endPoint"=>"putClientRoom"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});





Flight::route('POST /putClientElement/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCompanies",
    "apiVersion"=>"v1",
    "endPoint"=>"putClientElement"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});





Flight::route('GET /getCalendarDays/@headerslink/@apiData', function ($headerslink,$apiData) {
    
 

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $decodedData = urldecode($apiData);
    $postData = json_decode($decodedData, true);
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
            $postData['apk'] = $response1;
            $postData['xapk'] = $xApiKey;
            $postData['apiValues'] = [
                "serviceName"=>"kairosCore",
                "apiName"=>"apiCompanies",
                "apiVersion"=>"v1",
                "endPoint"=>"getCalendarDays"
            ];
           
                    echo modelGet::getModel($postData);           
        } else {
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }
    } else {
        $responseSQL="false";
        $apiMessageSQL="¡Autenticación fallida!";
        $apiStatusSQL="403";
        $messageSQL="¡Encabezados faltantes!";
        echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION
    
    }



});



Flight::route('GET /getCalendarTimedes/@headerslink/@apiData', function ($headerslink,$apiData) {
    
   

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $decodedData = urldecode($apiData);
    $postData = json_decode($decodedData, true);
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
            $postData['apk'] = $response1;
            $postData['xapk'] = $xApiKey;
            $postData['apiValues'] = [
                "serviceName"=>"kairosCore",
                "apiName"=>"apiCompanies",
                "apiVersion"=>"v1",
                "endPoint"=>"getCalendarTimedes"
            ];
           
                    echo modelGet::getModel($postData);           
        } else {
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }
    } else {
        $responseSQL="false";
        $apiMessageSQL="¡Autenticación fallida!";
        $apiStatusSQL="403";
        $messageSQL="¡Encabezados faltantes!";
        echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION
    
    }


});



Flight::route('GET /getClientRooms/@headerslink/@apiData', function ($headerslink,$apiData) {
    
   

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $decodedData = urldecode($apiData);
    $postData = json_decode($decodedData, true);
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
            $postData['apk'] = $response1;
            $postData['xapk'] = $xApiKey;
            $postData['apiValues'] = [
                "serviceName"=>"kairosCore",
                "apiName"=>"apiCompanies",
                "apiVersion"=>"v1",
                "endPoint"=>"getClientRooms"
            ];
           
                    echo modelGet::getModel($postData);           
        } else {
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }
    } else {
        $responseSQL="false";
        $apiMessageSQL="¡Autenticación fallida!";
        $apiStatusSQL="403";
        $messageSQL="¡Encabezados faltantes!";
        echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION
    
    }





});




Flight::route('GET /getClientElements/@headerslink/@apiData', function ($headerslink,$apiData) {
    
   

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $decodedData = urldecode($apiData);
    $postData = json_decode($decodedData, true);
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
            $postData['apk'] = $response1;
            $postData['xapk'] = $xApiKey;
            $postData['apiValues'] = [
                "serviceName"=>"kairosCore",
                "apiName"=>"apiCompanies",
                "apiVersion"=>"v1",
                "endPoint"=>"getClientElements"
            ];
           
                    echo modelGet::getModel($postData);           
        } else {
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }
    } else {
        $responseSQL="false";
        $apiMessageSQL="¡Autenticación fallida!";
        $apiStatusSQL="403";
        $messageSQL="¡Encabezados faltantes!";
        echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION
    
    }






});





Flight::route('GET /getCalendarDaysAssign/@headerslink/@apiData', function ($headerslink,$apiData) {
    
   

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $decodedData = urldecode($apiData);
    $postData = json_decode($decodedData, true);
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
            $postData['apk'] = $response1;
            $postData['xapk'] = $xApiKey;
            $postData['apiValues'] = [
                "serviceName"=>"kairosCore",
                "apiName"=>"apiCompanies",
                "apiVersion"=>"v1",
                "endPoint"=>"getCalendarDaysAssign"
            ];
           
                    echo modelGet::getModel($postData);           
        } else {
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }
    } else {
        $responseSQL="false";
        $apiMessageSQL="¡Autenticación fallida!";
        $apiStatusSQL="403";
        $messageSQL="¡Encabezados faltantes!";
        echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION
    
    }







});




Flight::route('GET /getCalendarTime/@headerslink/@apiData', function ($headerslink,$apiData) {
    
   

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $decodedData = urldecode($apiData);
    $postData = json_decode($decodedData, true);
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {
        // Leer los datos de la solicitud
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
            $postData['apk'] = $response1;
            $postData['xapk'] = $xApiKey;
            $postData['apiValues'] = [
                "serviceName"=>"kairosCore",
                "apiName"=>"apiCompanies",
                "apiVersion"=>"v1",
                "endPoint"=>"getCalendarTime"
            ];
           
                    echo modelGet::getModel($postData);           
        } else {
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }
    } else {
        $responseSQL="false";
        $apiMessageSQL="¡Autenticación fallida!";
        $apiStatusSQL="403";
        $messageSQL="¡Encabezados faltantes!";
        echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION
    
    }




});



Flight::route('POST /putExtClient/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCore",
    "apiVersion"=>"v1",
    "endPoint"=>"putExtClient"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});







Flight::route('POST /putIntUser/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCore",
    "apiVersion"=>"v1",
    "endPoint"=>"putIntUser"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});





Flight::route('POST /putGenUser/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
       
        $response=  authModel::modelAuth($apk,$xapk);//AUTH MODEL
       //  Acceder a los encabezados
    
       if($response=="true"){
        $postData = Flight::request()->data->getData();
        $postData['apk'] = $apk;
$postData['xapk'] = $xapk;
$postData['apiValues'] = [
    "serviceName"=>"kairosCore",
    "apiName"=>"apiCore",
    "apiVersion"=>"v1",
    "endPoint"=>"putGenUser"
];
        echo modelPost::postModel($postData);
    
       }
        else{
            $responseSQL="false";
            $apiMessageSQL="¡Autenticación fallida!";
            $apiStatusSQL="401";
            $messageSQL="¡Autenticación fallida!";
            echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

        }

        
    } else {
     
        $responseSQL="false";
    $apiMessageSQL="¡Autenticación fallida!";
    $apiStatusSQL="403";
    $messageSQL="¡Encabezados faltantes!";
    echo modelResponse::responsePost($responseSQL,$apiMessageSQL,$apiStatusSQL,$messageSQL);//RESPONSE FUNCTION

    }
});















Flight::route('POST /validateLogIn/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    

// Crear el array con los valores correspondientes


        // Leer los datos de la solicitud
        $dta = [
            
            'mail' => Flight::request()->data->mail,
            'browser' => Flight::request()->data->browser,
            'ipId' => Flight::request()->data->ipId
        ];



        // Acceder a los encabezados
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          
          'xapiKey' => $headerslink
          
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
      $url = $sub_domain.'/kairosCore/apiCore/v1/validateLogIn/'.$headerslink;

      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
      
      // Ejecutar la solicitud y obtener la respuesta
      $response2 = curl_exec($curl);
      

    //echo json_encode($headers);

//echo $response2;
    curl_close($curl);

    //echo json_encode($headers);
        // Realizar acciones basadas en los valores de los encabezados
  //echo "true";


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
//echo json_encode($dta);
        
    } else {
        echo 'Error: Encabezados faltantes';
        
    }
});





Flight::route('POST /validateLogInInternal/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    

// Crear el array con los valores correspondientes


        // Leer los datos de la solicitud
        $dta = [
            
            'mail' => Flight::request()->data->mail,
            'browser' => Flight::request()->data->browser,
            'ipId' => Flight::request()->data->ipId
        ];



        // Acceder a los encabezados
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          
          'xapiKey' => $headerslink
          
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
      $url = $sub_domain.'/kairosCore/apiCore/v1/validateLogInInternal/'.$headerslink;

      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
      
      // Ejecutar la solicitud y obtener la respuesta
      $response2 = curl_exec($curl);
      

    //echo json_encode($headers);

//echo $response2;
    curl_close($curl);

    //echo json_encode($headers);
        // Realizar acciones basadas en los valores de los encabezados
  //echo "true";
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
//echo json_encode($dta);
        
    } else {
        echo 'Error: Encabezados faltantes';
        
    }
});




Flight::route('POST /validateLogInClose/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    

// Crear el array con los valores correspondientes


        // Leer los datos de la solicitud
        $dta = [
            
            'mail' => Flight::request()->data->mail,
            'browser' => Flight::request()->data->browser,
            'ipId' => Flight::request()->data->ipId
        ];



        // Acceder a los encabezados
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/koiosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          
          'xapiKey' => $headerslink
          
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
      $url = $sub_domain.'/koiosCore/apiUsers/v1/validateLogInClose/'.$headerslink;

      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
      
      // Ejecutar la solicitud y obtener la respuesta
      $response2 = curl_exec($curl);
      

    //echo json_encode($headers);

//echo $response2;
    curl_close($curl);

    //echo json_encode($headers);
        // Realizar acciones basadas en los valores de los encabezados
  //echo "true";

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
//echo json_encode($dta);
        
    } else {
        echo 'Error: Encabezados faltantes';
        
    }
});




Flight::route('POST /validateLogOutInternal/@headerslink', function ($headerslink) {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($headerslink)) {
    

// Crear el array con los valores correspondientes


        // Leer los datos de la solicitud
        $dta = [
            
            'userId' => Flight::request()->data->userId,
            'sessionId' => Flight::request()->data->sessionId,
            'value'=>Flight::request()->data->value,
        ];



        // Acceder a los encabezados
       
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyLog/';
      
        $data = array(
          
          'xapiKey' => $headerslink
          
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
      $url = $sub_domain.'/kairosCore/apiCore/v1/validateLogOutInternal/'.$headerslink;

      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $dta);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
      
      // Ejecutar la solicitud y obtener la respuesta
      $response2 = curl_exec($curl);
      

    //echo json_encode($headers);

//echo $response2;
    curl_close($curl);

    //echo json_encode($headers);
        // Realizar acciones basadas en los valores de los encabezados
  //echo "true";

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
//echo json_encode($dta);
        
    } else {
        echo 'Error: Encabezados faltantes';
        
    }
});



Flight::route('GET /getProfileInfoLogInternal/@userName/@sessionId', function ($userName,$sessionId) {
    
    header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $xApiKey = $headers['x-api-Key'];
        $ApiKey = $headers['Api-Key'];
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGateway/';
      
        $data = array(
            
            'xapiKey' => $xApiKey,
            'ApiKey' => $ApiKey
            
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


        if ($response1 === 'true' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->dom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $ApiKey\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCore/apiCore/v1/getProfileInfoLogInternal/'.$userName.'/'.$sessionId, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida 1'.$response1;
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});



Flight::route('GET /getMySessionsInternal/@headerslink/@headerslink2/@username', function ($headerslink,$headerslink2,$userName) {
    
    header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


    //$headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headerslink2)) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGateway/';
      
        $data = array(
            
            'xapiKey' => $headerslink2,
            'ApiKey' => $headerslink
            
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


        if ($response1 === 'true' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->dom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $headerslink\r\n" .
                                "x-api-Key: $headerslink2\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCore/apiCore/v1/getMySessionsInternal/'.$headerslink2.'/'.$userName, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida 1'.$response1;
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});


Flight::route('GET /getProfileInfoInternal/@userName', function ($userName) {
    
    header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        
        $xApiKey = $headers['x-api-Key'];
        $ApiKey = $headers['Api-Key'];
        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/kairosCore/apiAuth/v1/authApiKeyGateway/';
      
        $data = array(
            
            'xapiKey' => $xApiKey,
            'ApiKey' => $ApiKey
            
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


        if ($response1 === 'true' ) {
           


            $sub_domaincons = new model_dom;
            $sub_domain = $sub_domaincons->dom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $ApiKey\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCore/apiCore/v1/getProfileInfoInternal/'.$userName, false, $context);
                 
           
        
              echo $response;



        } else {
           echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
           // echo $response1;
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }






});






Flight::route('POST /putMyProfile/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'name' => Flight::request()->data->name,
            'lastName' => Flight::request()->data->lastName,
            'profileId' => Flight::request()->data->profileId,
            
            'isPublic' => Flight::request()->data->isPublic
        );



        // Acceder a los encabezados
    
        

        $sub_domaincon=new model_dom();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/koiosCore/apiAuth/v1/authApiKeyGatewayKoios/';
      
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
      $url = $sub_domain."/koiosCore/apiUsers/v1/putMyProfile/$response1/$xapk";

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






Flight::route('POST /postFullCalendar/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'userId' => Flight::request()->data->userId,
            'startDate' => Flight::request()->data->startDate,
            'endDate' => Flight::request()->data->endDate,
            'eventName' => Flight::request()->data->eventName,
            'roomId' => Flight::request()->data->roomId,
            'description' => Flight::request()->data->description,
            'ulrImge' => Flight::request()->data->ulrImge,
            'urlEvent' => Flight::request()->data->urlEvent

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
      $url = $sub_domain."/kairosCore/apiCompanies/v1/postFullCalendar/$apk/$xapk";

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






Flight::route('GET /getFullCalendar/@headerslink/@filter/', function ($headerslink,$filter) {
    
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
            $sub_domain = $sub_domaincons->dom();
            
            // Configurar los headers
            $options = array(
                'http' => array(
                    'header' => "Api-Key: $response1\r\n" .
                                "x-api-Key: $xApiKey\r\n"
                )
            );
            $context = stream_context_create($options);
            
            // Realizar la solicitud y obtener la respuesta
            $response = file_get_contents($sub_domain.'/kairosCore/apiCompanies/v1/getFullCalendar/'.$filter, false, $context);
                 
           
        
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
