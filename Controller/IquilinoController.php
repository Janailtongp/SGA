<?php
 
class IquilinoController{
    
  
    public function Cadastrar($nome,$email,$telefone,$id_usuario){
        require ('../Model/INQ_Crud.php');
        cadastrarInquilino($id_usuario,$nome, $telefone, $email);
    }
    public function listar($id_usu){
        require ('../Model/INQ_Crud.php');
        listarIquilino($id_usu);
        
    }
    public function excluir($id,$id_usu){
        require ('../Model/INQ_Crud.php');
        excluirInquilino($id,$id_usu);
        
        
    }
    public function atualizar($nome, $email, $telefone,$idUsu ,$id){
        require ('../Model/INQ_Crud.php');
        editarInquilino($id, $idUsu, $nome, $telefone, $email);
    }
}

