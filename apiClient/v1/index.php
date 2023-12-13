
<?php

require 'flight/Flight.php';

require 'database/db_users.php';
require 'env/domain.php';

 




Flight::route('POST /postProduct/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'productName' => Flight::request()->data->productName,
            'description' => Flight::request()->data->description,
            'ean1' => Flight::request()->data->ean1,
            'ean2' => Flight::request()->data->ean2,
            'sku' => Flight::request()->data->sku,

            'productType' => Flight::request()->data->productType,
            'inPrice' => Flight::request()->data->inPrice,
            'providerId' => Flight::request()->data->providerId,
            'imgUrl' => Flight::request()->data->imgUrl,
            'techSpef' => Flight::request()->data->techSpef

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/postProduct/$apk/$xapk";

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


Flight::route('POST /postCatalog/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'productId' => Flight::request()->data->productId,
            'categoryId' => Flight::request()->data->categoryId,
            'stock' => Flight::request()->data->stock,
            'secStock' => Flight::request()->data->secStock,
            'minQty' => Flight::request()->data->minQty,

            'maxQty' => Flight::request()->data->maxQty,
            'storeId' => Flight::request()->data->storeId,
            'outPrice' => Flight::request()->data->outPrice,
            'promoId' => Flight::request()->data->promoId,
            'discount' => Flight::request()->data->discount,
            'isPromo' => Flight::request()->data->isPromo,
            'isDiscount' => Flight::request()->data->isDiscount,
            'isEcommerce' => Flight::request()->data->isEcommerce,
            'isPos' => Flight::request()->data->isPos,
            'isInternal' => Flight::request()->data->isInternal,
            'isStocked' => Flight::request()->data->isStocked,
            'unit' => Flight::request()->data->unit,
            'readUnit' => Flight::request()->data->readUnit,
            'unitQty' => Flight::request()->data->unitQty,
            'unitUnit' => Flight::request()->data->unitUnit

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/postCatalog/$apk/$xapk";

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



Flight::route('POST /postStore/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'storeName' => Flight::request()->data->storeName,
            'comments' => Flight::request()->data->comments,
            'storeType' => Flight::request()->data->storeType

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/postStore/$apk/$xapk";

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


Flight::route('POST /postCategorie/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'categoryName' => Flight::request()->data->categoryName,
            'comments' => Flight::request()->data->comments,
            'parentId' => Flight::request()->data->parentId,
            'categoryType' => Flight::request()->data->categoryType

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/postCategorie/$apk/$xapk";

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
            $response = file_get_contents($sub_domain.'/kairosCom/apiCom/v1/getProducts/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
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




Flight::route('GET /getCatalogs/@headerslink/@clientId/@filter/@param/@value/@st', function ($headerslink,$clientId,$filter,$param,$value,$st) {
    
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
            $response = file_get_contents($sub_domain.'/kairosCom/apiClient/v1/getCatalogs/'.$clientId.'/'.$filter.'/'.$param.'/'.$value.'/'.$st, false, $context);
                 
           
        
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
            $response = file_get_contents($sub_domain.'/kairosCom/apiCom/v1/getStores/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
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
            $response = file_get_contents($sub_domain.'/kairosCom/apiCom/v1/getCategories/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
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


Flight::route('POST /putProduct/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'param' => Flight::request()->data->param,
            'value' => Flight::request()->data->value,
            'productId' => Flight::request()->data->productId

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/putProduct/$apk/$xapk";

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



Flight::route('POST /putCatalog/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'param' => Flight::request()->data->param,
            'value' => Flight::request()->data->value,
            'catalogId' => Flight::request()->data->catalogId

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/putCatalog/$apk/$xapk";

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



Flight::route('POST /putCategorie/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'param' => Flight::request()->data->param,
            'value' => Flight::request()->data->value,
            'categoryId' => Flight::request()->data->categoryId

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/putCategorie/$apk/$xapk";

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



Flight::route('POST /putStore/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {
        $dta = array(
            
            'clientId' => Flight::request()->data->clientId,
            'param' => Flight::request()->data->param,
            'value' => Flight::request()->data->value,
            'storeId' => Flight::request()->data->storeId

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
      $url = $sub_domain1."/kairosCom/apiCom/v1/putStore/$apk/$xapk";

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
                 
           
        
              echo "hello";



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
