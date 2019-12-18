<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class PaginaProdutor{ 

	 	private $result; 
	 	private $tabela = "pagina"; 
        private $idPagina;
        private $addCategoria;

	 	public function listar(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico("SELECT sr.* 
                FROM {$this->tabela} sr INNER JOIN pagina co ON co.id = sr.adm_cor_id 
                ORDER BY sr.data_criacao DESC LIMIT :limit", "limit=3"
			
			     );
	 		$this->result['video'] = $listar->getResult(); 
	 		return $this->result['video'];  

	 	}
	 	public function getPagina(){
	 		$id = $_GET['id']; 	
	 		$pagina = new  \Site\models\helper\ModelsRead();
	 		$pagina->exeRead($this->tabela, "WHERE idPagina={$id}  LIMIT :limit", "limit=1"); 
	 		$this->result['pagina'] = $pagina->getResult(); 
	 		return $this->result['pagina'];
	 	}
         
         


	 		public function getPaginaAlbum($album){
	 		extract($album); 
            
            $id = $album[0]['idPagina'];
	 		$pagina = new  \Site\models\helper\ModelsRead();
	 		$pagina->exeReadEspecifico("SELECT pg.* FROM {$this->tabela} as pg, album as ab WHERE pg.idPagina = {$id} "); 
	 		$this->result['pagina'] = $pagina->getResult(); 
	 		return $this->result['pagina'];
	 	}
	 




	 	public function listarCarouselProdutor(){ 
	 			$listar = new  \Site\models\helper\ModelsRead();
	 	 		$listar->exeReadEspecifico("SELECT it.nomeItem, it.imagemItem, pg.nomePagina 
	 			FROM item  it INNER JOIN {$this->tabela}  pg ON it.idPagina = pg.idPagina 
				ORDER BY it.idItem DESC LIMIT :limit","limit=10");
	 		$this->result['itens'] = $listar->getResult(); 
	 		return $this->result['itens'];  


	 	}




	 	public function getPaginaItem($item){ 
	 		 	foreach ($item as $item2) {
	 		extract($item2); 
	 	}
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead( $this->tabela," WHERE idPagina = {$idItem} 
                  LIMIT :limit", "limit=1");
	 		$this->result['pagina'] = $listar->getResult(); 
	 		return $this->result['pagina'];  

	 	}
         
         	public function getCategoriasPagina($id){
	 		$idPagina = $id;
	 		$categorias = new \Site\models\helper\ModelsRead();
	 		$categorias->exeReadEspecifico("
           
            SELECT ca.*FROM categoria as ca, relacao_categoria_pagina as rel WHERE rel.idPagina={$idPagina} AND ca.idCategoria = rel.idCategoria; 
             
             ");   
	 		$this->result= $categorias->getResult(); 
	 		return $this->result; 

	 	}


         public function addCategoria($arrayCategorias){ 
	 		

	 		foreach ($arrayCategorias as $categoria) {
	 			//var_dump($categoria); 
	 			$addCategoria = new \Site\models\helper\ModelsCreate();
	 			

	 			$idPessoa = $this->getPagina();
	 		
                  
                
                  $relacoes = new  \Site\models\helper\ModelsRead(); 
	 		     $relacoes->exeRead("relacao_categoria_pagina","WHERE {$idPagina[0]['idPagina']}= idPagina AND {$categoria} = idCategoria GROUP BY idPagina");
           
	 			
                     if(empty($relacoes->getResult())){ 
	 			$categoriaAdicionada['idPagina'] = $idPagina[0]['idPagina']; 
	 			$categoriaAdicionada['idCategoria'] = $categoria; 

	 			$addCategoria->exeCreate("relacao_categoria_pagina", $categoriaAdicionada); 
                     } 

	 		}

	 	}




	}