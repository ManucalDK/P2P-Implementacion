<?php

/**
 * Clase encargada de realizar la conexion a los servicios web y mapear/retornar los datos del response
 * @author Manucal
 */
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

   function make_contection($funcion, $parameters){
       $url = $this->getUrl();
       $this->setParameters($parameters);
       $client = new SoapClient($url);
       try{
           $response = $client->__soapCall($funcion, $this->getParameters());
           
       } catch (SoapFault $ex) {
           return "";
       }
   }

}
