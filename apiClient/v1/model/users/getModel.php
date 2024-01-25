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
                $appData=urlencode($apiData);
                // Realizar la solicitud y obtener la respuesta
                $response = file_get_contents($sub_domain.'/'.$serviceName.'/'.$apiName.'/'.$apiVersion.'/'.$endPoint.'/'.$appData, false, $context);
                     
               
            
                  
      return $response;
      
      }

    public static function getCustomers($response1,$xApiKey,$clientId,$filter,$param,$value){
   
  
        $sub_domaincons = new model_dom();
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
                     
               
            
                  
      return $response;
      
      }
      public static function getDelivery($response1,$xApiKey,$clientId,$filter,$param,$value){
   
  
        $sub_domaincons = new model_dom();
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
                     
               
            
                  
      return $response;
      
      }
      public static function getOrders($response1,$xApiKey,$clientId,$filter,$param,$value){
   
  
        $sub_domaincons = new model_dom();
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
                     
               
            
                  
      return $response;
      
      }
      public static function getPickUpPoints($response1,$xApiKey,$clientId,$filter,$param,$value){
   
  
        $sub_domaincons = new model_dom();
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
                     
               
            
                  
      return $response;
      
      }

}

?>