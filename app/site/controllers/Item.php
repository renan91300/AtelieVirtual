<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class Item{
		private $dados;
		
		
		public function index(){
			
			

		    
            

			$listarItem = new \Site\Models\Item();
			$this->dados['item'] = $listarItem->getItem();
			
            $getCategorias = new \Site\Models\Categoria();
            $this->dados['categorias'] = $getCategorias-> getCategoriasItem($this->dados['item']);
          
            
             
            if(!empty($this->dados['item'])){ 
               
             
             
                //$alguns = new \Site\Models\Album(); 
                
                
                $listarItemCarousel = new \Site\Models\Item();
                $this->dados['itens'] = $listarItemCarousel->listarCarousel();
                $idPagina = extract($this->dados['item']); 
                //  var_dump($this->dados['item'][0]['idPagina']);     
                $Album = new \Site\Models\Album();
                $this->dados['albuns'] = $Album->getAlbunsItem($this->dados['item'][0]['idItem']);
                $this->dados['albunsPagina'] = $Album->getAlbuns($this->dados['item'][0]['idPagina']); 
                
                
                $carregarView = new \Config\ConfigView("item/index", $this->dados);
                $carregarView->renderizar();

            } else { 
                
            //   $urlDestino = URL . 'Home/index';
             //  header("Location: $urlDestino");
            
            
            }
                
			//$listarPaginaProdutor = new \Site\models\PaginaProdutor();
			//$this->dados['pagina'] = $listarPaginaProdutor->getPaginaItem($this->dados['item']);
 
			     
         if(!empty($_GET["albuns"])){
   				
                unset($this->dados['albunsArray']);
                $this->dados['albunsArray'] = $_GET["albuns"];

			   	$addAlbum = new \Site\Models\Item();
              var_dump($this->dados['albunsArray']); 
				$addAlbum->addAlbum($this->dados['albunsArray']);
             
              //    $urlDestino = URL . 'Item/index?id='.$dados['item'][0]['idItem'];
              // header("Location: $urlDestino");

			}   
			
            
            
            
            
            
		}
	}