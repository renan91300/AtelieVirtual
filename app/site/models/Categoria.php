<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	 class Categoria{ 

	 	private $result; 
	 	private $tabela = "categoria"; 
         private $idPessoa; 

	 	public function listar(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead($this->tabela,"ORDER BY nomeCategoria ASC");
	 		$this->result['categoria'] = $listar->getResult(); 
	 		return $this->result['categoria'];  

	 	}
         
         public function listarPerfil(){ 
            $idPessoa = $_SESSION['idPessoa']; 
                         var_dump($_SESSION['idPessoa'] ); 
  
	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeReadEspecifico("SELECT ca.idCategoria, ca.nomeCategoria FROM categoria as ca");
             
	 		$this->result['categoria'] = $listar->getResult(); 
             
             
             $listar->exeReadEspecifico("SELECT idCategoria FROM relacao_categoria_pessoa WHERE {$idPessoa} = idPessoa");
            $comparacao=$listar->getResult(); 
             var_dump($comparacao);
                 foreach($this->result['categoria'] as $resultado ){ 
                   
                    foreach($comparacao as $i){ 
                        if ($resultado = $i)
                            unset($resultado); 
                    }
                 
                 }
             
	 		return $this->result['categoria'];  

	 	}
	 	
         	public function listarRD(){ 

	 		$listar = new  \Site\models\helper\ModelsRead();
	 		$listar->exeRead($this->tabela,"ORDER BY RAND()");
	 		$this->result['categoria'] = $listar->getResult(); 
	 		return $this->result['categoria'];  

	 	}


	 	public function getPagina(){
	 		$pagina = new  \Site\models\helper\ModelsRead();
	 		$pagina->exeRead($this->tabela, "WHERE idPagina=1  LIMIT :limit", "limit=1"); 
	 		$this->result['pagina'] = $pagina->getResult(); 
	 		return $this->result['pagina'];
	 	}
	 	


         public function categoriaEspecifica(){ 
            $categoria = $_GET['idCategoria']; 
            $listar = new  \Site\models\helper\ModelsRead();
            $listar->exeReadEspecifico("SELECT  it.*, pg.idPagina, pg.nomePagina FROM item it INNER JOIN pagina pg ON it.idPagina = pg.idPagina , relacao_categoria_item as rl WHERE {$categoria} = rl.idCategoria AND rl.idItem = it.idItem GROUP BY it.idItem ") ; 
                
            $this->result['listaItens'] = $listar->getResult();
             return    $this->result['listaItens']; 
         }


         

         
	 	public function getCategoriasItem($itens){

	 		$categorias = new \Site\models\helper\ModelsRead();
	 		$i = 0 ;
            foreach($itens as $it){ 
               extract($it); 
            
            $categorias->exeReadEspecifico("
           
            SELECT rel.idItem, ca.* FROM categoria as ca, relacao_categoria_item as rel WHERE   ca.idCategoria = rel.idCategoria  AND {$it['idItem']} = rel.idItem ; 
             
             ");
                $this->result[$i]= $categorias->getResult();
                $i++;
            } 
	 		return $this->result; 

	 	}
         
         public function getCategoriasAlbuns($albuns){

	 		$categorias = new \Site\models\helper\ModelsRead();
	 		$i = 0 ;
            foreach($albuns as $al){ 
               extract($al); 
            
            $categorias->exeReadEspecifico("
           
            SELECT rel.idAlbum, ca.* FROM categoria as ca, relacao_categoria_album as rel WHERE   ca.idCategoria = rel.idCategoria  AND {$al['idAlbum']} = rel.idAlbum ; 
             
             ");
                $this->result[$i]= $categorias->getResult();
                $i++;
            } 
	 		return $this->result; 

	 	}


	 	public function getPaginaItem($pagina){ 
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