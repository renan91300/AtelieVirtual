<?php
	namespace Site\models;

	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class PaginaProdutorItem{ 

	 	private $resuult; 
	 	private $tabela = "pagina"; 
	 	

	 
	 	public function listar($pagina){ 
	 		 	foreach ($pagina as $item) {
	 		extract($item); 
	 	}
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead( $this->tabela," WHERE idPagina = {$idItem} 
                  LIMIT :limit", "limit=1");
	 		$this->result['pagina'] = $listar->getResult(); 
	 		return $this->result['pagina'];  

	 	}

	}