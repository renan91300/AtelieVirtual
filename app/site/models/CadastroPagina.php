<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroPagina{
		private $result = false;
	    private $tabela = 'pagina';
        private $categorias; 

	    public function addPagina(array $dados){
	        $this->dados = $dados;
	       // $this->dados['data_criacao'] = date("Y-m-d H:i:s");
            if(isset($this->dados['categoriasArray'])){ 
            $this->categorias = $this->dados['categoriasArray']; 
            unset($this->dados['categoriasArray']);
              } else $categorias = 0; 
	    	unset($this->dados['listaCategorias']);
	        $this->foto = $this->dados['imagem_nova'];
        	unset($this->dados['imagem_nova']);  
            $this->validarDados();
	        if ($this->result){
	           $id = $this->exeAddPagina();
	        }
            if(isset($id)){
            return $id;} else{ 
                return 0; }
            
	    }  

	    private function validarDados(){
	        
            
            $this->dados = array_map('strip_tags', $this->dados);
	        $this->dados = array_map('trim', $this->dados);
            $verificar =  $this->dados;
            unset($verificar['telefone'], $verificar['instagram'], $verificar['facebook'] );
            
	        if (in_array('', $verificar)){
	            $_SESSION['msg'] = "
	                        <div class='alert alert-danger' role='alert'>
	                          <strong>Erro ao enviar:</strong> Os campos obrigatórios não foram preenchidos!
	                        </div>";
	        }else{
                $this->result = true;
	        }
	    }


	    private function exeAddPagina(){
	        $inserir = new \Site\models\helper\ModelsCreate();
            
            $slugImg = new \Site\models\helper\ModelsSlug();
            $this->dados['imagem'] = $slugImg->nomeSlug($this->foto['name']);
            
            $this->dados['idPessoa'] = $_SESSION['idPessoa']; 
	        $id = $inserir->exeCreateRetornoId($this->tabela, $this->dados);

            $uploadImg = new \Site\models\helper\ModelsUploadImg();
        	 $uploadImg->uploadImagem($this->foto, 'assets/img/pagina/'.$id.'/', $this->foto['name']);
            
	         
	 		
            
            if($this->categorias != 0){ 
            
            foreach ($this->categorias as $categoria) {
	 			//var_dump($categoria); 
	 			$addCategoria = new \Site\models\helper\ModelsCreate();
	 			

	 			

	 			//$categoriaAdicionada['idPessoa'] = $idPessoa[0]['idPessoa'];
	 			$categoriaAdicionada['idPagina'] = $id; 
	 			$categoriaAdicionada['idCategoria'] = $categoria; 

	 			$addCategoria->exeCreate("relacao_categoria_pagina", $categoriaAdicionada); 
	 		} } 

            
            
            
            
            
            if ($inserir->getResult()){
	            $this->result = true;

	            $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\">
	                                    Álbum criado com sucesso!
	                                </div>";
	        }else{
	            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">
	                                    Álbum não enviado com sucesso! Erro: {$inserir->getMsg()}
	                                </div>";
	        } return $id;
	    }

	    public function getResult(){
	        return $this->result;
	    }
	}