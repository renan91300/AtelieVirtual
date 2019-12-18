<?php

namespace App\adm\models;

if (!defined('URL')){
    header("location: /");
    exit();
}

class Auth {

    private $dados;
    private $result;
    private $msg;
    private $rowCount;
    private $resultado;

    public function autenticar(array $dados) {
        $this->dados = $dados;
        $this->validar();
        if ($this->result){
            $validarAcesso = new \App\adm\models\helper\ModelsRead();
            $validarAcesso->exeReadEspecifico("SELECT *
                    FROM pessoa 
                    WHERE email =:email LIMIT :limit", "email={$this->dados['email']}&limit=1");
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

    public function validar(){
        $this->dados = array_map('strip_tags', $this->dados);
        $this->dados = array_map('trim', $this->dados);
        if (in_array('', $this->dados)){
            $this->result = false;
            $this->msg = "
                        <div class='alert alert-danger' role='alert'>
                          Login e/ou senhas incorretos!
                        </div>
                        ";
        }else{
            $this->result = true;
        }
    }

      public function validarSenha(){
        
        $this->dados['senha'] = md5($this->dados['senha']); 
      
          
          if ($this->dados['senha'] == $this->resultado[0]['senha'] && isset($this->resultado[0]['acesso'])) {
			$_SESSION['nome'] = $this->resultado[0]['nome'];
			$_SESSION['idPessoa'] = $this->resultado[0]['idPessoa'];
            $_SESSION['email'] = $this->resultado[0]['email'];
            $this->result = true;
            } else {
            $this->msg = "<div class='alert alert-danger'>Erro: Usuário ou a senha incorreto!</div>";
            $this->result = false;
          
        } 
    }


    function getResult() {
        return $this->result;
    }

    function getMsg() {
        return $this->msg;
    }

    function getRowCount() {
        return $this->rowCount;
    }

}
