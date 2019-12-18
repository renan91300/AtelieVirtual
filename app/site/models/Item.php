<?php
	namespace site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class Item{ 

	 	private $result; 
	 	private $tabela = 'item'; 

	 	/*public function getItem(){ 
	 		$id = $_GET['id']; 
	 		var_dump($id);
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead($this->tabela, "WHERE idItem={$id}  LIMIT :limit", "limit=1");
	 		$this->result= $listar->getResult(); 
	 		return $this->result;  
	 		
	 	}*/

         public function getItemAlbum($albuns){ 
         
         
         }

	 	public function getItem(){ 
	 		if(isset($_GET['id']))$id = $_GET['id'];
            else $id = $_SESSION['id']; 
                
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico("SELECT it.*, pg.*
	 			FROM {$this->tabela}  it INNER JOIN pagina  pg ON it.idPagina = pg.idPagina WHERE it.idItem = {$id} ");
	 		$this->result['pagina'] = $listar->getResult(); 
	 		return $this->result['pagina'];  

	 	}
         
               public function delItem($cat){ 
	 			$deletar = new \Site\models\helper\ModelsRead();
             
             
                $deletar->exeReadEspecifico("DELETE FROM item   WHERE idItem ={$cat} ") ; 
               $deletar->getResult(); 


	 	}

	 	public function listarItensPagina(){ 
	 		$id = $_GET['id'];
	 		$itens = new  \Site\models\helper\ModelsRead(); 
	 		$itens->exeRead($this->tabela,"WHERE {$id}= idPagina");  
	 		$this->result['itensPagina'] = $itens->getResult();
	 		return $this->result['itensPagina']; 
	 	}

	 	 	public function listar(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead($this->tabela, " ORDER BY idItem DESC LIMIT :limit", "limit=7");
	 		$this->result['listaItem']= $listar->getResult(); 


	 		return $this->result['listaItem'];  


	 	}
         
         public function addAlbum($arrayCategorias){ 
	 		
	 		foreach ($arrayCategorias as $categoria) {
	 			
	 			$addCategoria = new \Site\models\helper\ModelsCreate();
	 			

	 			$idPessoa = $this->getItem();
                 
                $relacoes = new  \Site\models\helper\ModelsRead(); 
	 		     $relacoes->exeRead("relacao_album_item","WHERE {$idPessoa[0]['idItem']}= idItem AND {$categoria} = idAlbum GROUP BY idItem");
                
                if(empty($relacoes->getResult())){ 
                    echo"asda"; 
	 			   $categoriaAdicionada['idItem'] = $idPessoa[0]['idItem']; 
	 			   $categoriaAdicionada['idAlbum'] = $categoria; 
	 			   $addCategoria->exeCreate("relacao_album_item", $categoriaAdicionada); 
                } 
	 		}

	 	}


	 	 	public function listarCarousel(){ 
	 	 		$listar = new  \Site\models\helper\ModelsRead();
	 	 		$listar->exeReadEspecifico("SELECT it.idItem, it.nomeItem, it.imagemItem, pg.nomePagina 
	 			FROM {$this->tabela}  it INNER JOIN pagina  pg ON it.idPagina = pg.idPagina 
				ORDER BY RAND() LIMIT :limit","limit=10");
	 		$this->result['itens'] = $listar->getResult(); 
	 		return $this->result['itens'];  

} 
			
	}