<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class Home{
		private $dados;
		
		public function index(){
            
			 
			$getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listarRD();
            
          

                      
             
            $listarItem = new \Site\Models\Home();
            $this->dados['listaItem'] = $listarItem->listar();
            
            $getCategorias = new \Site\Models\Categoria();
			$this->dados['categoriasItens'] = $getCategorias-> getCategoriasItem($this->dados['listaItem']);
            
            $carregarView = new \Config\ConfigView("home/index", $this->dados);           
            $carregarView->renderizarHome();       

         
                
          
		}
        
        
        public function vermais(){ 
          
            $getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listar();

            
            $listarItem = new \Site\Models\Home();
			     $this->dados['listaItem'] = $listarItem->vermais();
            
             $getCategorias = new \Site\Models\Categoria();
			$this->dados['categoriasItens'] = $getCategorias-> getCategoriasItem($this->dados['listaItem']);
            
                $carregarView = new \Config\ConfigView("home/vermais", $this->dados);
                $carregarView->renderizarHome();     
            
            
            
        }
        
        
          public function categoria(){ 
          
             
                
             
             if(isset($_GET['seguir'])){ 
                
                 
                $add = new \Site\Models\Perfil();
                $add->addCategoriaPorId($_GET['idCategoria']);
         
              }
              
                 
             if(isset($_GET['desseguir'])){ 
                
                 
                $add = new \Site\Models\Perfil();
                $add->delCategoriaPorId($_GET['idCategoria']);
         
              }
              
              
            
            $getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listar();
              
           if(isset($_SESSION['idPessoa'])){    
            $veSeSegue = new \Site\Models\Perfil();
              if($veSeSegue->verSeSegue($_GET['idCategoria'])==1){ 
                 $this->dados['seguindo'] = 1; 
              }else{ 
                $this->dados['seguindo'] = 0; 
              
              }
               }
              
              
              
              
            $listarItem = new \Site\Models\Categoria();
			 $this->dados['listaItem'] = $listarItem->categoriaEspecifica(); 
              
              $getCategorias = new \Site\Models\Categoria();
		
              
              $this->dados['categoriasItens'] = $getCategorias-> getCategoriasItem($this->dados['listaItem']);
            
          
              
              $carregarView = new \Config\ConfigView("home/categoria", $this->dados);
                $carregarView->renderizarHome();     
            
            
            
        }
	}

