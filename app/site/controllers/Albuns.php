<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class Albuns{
		private $dados;
		
		public function index(){
			
			 if(isset($_GET['excluir'])){ 
            $Album = new \Site\Models\Album();
            $Album->delAlbum($_GET['excluir']);
        
            }
            

            
            
			$Album = new \Site\Models\Album();
			$this->dados['albuns'] = $Album->getAlbuns($_GET['id']);

		
            $pagina =  new \Site\Models\PaginaProdutor(); 
            $this->dados['pagina'] =  $pagina->getPagina(); 
            
           
            
             $getCategorias = new \Site\Models\Categoria();
			$this->dados['categoriasAlbuns'] = $getCategorias-> getCategoriasAlbuns($this->dados['albuns']);
            
			$carregarView = new \Config\ConfigView("Albuns/index", $this->dados);
			$carregarView->renderizar();
            
            
            
            
            
            
            
		}
	}