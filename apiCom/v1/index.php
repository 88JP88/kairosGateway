
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



Flight::start();
