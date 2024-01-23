
<?php

require 'flight/Flight.php'; 
require 'env/domain.php';
require_once 'model/users/postModel.php';
require_once 'model/users/getModel.php';
require_once 'model/modelSecurity/authModel.php';
require_once 'model/users/responses.php';


Flight::route('POST /postProduct/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::postProduct($postData);
    
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


Flight::route('POST /postCatalog/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::postCatalog($postData);
    
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



Flight::route('POST /postStore/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::postStore($postData);
    
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


Flight::route('POST /postCategorie/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPost::postCategorie($postData);
    
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


Flight::route('GET /getProducts/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
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
           
             echo modelGet::getProducts($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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


Flight::route('GET /getCatalogs/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
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
           
             echo modelGet::getCatalogs($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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


Flight::route('GET /getStores/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
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
           
             echo modelGet::getStores($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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



Flight::route('GET /getCategories/@headerslink/@clientId/@filter/@param/@value', function ($headerslink,$clientId,$filter,$param,$value) {
    
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
           
             echo modelGet::getCategories($response1,$xApiKey,$clientId,$filter,$param,$value);
           
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


Flight::route('POST /putProduct/@apk/@xapk', function ($apk,$xapk) {
  
   

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
        echo modelPut::putProduct($postData);
    
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


Flight::route('POST /putCatalog/@apk/@xapk', function ($apk,$xapk) {
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
        echo modelPut::putCatalog($postData);
    
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



Flight::route('POST /putCategorie/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPut::putCategorie($postData);
    
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



Flight::route('POST /putStore/@apk/@xapk', function ($apk,$xapk) {
  
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
        echo modelPut::putStore($postData);
    
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

Flight::start();
