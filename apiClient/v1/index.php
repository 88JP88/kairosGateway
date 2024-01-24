
<?php
require 'flight/Flight.php'; 
require 'env/domain.php';
require_once 'model/users/postModel.php';
require_once 'model/users/getModel.php';
require_once 'model/modelSecurity/authModel.php';
require_once 'model/users/responses.php';
 


Flight::route('POST /postClientOrder/@apk/@xapk', function ($apk,$xapk) {
  
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

        echo modelPost::postOrderPOS($postData);
    
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




Flight::route('POST /postClientOrderEcm/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::postOrderECM($postData);
    
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




Flight::route('POST /postCustomer/@apk/@xapk', function ($apk,$xapk) {
  
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
    "serviceName"=>"kairosCom",
    "apiName"=>"apiClient",
    "apiVersion"=>"v1",
    "endPoint"=>"postCustomer"
];
        echo modelPost::postCustomer($postData);
    
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



Flight::route('POST /postDelivery/@apk/@xapk', function ($apk,$xapk) {
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
        echo modelPost::postDelivery($postData);
    
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
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
             echo modelGet::getCustomers($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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



Flight::route('POST /putClientOrderPaymentStatus/@apk/@xapk', function ($apk,$xapk) {
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
        echo modelPut::putOrderPaymentStatus($postData);
    
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



Flight::route('POST /putClientOrderStatus/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPut::putOrderStatus($postData);
    
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




Flight::route('POST /putCustomer/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPut::putCustomer($postData);
    
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




Flight::route('POST /putDelivery/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPut::putDelivery($postData);
    
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
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
             echo modelGet::getOrders($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
             echo modelGet::getDelivery($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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





Flight::route('POST /sendEcmValCode/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::sendValCodeECM($postData);
    
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



Flight::route('POST /validateEcmValCode/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::validateCodeECM($postData);
    
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
       
       $response1=authModel::modelAuthKairos($apiKey,$xApiKey);
       

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 != 'false' ) {
           
             echo modelGet::getPickUpPoints($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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



Flight::start();
