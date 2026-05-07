<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    if(isset($_GET['credencials'])){
        //Aquest és el cas en que cal validar usuari i passord

        require_once '../models/usuariValidarModel.php';
        
        //He de decodificar
        $json= json_decode($_GET['credencials'],true);


        //Ens assegurem no arriben vuits
        
        if (isset($json['usuari'])) {
            $user = $json['usuari'];
        } else {
            $user = '';
        }
        
        //El mateix amb la forma més actual
        $pass = $json['password'] ?? '';

        // Instanciem el model (això executa el __construct i connecta a la BD)
        $uModel = new usuariValidarModel();

        // Cridem a la funció de validació
        if ($uModel->validarCredencials($user, $pass)) {
            // Tot correcte, he de serialitzar
            $resposta=array('resposta'=>1);
            echo json_encode($resposta);
        } else {
            // Credencials incorrectes, he de serialitzar
            $resposta=array('resposta'=>0);
            echo json_encode($resposta);
        }
    }
    
    
    if(isset($_GET['mclients'])){
        //Aquest és el cas en que llisto els clients

        require_once '../models/adminModel.php';
        
        //He de decodificar
        $json= json_decode($_GET['mclients'],true);

        // Instanciem el model (això executa el __construct i connecta a la BD)
        $aModel = new adminModel();

        echo json_encode($aModel->llistaClients());
    }
        
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

        //Aquest és el cas en que llisto els clients

        require_once '../models/adminModel.php';
        
        //He de decodificar
        //$json= json_decode($_GET['mclients'],true);

        // Instanciem el model (això executa el __construct i connecta a la BD)
        $aModel = new adminModel();
        
        $usuari = ["nom" => "Oriol"];

        echo json_encode($usuari);
    }
?>
