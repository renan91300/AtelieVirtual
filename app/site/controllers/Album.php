<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class Album{
		private $dados;
		
		public function index(){
			
			

            if(isset($_GET['excluir'])){ 
            $Album = new \Site\Models\Album();
            $Album->delAlbum($_GET['excluir']);
            
            }
            
            
			$Album = new \Site\Models\Album();
			$this->dados['Album'] = $Album->getAlbum();

			$AlbumItens = new \Site\Models\Album();
			$this->dados['listaItem'] = $Album->getItensAlbum($this->dados['Album']);
            
            $pagina =  new \Site\Models\PaginaProdutor(); 
            $this->dados['pagina'] =  $pagina->getPaginaAlbum($this->dados['Album']); 
            
             $getCategorias = new \Site\Models\Categoria();
			$this->dados['categoriasItens'] = $getCategorias-> getCategoriasItem($this->dados['listaItem']);
            
            
			$carregarView = new \Config\ConfigView("Album/index", $this->dados);
			$carregarView->renderizar();
            
            
            
            
            
            
            
		}
	}