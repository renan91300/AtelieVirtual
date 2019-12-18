<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class Noticia{ 

	 	private $resuult; 
	 	private $tabela = "noticia"; 

	 	public function listar(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico("SELECT id, titulo, descricao, imagem, slug 
	 			FROM {$this->tabela} 
				ORDER BY data_criacao DESC LIMIT :limit","limit=3");
	 		$this->result['noticias'] = $listar->getResult(); 
	 		return $this->result['noticias'];  

	 	}

	}