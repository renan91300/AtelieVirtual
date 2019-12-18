<?php
	namespace Config;
	
	class ConfigView{
		
		private $nome;
		private $dados;
		private $verificarLogin; 
		public function __construct($nome, array $dados = null){
			$this->nome = (string) $nome;
			$this->dados = $dados;
			//var_dump($this->dados);
		}
		
        
        private function verificarLogin(){ 
            
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                 // session_unset();           
                  return false;
                }else{  
                    return true; 
                }
        } 


        
		public function renderizar(){

            if($this->verificarLogin() ){
                $this->renderizarLogado(); 
            } else { 
            
            if(file_exists("app/site/views/{$this->nome}.php")){
				include_once('app/site/views/includes/header.php');
				include_once("app/site/views/{$this->nome}.php");
              //  var_dump($this->nome);
				include_once('app/site/views/includes/footer.php');
				include_once('app/site/views/includes/footerAtelie.php');
			}else{
				echo "Erro ao carregar a página: {$this->nome}";
			}
            } 
        }
        
        
        public function renderizarHome(){

            if($this->verificarLogin() ){
                include_once('app/site/views/includes/headerLogado.php');
              
                include_once("app/site/views/{$this->nome}.php");
                include_once("app/site/views/includes/homeItens.php");
                include_once('app/site/views/includes/card.php');
				include_once('app/site/views/includes/footer.php'); include_once('app/site/views/includes/footerAtelie.php');  
                
            } else { 
            
            if(file_exists("app/site/views/{$this->nome}.php")){
				include_once('app/site/views/includes/header.php');
				
                include_once("app/site/views/{$this->nome}.php");
                include_once("app/site/views/includes/homeItens.php");
                include_once('app/site/views/includes/card.php');
				include_once('app/site/views/includes/footer.php'); include_once('app/site/views/includes/footerAtelie.php');
			}else{
				echo "Erro ao carregar a página: {$this->nome}";
			}
            } 
        }
            
        public function renderizarRestrito(){ 
             if($this->verificarLogin() ){
                $this->renderizarLogado(); 
            } else { 
            		echo "Erro ao carregar a página: {$this->nome}";
			}
        } 
        
        
        
        public function renderizarLogado(){
            if(file_exists("app/site/views/{$this->nome}.php")){
          
                   include_once('app/site/views/includes/headerLogado.php');
				   include_once("app/site/views/{$this->nome}.php");
                   include_once('app/site/views/includes/footer.php');
				   include_once('app/site/views/includes/footerAtelie.php');
			}else{
				echo "Erro ao carregar a página: {$this->nome}";
			}
                
        
            }
        
            
            
             public function renderizarEspecifico(){ 
            if(file_exists("app/site/views/{$this->nome}.php")){ 
                if($this->nome == "login/index"){
                   include_once('app/site/views/includes/header.php');
				   include_once("app/site/views/{$this->nome}.php");    
                }
        
            }
         }

        
        
          public function renderizarAdm(){
        if (file_exists("app/adm/views/{$this->nome}.php")){
            include_once('app/adm/views/includes/header.php');
            include_once('app/adm/views/includes/menu.php');
            include_once("app/adm/views/{$this->nome}.php");
            include_once('app/adm/views/includes/footer.php');
        }else{
            echo "Erro ao carregar a página: {$this->nome}";
        }
    }

    public function renderizarAuth(){
        if (file_exists("app/adm/views/{$this->nome}.php")){
            include_once("app/adm/views/{$this->nome}.php");
        }else{
            echo "Erro ao carregar a página: {$this->nome}";
        }
    }
}
            
        
    
     
            
