<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroItem{
		private $result = false;
	    private $tabela = 'item';
	    private $categorias; 
	    private $gambiarra; 

	    public function addItem(array $dados){
	        $this->dados = $dados;
	      //  var_dump($dados); 
             
	       // $this->dados['data_criacao'] = date("Y-m-d H:i:s");
            if(isset($this->dados['categoriasArray'])){ 
            $categorias = $this->dados['categoriasArray']; 
	    	unset($this->dados['categoriasArray']);
            } else $categorias = 0; 
	    	unset($this->dados['listaCategorias']);
	    	$this->foto = $this->dados['imagem_nova'];
        	unset($this->dados['imagem_nova']);
	        $this->validarDados();
	        if ($this->result){
	            $this->exeAddItem($categorias);
	        }
	    }

	    private function validarDados(){
	    	
	    	//var_dump($this->dados);
	        $this->dados = array_map('strip_tags', $this->dados);
	        $this->dados = array_map('trim', $this->dados);
	        if (in_array('', $this->dados)){
	            $_SESSION['msg'] = "
	                        <div class='alert alert-danger' role='alert'>
	                          <strong>Erro ao enviar:</strong> Os campos obrigatórios não foram preenchidos!
	                        </div>";
	        }else{
	                $this->result = true;
            }
	    }


        
     
        
        
       
	    private function exeAddItem($categorias){
	        

            $inserir = new \Site\models\helper\ModelsCreate();     
            
            $slugImg = new \Site\models\helper\ModelsSlug();
            $this->dados['imagemItem'] = $slugImg->nomeSlug($this->foto['name']);
            $this->dados['idPagina'] = $_SESSION['idPagina']; 


             //var_dump($this->dados); 
	        
	       	  //  var_dump($this->dados); 
	        $id = $inserir->exeCreateRetornoId($this->tabela, $this->dados);
	        
	 		
	         $uploadImg = new \Site\models\helper\ModelsUploadImg();
        	 $uploadImg->uploadImagem($this->foto, 'assets/img/item/', $this->foto['name']);




        
            if($categorias != 0){ 
        	 
	 		foreach ($categorias as $categoria) {
	 			//var_dump($categoria); 
	 			$addCategoria = new \Site\models\helper\ModelsCreate();
	 			

	 			

	 			//$categoriaAdicionada['idPessoa'] = $idPessoa[0]['idPessoa'];
	 			$categoriaAdicionada['idItem'] = $id; 
	 			$categoriaAdicionada['idCategoria'] = $categoria; 

	 			$addCategoria->exeCreate("relacao_categoria_item", $categoriaAdicionada); 
	 		} 

            } 
	 			



	            if ($inserir->getResult()){
	            $this->result = true;

	            $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\">
	                                    Item enviado com sucesso!
	                                </div>";
	        }else{
	            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">
	                                    Contato não enviado com sucesso! Erro: {$inserir->getMsg()}
	                                </div>";
	        }
	    }

        
        
	    public function getResult(){
	        return $this->result;
	    }
	}