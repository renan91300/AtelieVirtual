<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	    
    class Servico{ 
        
        private $result; 
        private $tabela = "servico"; 
        
        public function listar(){ 
            $listar = new \Site\models\helper\modelsRead(); 
            $listar->exeReadEspecifico("SELECT sr.*, co.cor 
                FROM {$this->tabela} sr INNER JOIN adm_cor co ON co.id = sr.adm_cor_id 
                ORDER BY sr.data_criacao DESC LIMIT :limit", "limit=3");
            
            $this->result['servicos'] = $listar->getResult(); 
            return $this->result['servicos'];  
            
        }
    
    }
?>