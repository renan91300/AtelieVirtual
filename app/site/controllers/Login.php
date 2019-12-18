<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class Login{
		private $dados;
		private $logado; 
		public function index(){
			
			$this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (isset($this->dados['login'])) {
            //var_dump($this->dados);
            unset($this->dados['login']);
            $logado = new \Site\Models\Login();
            $logado->logar($this->dados);
              //  var_dump($this->dados);
               
            if ($logado->getResult()){ 
                $urlDestino = URL . 'Home/index';
                header("Location: $urlDestino");
               
            }else{
                // var_dump($logado->getResult()); 
                 $this->dados['formRetorno'] = $this->dados;
                 
            }
        }
                        

            
          
			

			
			$carregarView = new \Config\ConfigView("login/index", $this->dados);
			$carregarView->renderizarEspecifico();
            
            
            
            
            
            
            
		}
        
        
        public function logout(){ 
            $_SESSION['msg'] = "
                    <div class='alert alert-primary' role='alert'>
                      Usuário {$_SESSION['nome']} deslogado com sucesso!
                    </div>
                            ";
            session_unset();

            $urlDestino = URL . 'Home/index';
            header("Location: $urlDestino");

        
        
        }
	}