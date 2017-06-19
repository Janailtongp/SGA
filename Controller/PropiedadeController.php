<?php
  require ('../Model/PROP_Crud.php');
class PropiedadeController{
    
  
    public function Cadastrar($rua,$numero,$bairro,$cidade, $cep, $situacao, $obs){
        cadastrarPropiedade($_SESSION['idUSU'], $bairro, $rua, $cep, $cidade, $numero, $obs, $situacao);
    }
    public function listar($id_usu){
        listarPropiedade($id_usu);
    }
    public function excluir($id){
        excluirPropiedade($id,$_SESSION['idUSU']);
        
        
    }
    public function atualizar($id, $bairro, $rua, $cep, $cidade, $num, $obs, $status){
        editarPropieade($id, $_SESSION['idUSU'], $bairro, $rua, $cep, $cidade, $num, $obs, $status);
    }
}

