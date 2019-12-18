<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroItem{
		private $dados; 
		
		public function index(){
		
			
          if(isset($_SESSION['idPagina'])) { 

		
            $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listar();

			if (!empty($this->dados['formAddItem'])) {
            unset($this->dados['formAddItem']);

             $this->dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);
            $addItem = new \Site\Models\CadastroItem();
            $addItem->addItem($this->dados);
            if (!$addItem->getResult()){
                $this->dados['formRetorno'] = $this->dados;
            }else{
                $this->dados['formRetorno'] = null;
            }
        } else  {

        	
        }
              
              $carregarView = new \Config\ConfigView("cadastroitem/index", $this->dados);
			$carregarView->renderizarRestrito();
              
              	}else { 
            
              $urlDestino = URL . 'Easdasd404/index';
              header("Location: $urlDestino");
            
        }

            

            

			
		}
	}