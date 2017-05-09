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
    
}
