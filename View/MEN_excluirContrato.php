<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();

    if ((isset( $_GET['id_propriedade']))|| (isset( $_GET['id_inquilino']))){
        require_once '../Controller/MensalidadeController.php';

         $id_propriedade=(int)$_GET['id_propriedade'];
         $id_inquilino=(int)$_GET['id_inquilino'];
         $objControl = new MensalidadeController();
        $objControl->excluirContrato($id_propriedade,$id_inquilino);
    }else{
        
        header("Location:MEN_listar.php");
        
    }

?>


