<?php

/**
 * Clase encargada de gestionar las credenciales para la conexion al servicio
 * y ejecutar la llamada a los servicios
 *
 * @author Manucal
 */

include_once 'ServiceController.php';
class PseController {
    
    private $url;
    private $key;
    private $id;
    
    function __construct() {
        $this->url = "https://test.placetopay.com/soap/pse/?wsdl";
        $this->key = "024h1IlD";
        $this->id = "6dd490faf9cb87a9862245da41170ff2";
    }
    
    function getUrl() {
        return $this->url;
    }

    function getKey() {
        return $this->key;
    }

    function getId() {
        return $this->id;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setKey($key) {
        $this->key = $key;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    private function getSeed(){
        return date('c');
    }
    
    private function getHash($semilla){
        return sha1($semilla.$this->key, false);
    }
    

    function getBankList(){
        $cliente = new ServiceController($this->url);
        $semilla = $this->getSeed();
        
        $parametros = array();
        $parametros["login"]= $this->id;
        $parametros["tranKey"]= $this->getHash($semilla);
        $parametros["seed"]= $semilla;
        
        $arregloBancos = $cliente->make_contection("getBankList", $parametros);
        
        return $arregloBancos;
    }   
}