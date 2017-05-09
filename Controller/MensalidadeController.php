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
        public function contratos($idUsu){
            require ('../Model/MEN_Crud.php');
            listarContratos($idUsu);    

        }
        
            public function  cadastrarMensalidades($inquilino,$propriedade,$data_vencimento,$valor,$qtd){
                require ('../Model/MEN_Crud.php');
                $array=explode("/",$data_vencimento);
                     
                $mes = (int)$array[1];
                $dia = (int)$array[0];
                $ano = (int)$array[2];
                
                for($i=0;$i<$qtd;$i++){
                    
                    cadastrarMensalidade($propriedade, $inquilino, $dia, $mes, $ano, $valor, "Nao Pago");
                    if($mes==12){
                        $mes=01;
                        $ano=$ano+1;
                    }
                    $mes++;
                }
                Alert("Oba!", "Alocação realizada com sucesso!", "success");
                echo "<a href='/SGA/view/MEN_listar.php'> Listar Propriedades</a>";

            }
    
}
