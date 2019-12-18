<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	Class Perfil{
			private $dados; 
        private $vai; 
		public function index(){
			



		//	$getPaginas = new \Site\Models\Paginas();
			//$this->dados['paginas'] = $getPaginas->getPaginas();
              $getPessoa = new \Site\Models\Perfil();
             
            
            
            if(isset($_GET['remover'])){ 
                $deletar = new \Site\Models\Perfil();
                $deletar->delCategoria($_GET['remover']);             
            
            }
            
			  
            if(isset($_SESSION['idPessoa'])){ 

              
                $id=$_SESSION['idPessoa']; 
                
                $getPessoa = new \Site\Models\Perfil(); 
                 $this->dados['pessoa']  = $getPessoa->getPessoa();
                
                $getCategorias = new \Site\Models\Perfil(); 
                $this->dados['categoriasPerfil'] = $getCategorias->getCategoriasPerfil($id); 		 
                
                $getPaginas = new \Site\Models\Paginas();
                $this->dados['paginas'] = $getPaginas->getPaginasPessoa($id);


                $getCategorias = new \Site\Models\Categoria();
                $this->dados['categorias'] = $getCategorias->listar();
                   
              // $this->dados['categorias'] = $this->retorno($this->dados['categorias'], $this->dados['categoriasPerfil']); 
                 
              
             
             
                

			if(!empty($_GET["categoriasArray"])){
   				 $this->dados['categoriasAdicionadas'] = $_GET["categoriasArray"]; 
			   	$addCategoria = new \Site\Models\Perfil();
				$addCategoria->addCategoria($this->dados['categoriasAdicionadas']);
                  $urlDestino = URL . 'Perfil/index';
               header("Location: $urlDestino");

			}
            
                




			$carregarView = new \Config\ConfigView("Perfil/index", $this->dados);
			$carregarView->renderizarRestrito();
                
                
                
                
            } else { 
                
               $urlDestino = URL . 'Home/index';
               header("Location: $urlDestino");
            
            
            }
                

		}
        public function retorno( $vai,  $catPerfil){ 
         $this->vai = $vai; 
               $cont = 1; 
                foreach($this->vai as $v) {
                   
                      if(isset($v))extract($v); 
                    
                    foreach($catPerfil as $p){ 
                  
                    extract($p); 
                       if(isset($v)){ if($v['idCategoria'] == $p['idCategoria'])     unset($this->vai[$cont]); 
                                    }
                        
                    }
                    
                   $cont++; 
                }
            return $this->vai;
        }
	}