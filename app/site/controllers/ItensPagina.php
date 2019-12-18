<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class ItensPagina{
		private $dados;
		
		public function index(){
			
			

            if(isset($_GET['excluir'])){ 
            $Album = new \Site\Models\Item();
            $Album->delItem($_GET['excluir']);
            
            }
            
			$Album = new \Site\Models\Item();
			$this->dados['listaItem'] = $Album->listarItensPagina();

		      
              
            $getCategorias = new \Site\Models\Categoria();
			$this->dados['categoriasItens'] = $getCategorias-> getCategoriasItem($this->dados['listaItem']);
            
            $pagina =  new \Site\Models\PaginaProdutor(); 
            $this->dados['pagina'] =  $pagina->getPagina(); 
             
			$carregarView = new \Config\ConfigView("itensPagina/index", $this->dados);
			$carregarView->renderizar();
            
            
            
            
            
            
            
		}
	}