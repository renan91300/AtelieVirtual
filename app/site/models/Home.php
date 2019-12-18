<?php
	namespace site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class Home{  
     
        private $tabela= "item"; 
         
         
        public function listar(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico(" SELECT it.*, pg.nomePagina FROM {$this->tabela} as it INNER JOIN pagina as pg ON it.idPagina = pg.idPagina ORDER BY RAND() LIMIT :limit", "limit=10");
	 		$this->result['listaItem']= $listar->getResult(); 
            
	 		return $this->result['listaItem'];  


            
            
            
	 	}
        
          public function vermais(){ 
            
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico(" SELECT it.*, pg.nomePagina FROM {$this->tabela} as it INNER JOIN pagina as pg ON it.idPagina = pg.idPagina ORDER BY RAND() LIMIT :limit", "limit=20");
	 		$this->result['listaItem']= $listar->getResult(); 

	 		return $this->result['listaItem'];  


            
            
            
	 	}
        
        
     
     
     
        
     
     
     
     
     
     
     
     } 