<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroUsuario{
		private $dados; 
		
		public function index(){
		
			 $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($this->dados['formAddPessoa'])) {
            //var_dump($this->dados);
            unset($this->dados['formAddPessoa']);
            $addPessoa = new \Site\Models\CadastroUsuario();
            $addPessoa->addPessoa($this->dados);
            if (!$addPessoa->getResult()){
                $this->dados['formRetorno'] = $this->dados;
            }else{
                $this->dados['formRetorno'] = null;
                $urlDestino = URL . 'Perfil/index'; 
                header("Location: $urlDestino");
            
            }
        }
            
        	//var_dump($this->dados); 
			$carregarView = new \Config\ConfigView("cadastrousuario/index", $this->dados);
			$carregarView->renderizar();
		}
	}