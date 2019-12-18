<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	class CadastroUsuario{
		private $result = false;
	    private $tabela = 'pessoa';

	    public function addPessoa(array $dados){
	        $this->dados = $dados;
	       // $this->dados['data_criacao'] = date("Y-m-d H:i:s");
	        $this->validarDados();
	        if ($this->result){
	            $this->exeAddPessoa();
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
               
                
	        }else{
	            if (!filter_var($this->dados['email'], FILTER_VALIDATE_EMAIL)){
	              $_SESSION['msg'] = "
	                        <div class='alert alert-danger' role='alert'>
	                          <strong>Erro ao enviar:</strong> O campo e-mail é inválido!
	                        </div>";
	            }else{
	                $this->validarSenha();
	            }
	        }
	    }
        
        
         private function valCampos()
    {
        $valEmail = new \App\site\models\helper\ModelsEmail();
        $valEmail->valEmail($this->dados['email']);

        $valEmailUnico = new \App\adm\Models\helper\ModelsEmailUnico();
        $valEmailUnico->valEmailUnico($this->dados['email']);


        $valSenha = new \App\site\models\helper\ModelsValSenha();
        $valSenha->valSenha($this->dados['senha']);

        if (($valSenha->getResult())  AND ( $valEmailUnico->getResult()) AND ( $valEmail->getResult())) {
            $this->result = true; 
        } else {
            $this->result = false;
        }
    }

		private function validarSenha(){

			if($this->dados['senha'] == $this->dados['senhaConf']){ 
				if($this->dados['senha'])


            	
            	$this->dados['senha'] = md5($this->dados['senha']);
	        	$this->valCampos(); 
	        }else  
                $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> As senhas digitadas devem ser iguais!
	                                    </div>"; 
		}

	    private function exeAddPessoa(){
	        $inserir = new \Site\models\helper\ModelsCreate();

	       	unset($this->dados['senhaConf']); 
	       	    var_dump($this->dados); 
	       
            $inserir->exeCreate($this->tabela, $this->dados);
	        if ($inserir->getResult()){
	            $this->result = true;

	            $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\">
	                                    Contato enviado com sucesso!
	                                </div>";
	        }else{
	            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">
	                                    Contato não enviado! Erro: {$inserir->getMsg()}
	                                </div>";
	        }
	    }

	    public function getResult(){
	        return $this->result;
	    }
        
    } 