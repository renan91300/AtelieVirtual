<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroPagina{
		private $dados; 
		
		public function index(){
		

            $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            
            $getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listar();
    
            
            
			if (!empty($this->dados['formAddPagina'])) {
            unset($this->dados['formAddPagina']);

             $this->dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);
            $addPagina = new \Site\Models\CadastroPagina();
            $id = $addPagina->addPagina($this->dados);
            if ($addPagina->getResult()){
                $this->dados['formRetorno'] = $this->dados;
                $urlDestino = URL . 'PaginaProdutor/index?='.$id;
                header("Location: $urlDestino");
            }else{
                $this->dados['formRetorno'] = null;
            }
        } else  {
                
        }

            
            
            

			$carregarView = new \Config\ConfigView("cadastroPagina/index", $this->dados);
			$carregarView->renderizarRestrito();
		}
	}