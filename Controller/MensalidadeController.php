<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MensalidadeController
 *
 * @author JankieChan
 */
class MensalidadeController {

    public function contratos($idUsu) {
        require ('../Model/MEN_Crud.php');
        listarContratos($idUsu);
    }

    public function mensalidades($id_propriedade, $id_inquilino) {
        require ('../Model/MEN_Crud.php');
        listarMensalidades($id_propriedade, $id_inquilino);
    }

    public function cadastrarMensalidades($inquilino, $propriedade, $data_vencimento, $valor, $qtd) {
        require ('../Model/MEN_Crud.php');
        $array = explode("/", $data_vencimento);

        $mes = (int) $array[1];
        $dia = (int) $array[0];
        $ano = (int) $array[2];

        for ($i = 0; $i < $qtd; $i++) {

            cadastrarMensalidade($propriedade, $inquilino, $dia, $mes, $ano, $valor, "Nao Pago");
            if ($mes == 12) {
                $mes = 01;
                $ano = $ano + 1;
            }
            $mes++;
        }
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Contrato  da propriedade" . $propriedade . " com inquilino " . $inquilino . " cadastrada com sucesso", $_SESSION['idUSU'])) {
            
        }

        Alert("Oba!", "Alocação realizada com sucesso!", "success");
        echo "<a href='/SGA/view/MEN_listar.php'> Listar Contratos</a>";
    }

    public function excluirContrato($id_propriedade, $id_inquilino) {
        require ('../Model/MEN_Crud.php');
        excluirContrato($id_propriedade, $id_inquilino);
    }
    public function pagamento($id_mensalidade,$id_inquilino,$id_propriedade){
        require ('../Model/MEN_Crud.php');
        pagamento($id_mensalidade,$id_inquilino,$id_propriedade);
        
    }
       public function excluirMensalidade($id_mensalidade,$id_inquilino,$id_propriedade){
        require ('../Model/MEN_Crud.php');
        excluirMensalidade($id_mensalidade,$id_inquilino,$id_propriedade);
        
    }
    public function atualizarMensalidade($id_mensalidade,$data_vencimento, $id_propriedade, $valor,$situacao,$id_inquilino){
        require ('../Model/MEN_Crud.php');
        $array = explode("/", $data_vencimento);

        $mes = (int) $array[1];
        $dia = (int) $array[0];
        $ano = (int) $array[2];
        atualizarMensalidade($id_mensalidade,$id_inquilino,$id_propriedade,$dia,$mes,$ano,$situacao,$valor);
        
    }
}
