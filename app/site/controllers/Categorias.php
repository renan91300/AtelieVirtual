<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class Categorias{
		private $dados;
		
		public function index(){
            
			
			$getCategorias = new \Site\Models\Categoria();
			$this->dados['listaCategorias'] = $getCategorias->listar();

                      
                
            $carregarView = new \Config\ConfigView("categorias/index", $this->dados);
            $carregarView->renderizar();       

         
                
          
		}
    } 
        