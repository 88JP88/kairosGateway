<?php

class model_dom {

function dom() {
    $option=2; //opcion de subdominio


    if($option==1){//localhost
        $sub_domain="http://localhost";
        return $sub_domain;

    }
    if($option==2){//desarrollo
 $sub_domain="https://dev-kairoscore.lugma.tech"; // o dirección IP del servidor de la base de datos remota
 return $sub_domain;

    }
    if($option==3){//pruebas-staging
        $sub_domain="https://staging-kairoscore.lugma.tech";
        return $sub_domain;
    }
    if($option==4){//ptoducción

        $sub_domain="https://kairoscore.lugma.tech";
        return $sub_domain;
    }
   //$sub_domain="https://dev-lugmacore.lugma.tech"; // o dirección IP del servidor de la base de datos remota
   
}
}

?>