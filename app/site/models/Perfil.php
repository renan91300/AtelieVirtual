<?php
	namespace site\models;

	
	if(!defined('URL')){
		header("location: /");
		exit();
	}

	 class Perfil{ 

	 	private $result; 
	 	private $tabela = 'pessoa'; 
	 	private $addCategoria; 
	 	private $idPessoa; 
	 	
	 	public function getPessoa(){ 
            $idPessoa = $_SESSION['idPessoa']; 
	 		$pessoa = new  \Site\models\helper\ModelsRead();
	 		$pessoa->exeRead($this->tabela, "WHERE idPessoa={$idPessoa}  LIMIT :limit", "limit=1");
	 		$this->result= $pessoa->getResult(); 
	 		return $this->result;  


	 	}


	 	public function addCategoria($arrayCategorias){ 
	 		

	 		foreach ($arrayCategorias as $categoria) {
	 			//var_dump($categoria); 
	 			$addCategoria = new \Site\models\helper\ModelsCreate();
	 			

	 			$idPessoa = $this->getPessoa();
	 		
                  
                
                  $relacoes = new  \Site\models\helper\ModelsRead(); 
	 		     $relacoes->exeRead("relacao_categoria_pessoa","WHERE {$idPessoa[0]['idPessoa']}= idPessoa AND {$categoria} = idCategoria GROUP BY idPessoa");
           
	 			
                     if(empty($relacoes->getResult())){ 
	 			$categoriaAdicionada['idPessoa'] = $idPessoa[0]['idPessoa']; 
	 			$categoriaAdicionada['idCategoria'] = $categoria; 

	 			$addCategoria->exeCreate("relacao_categoria_pessoa", $categoriaAdicionada); 
                     } 

	 		}

	 	}
         
         
	 	public function addCategoriaPorId($id){ 
	 			//var_dump($categoria); 
	 			//$idPessoa = $this->getPessoa();
              
               
               
	 			$categoriaAdicionada['idPessoa'] = $_SESSION['idPessoa'];
	 			$categoriaAdicionada['idCategoria'] = $id; 
                    
	 			$addCategoria = new \Site\models\helper\ModelsCreate(); 
                $addCategoria->exeCreate("relacao_categoria_pessoa", $categoriaAdicionada);
                
            

	 		}
         
         public function delCategoriaPorId($id){ 
              
                 
	 			$addCategoria = new \Site\models\helper\ModelsRead(); 
                $addCategoria->exeReadEspecifico("DELETE FROM relacao_categoria_pessoa WHERE {$id} = idCategoria AND {$_SESSION['idPessoa']} = idPessoa");
                
            

	 		}
         
         public function verSeSegue($id){ 
	 			//var_dump($categoria); 
	 			//$idPessoa = $this->getPessoa();
                $relacoes = new  \Site\models\helper\ModelsRead(); 
	 		    $relacoes->exeRead("relacao_categoria_pessoa","WHERE {$_SESSION['idPessoa']}= idPessoa AND {$id} = idCategoria GROUP BY idPessoa");
           
            
                if(empty($relacoes->getResult())){ 
                    return 0; 
                } else return 1; 

	 		}


	 	
         
         
         public function delCategoria($cat){ 
	 			$deletar = new \Site\models\helper\ModelsRead();
             
             
                $deletar->exeReadEspecifico("DELETE FROM relacao_categoria_pessoa   WHERE idCategoria ={$cat} AND idPessoa = {$_SESSION['idPessoa']} ") ; 
               $deletar->getResult(); 


	 	}


         
  
	 	public function getCategoriasPerfil($id){
	 		$idPessoa = $id;
	 		$categorias = new \Site\models\helper\ModelsRead();
	 		$categorias->exeReadEspecifico("
           
            SELECT ca.*FROM categoria as ca, relacao_categoria_pessoa as rel WHERE rel.idPessoa={$idPessoa} AND ca.idCategoria = rel.idCategoria; 
             
             "); 
	 		$this->result= $categorias->getResult(); 
	 		return $this->result; 

	 	}

	
} 