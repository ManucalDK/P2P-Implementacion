 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require_once './controllers/ServiceController.php';
    $servicio = new ServiceController("http://www.webservicex.net/globalweather.asmx?WSDL");
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>HOLA MUNDOS!!</h1>
        <?php
            $parametros = array();
            $parametros["CountryName"]="colombia";
            $response=$servicio->make_contection("GetCitiesByCountry", $parametros);
            echo "<p>".implode($response)."</p><br><br><br><br>";
            var_dump($response);
        ?>
    </body>
</html>
