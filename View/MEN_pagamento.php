<?php

//CONECTAR          
require_once '../Model/connect.php';
require_once '../Controller/UsuarioController.php';
$objControl = new UsuarioController();

$objControl->verificarlogin();

if ((isset($_GET['id']))||((isset( $_GET['id_propriedade']))|| (isset( $_GET['id_inquilino'])))) {
    require_once '../Controller/MensalidadeController.php';
    $id_inquilino=(int)$_GET['id_inquilino'];
    $id_propriedade=(int)$_GET['id_propriedade'];
    $id_mensalidade = (int) $_GET['id'];
    $objControl = new MensalidadeController();
    $objControl->pagamento($id_mensalidade,$id_inquilino,$id_propriedade);
} else {

    header("Location:MEN_listar.php");
}
?>

