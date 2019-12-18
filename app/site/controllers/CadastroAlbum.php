<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	Class CadastroAlbum{
		private $dados; 
		
		public function index(){
		
            if(isset($_SESSION['idPagina'])) { 
            
            $id = $_SESSION['idPagina']; 
            
			 $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
               
            $getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listar();

			if (!empty($this->dados['formAddAlbum'])) {
            unset($this->dados['formAddAlbum']);
            $addAlbum = new \Site\Models\CadastroAlbum();
            
            $addAlbum->addAlbum($this->dados);
               // var_dump($addAlbum); 
            if (!$addAlbum->getResult()){
                $this->dados['formRetorno'] = $this->dados;
                
            }else{
                $this->dados['formRetorno'] = null;
                 $urlDestino = URL . 'albuns/index?id='. $id;
                header("Location: $urlDestino");
                
            }

        }
        	

			$carregarView = new \Config\ConfigView("cadastroAlbum/index", $this->dados);
			$carregarView->renderizarRestrito();
                
                
		}else { 
            
              $urlDestino = URL . 'Easdasd404/index';
              header("Location: $urlDestino");
            
        }
            
            
            
	}
        
    } 