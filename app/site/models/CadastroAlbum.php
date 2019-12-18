<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroAlbum{
		private $result = false;
	    private $tabela = 'album';
        private $categorias;
        private $dados; 

	    public function addAlbum(array $dados){
	        $this->dados = $dados;
	       // $this->dados['data_criacao'] = date("Y-m-d H:i:s");
	       if(isset($this->dados['categoriasArray'])){ 
            $this->categorias = $this->dados['categoriasArray']; 
            unset($this->dados['categoriasArray']);
           } 
	    	unset($this->dados['listaCategorias']);
             $this->validarDados();
	        if ($this->result){
	            $this->exeAddAlbum();
	        }
	    }

	    private function validarDados(){
	        $this->dados = array_map('strip_tags', $this->dados);
	        $this->dados = array_map('trim', $this->dados);
	        if (in_array('', $this->dados)){
	            $_SESSION['msg'] = "
	                        <div class='alert alert-danger' role='alert'>
	                          <strong>Erro ao enviar:</strong> Os campos obrigatórios não foram preenchidos!
	                        </div>";
	        } else { 
                $this->result = true; 
                echo"yay"; 
            }
	            
	            
	        
	    }


	    private function exeAddAlbum(){
	        $inserir = new \Site\models\helper\ModelsCreate();
	        $this->dados['idPagina']=$_SESSION['idPagina']; 

	        $id = $inserir->exeCreateRetornoId($this->tabela, $this->dados);
	        if ($inserir->getResult()){
	            $this->result = true;

	            $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\">
	                                    Álbum criado com sucesso! 
	                                </div>";
	        }else{
	            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">
	                                    Álbum não enviado com sucesso! Erro: {$inserir->getMsg()}
	                                </div>";
	        } 
            if($this->categorias != 0){ 

            foreach ($this->categorias as $categoria) {
	 			//var_dump($categoria); 
	 			$addCategoria = new \Site\models\helper\ModelsCreate();
	 			

	 			

	 			//$categoriaAdicionada['idPessoa'] = $idPessoa[0]['idPessoa'];
	 			$categoriaAdicionada['idAlbum'] = $id; 
	 			$categoriaAdicionada['idCategoria'] = $categoria; 

	 			$addCategoria->exeCreate("relacao_categoria_album", $categoriaAdicionada); 
	    } } }

	    public function getResult(){
	        return $this->result;
	    }
	}