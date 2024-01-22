<?php

class modelGet{

public static function getProducts($response1,$xApiKey,$clientId,$filter,$param,$value){
   
  
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
            $response = file_get_contents($sub_domain.'/kairosCom/apiCom/v1/getProducts/'.$clientId.'/'.$filter.'/'.$param.'/'.$value, false, $context);
                 
           
        
              
  return $response;

}

}



?>