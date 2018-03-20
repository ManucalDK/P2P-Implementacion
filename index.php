 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require_once './controllers/Bancos.php';;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $Bancos = new Bancos();
            $response = $Bancos->getBankList();
        ?>
        <h1>PSE - Place 2 Play</h1>
        <form name="formTransaction" method="POST" enctype="multipart/form-data">
            <select>
                <?php
                        foreach ($response as $banco) {
                            echo "<option id='".$banco["bankCode"]."'>".$banco["bankName"]."</option>";
                        }
                ?>
            </select>
        </form>
    </body>
</html>
