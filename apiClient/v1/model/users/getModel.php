<?php
class modelGet{


    
    public static function getModel($apiData){
   
  
        $sub_domaincons = new model_dom();
                $sub_domain = $sub_domaincons->domCom();
                
                $response1=$apiData['apk'];
                $xApiKey=$apiData['xapk'];
                $serviceName=$apiData['apiValues']['serviceName'];
                $apiName=$apiData['apiValues']['apiName'];
                $apiVersion=$apiData['apiValues']['apiVersion'];
                $endPoint=$apiData['apiValues']['endPoint'];
               




                // Configurar los headers
                $options = array(
                    'http' => array(
                        'header' => "Api-Key: $response1\r\n" .
                                    "x-api-Key: $xApiKey\r\n"
                    )
                );
                $context = stream_context_create($options);
                unset($apiData['apiValues']);
                unset($apiData['apk']);
                unset($apiData['xapk']);
                $appDataJson=json_encode($apiData);
               
                // Realizar la solicitud y obtener la respuesta
                $response = file_get_contents($sub_domain.'/'.$serviceName.'/'.$apiName.'/'.$apiVersion.'/'.$endPoint.'/'.$appDataJson, false, $context);
                     
               
            
                 // return $appDataJson;
      return $response;
      
      }


}

?>