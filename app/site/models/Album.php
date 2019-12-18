<?php
	namespace site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class Album{ 

	 	private $result; 
	 	private $tabela = 'album'; 

	 	public function getAlbum(){ 
            $id = $_GET['idAlbum'];
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead($this->tabela, "WHERE idAlbum={$id}  LIMIT :limit", "limit=1");
	 		$this->result= $listar->getResult(); 
	 		return $this->result;  


	 	}
         
  
	 	

          public function delAlbum($cat){ 
	 			$deletar = new \Site\models\helper\ModelsRead();
             
             
                $deletar->exeReadEspecifico("DELETE FROM album   WHERE idAlbum ={$cat} ") ; 
               $deletar->getResult(); 


	 	}
         
         	public function getAlbuns($idPagina){ 
            $id = $idPagina;
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico("SELECT ab.* FROM album ab, pagina pg WHERE ab.idPagina = pg.idPagina AND {$id} = pg.idPagina");
	 		$this->result= $listar->getResult();
	 		return $this->result;  


	 	}
         	public function getAlbunsItem($idItem){ 
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico("SELECT ab.* FROM album ab, relacao_album_item as it WHERE it.idItem = {$idItem} AND it.idAlbum = ab.idAlbum GROUP BY ab.idAlbum");
	 		$this->result= $listar->getResult();
	 		return $this->result;  


	 	}

        

        
         
         
	 	public function getItensAlbum($album){ 
	 		extract($album); 
	 		



	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico( "SELECT * FROM item as it, relacao_album_item AS rl WHERE {$album[0]['idAlbum']} = rl.idAlbum  AND it.idItem = rl.idItem " 
                 );
	 		$this->result['itensAlbum'] = $listar->getResult(); 
	 		return $this->result['itensAlbum'];  

	 	}




	 	



	 	 	/*public function listar(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead($this->tabela, " ORDER BY idItem DESC LIMIT :limit", "limit=7");
	 		$this->result['listaItem']= $listar->getResult(); 


	 		return $this->result['listaItem'];  


	 	} 



	 	 	public function listarCarousel(){ 
	 	 		$listar = new  \Site\models\helper\ModelsRead();
	 	 		$listar->exeReadEspecifico("SELECT it.nomeItem, it.imagemItem, pg.nomePagina 
	 			FROM {$this->tabela}  it INNER JOIN pagina  pg ON it.idPagina = pg.idPagina 
				ORDER BY it.idItem DESC LIMIT :limit","limit=10");
	 		$this->result['itens'] = $listar->getResult(); 
	 		return $this->result['itens'];  

} 
		*/	
     } 