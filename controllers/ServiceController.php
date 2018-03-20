<?php

/**
 * Clase encargada de realizar la conexion a los servicios web y mapear/retornar los datos del response
 * @author Manucal
 */

include("./lib/nusoap.php");

class ServiceController {
   private $url; # Url del servicio web
   
   function __construct($url) {
       $this->url = $url;
   }
   
   function getUrl() {
       return $this->url;
   }

   function setUrl($url) {
       $this->url = $url;
   }
   /**
    * 
    */
   function make_contection($funcion, $parametros){
           $url = $this->getUrl(); #accedo a la url registrada del servicio.
           $client = new nusoap_client($url, "wsdl"); #inicio el cliente SOAP.
           $error = $client->getError();
           
           if($error){ #se valida si existen errores al tratar de establecer una conexión al servicio.
               throw new Exception("ERROR - algo fallo al tratar de conectarse al servicio. \n".$error);
           }
           else{
               $response = $client->call($funcion, $parametros);
               if($client->fault){
                   throw new Exception("ERROR - algo fallo al ejecutar la funcion ".$funcion."\n".$response."\n".$error);
               }
               else {
                   $error = $client->getError();
                   if($error){
                       throw new Exception("ERROR - algo fallo al ejecutar la funcion ".$funcion."\n".$response."\n".$error);
                   }
                    else {
                       return $response;
                    }
               }
           }
   }

}
