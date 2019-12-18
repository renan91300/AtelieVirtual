<?php
	namespace Site\models;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}

    class Login{
        
    private $dados; 
    private $resultado; 
    private $result;
    private $msg;
    private $rowCount;
	

    public function logar(array $dados){ 
        
        $this->dados = $dados;
        
        $this->validarDados(); 
        if ($this->result){
            $validarAcesso = new \Site\models\helper\ModelsRead();  
            $validarAcesso->exeReadEspecifico("SELECT *            FROM pessoa
                    WHERE email = '{$this->dados['email']}' LIMIT :limit", "limit=1");
            
            $this->resultado = $validarAcesso->getResult();
            if ($validarAcesso->getRowCount() == 1) {
                //var_dump($Visulizar->getResultado());
                $this->validarSenha();
            }else {
                $this->result = false;
                $this->msg = "
                        <div class='alert alert-danger' role='alert'>
                          Login e/ou senhas incorretos!
                        </div>
                        ";
            }
        }
    }
        
    
    

 public function validarDados(){
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
                    $this->result = true; 
	            }
	        }
	    }



    public function validarSenha(){
        
        $this->dados['senha'] = md5($this->dados['senha']); 
        if ($this->dados['senha'] == $this->resultado[0]['senha']) {
			$_SESSION['nome'] = $this->resultado[0]['nome'];
			$_SESSION['idPessoa'] = $this->resultado[0]['idPessoa'];
            $_SESSION['email'] = $this->resultado[0]['email'];
            $this->result = true;
            } else {
        
            $_SESSION['msg'] = "<div class='alert alert-danger'><strong>Erro:</strong> Usuário/senha incorreto(a)!</div>";
            $this->result = false;
          
        } 
    }

    
  public function getResult() {
        return $this->result;
    }
} 