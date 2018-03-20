<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controlador que me permite construir la lista con los bancos disponibles
 * ademas de verificar y/o armar la cache como indica en la documentación
 * @author Manucal
 */

require_once 'PseController.php';
class Bancos {
    private $ListaBancos;
    
    private $client;
    
    
    function getBankList(){
        $client = new PseController();
        $this->ListaBancos = $client->getBankList();
        return $this->ListaBancos;
    }
}
