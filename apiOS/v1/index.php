
<?php

require 'flight/Flight.php'; 
require 'env/domain.php';
require_once 'model/users/postModel.php';
require_once 'model/users/getModel.php';
require_once 'model/modelSecurity/authModel.php';
require_once 'model/users/responses.php';


Flight::route('POST /postPlace/@apk/@xapk', function ($apk,$xapk) {
  
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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postPlace"
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




Flight::route('POST /postSite/@apk/@xapk', function ($apk,$xapk) {
  
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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postSite"
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
$postData['apiValues'] = [
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postCatalog"
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



Flight::route('POST /postElement/@apk/@xapk', function ($apk,$xapk) {
  
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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postElement"
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


Flight::route('POST /postCategory/@apk/@xapk', function ($apk,$xapk) {
  
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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postCategory"
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


Flight::route('GET /getPlaces/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getPlaces"
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



Flight::route('GET /getCustomers/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getCustomers"
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


Flight::route('GET /getOrdersCalculate/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getOrdersCalculate"
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


Flight::route('GET /getCategories/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getCategories"
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



Flight::route('GET /getSites/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getSites"
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





Flight::route('GET /getElements/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getElements"
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
Flight::route('GET /getCatalogs/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getCatalogs"
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

Flight::route('GET /getProducts/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getProducts"
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

Flight::route('POST /putPlace/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putPlace"
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
$postData['apiValues'] = [
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putCatalog"
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



Flight::route('POST /postOrder/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postOrder"
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

Flight::route('POST /putCategory/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putCategory"
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


Flight::route('POST /putElement/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putElement"
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
$postData['apiValues'] = [
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putProduct"
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

Flight::route('POST /putSite/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putSite"
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
$postData['apiValues'] = [
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putCustomer"
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
$postData['apiValues'] = [
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postProduct"
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


Flight::route('POST /postEmployee/@apk/@xapk', function ($apk,$xapk) {
  
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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postEmployee"
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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"postCustomer"
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



Flight::route('GET /getOrders/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getOrders"
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


Flight::route('GET /getEmployees/@headerslink/@apiData', function ($headerslink,$apiData) {
    
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
                "serviceName"=>"kairosOS",
                "apiName"=>"apiOS",
                "apiVersion"=>"v1",
                "endPoint"=>"getEmployees"
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





Flight::route('POST /putEmployee/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putEmployee"
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


Flight::route('POST /putOrder/@apk/@xapk', function ($apk,$xapk) {
  
   

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
    "serviceName"=>"kairosOS",
    "apiName"=>"apiOS",
    "apiVersion"=>"v1",
    "endPoint"=>"putOrder"
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
Flight::start();
