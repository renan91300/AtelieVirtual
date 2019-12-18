<?php
	namespace site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class Paginas{ 

	 	private $result; 
	 	private $tabela = 'pagina'; 
	 	private $idPessoa;
	 	public function getPaginas(){ 

	 		$paginas = new  \Site\models\helper\ModelsRead();
	 		$paginas->exeRead($this->tabela);
	 		$this->result= $paginas->getResult(); 
	 		return $this->result;  

	 	}

	 	public function getPaginasPessoa($pessoa){ 
	 		$idPessoa = $pessoa;
	 		

	 		$paginas = new  \Site\models\helper\ModelsRead();
	 		$paginas->exeRead($this->tabela, "WHERE idPessoa={$idPessoa}");
	 		$this->result= $paginas->getResult(); 
	 		return $this->result; 


	 	}


} 