<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	Class PaginaProdutor{
			private $dados; 
            private $pagina; 
		public function index(){
			


             
			$getPagina = new \Site\Models\PaginaProdutor();
			$this->dados['pagina'] = $getPagina->getPagina();
			
             if(!empty($this->dados['pagina'])){ 
                
             
                  
                 
                $getItens = new \Site\Models\Item();
                $this->dados['itensPagina'] = $getItens->listarItensPagina();




                $getCarousel = new \Site\Models\Item();
                $this->dados['itens'] = $getCarousel->listarCarousel();
                 
                
               $Album = new \Site\Models\Item();
			   $this->dados['listaItem'] = $Album->listarItensPagina();
                 
                 

                $getCarousel = new \Site\Models\PaginaProdutor();
                $this->dados['categorias'] = $getCarousel->getCategoriasPagina($_GET['id']);


                $carregarView = new \Config\ConfigView("paginaProdutor/index", $this->dados);
                $carregarView->renderizar();
                 
                 
                 
            } else { 

                 $urlDestino = URL . 'Home/index';
                 header("Location: $urlDestino");

            
            }
                 
                 
		}
        
        
        public function logada(){
                
            
         
			$getPagina = new \Site\Models\PaginaProdutor();
			$this->dados['pagina'] = $getPagina->getPagina();
		  
            
        
            $_SESSION['idPagina'] = $this->dados['pagina'][0]['idPagina']; 
            $_SESSION['dono'] = 1;
 
             if(!empty($this->dados['pagina'])){ 
            
                $getItens = new \Site\Models\Item();
                $this->dados['itensPagina'] = $getItens->listarItensPagina();
                
                 $Album = new \Site\Models\Item();
			     $this->dados['listaItem'] = $Album->listarItensPagina();


                 

                $getCarousel = new \Site\Models\PaginaProdutor();
                $this->dados['categorias'] = $getCarousel->getCategoriasPagina($_GET['id']);

                 

                $getCarousel = new \Site\Models\Item();
                $this->dados['itens'] = $getCarousel->listarCarousel();
                 


                $carregarView = new \Config\ConfigView("paginaProdutor/logada", $this->dados);
                $carregarView->renderizar();
                 
            } else { 

                 $urlDestino = URL . 'Home/index';
                 header("Location: $urlDestino");

            
            }
            
            
            
        } 
	}