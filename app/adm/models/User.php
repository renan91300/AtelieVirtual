<?php

namespace App\adm\models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class User{

    private $result;
    private $limiteResultado = 40;
    private $id;
    private $dados;

    
    public function listarUsuario(){
        $listarUsuario = new \App\adm\Models\helper\ModelsRead();
        $listarUsuario->exeReadEspecifico("SELECT *
                FROM pessoa
                ORDER BY nome ASC");
        $this->result = $listarUsuario->getResult();
        return $this->result;
    }

    public function verUsuario($id){
        $this->id = (int) $id;
        $verPerfil = new \App\adm\Models\helper\ModelsRead();
        $verPerfil->exeReadEspecifico("SELECT *
                FROM pessoa WHERE idPessoa = {$this->id}");
        $this->result= $verPerfil->getResult();
        return $this->result;
    }

    function getResult()
    {
        return $this->result;
    }



    public function apagarUsuario($id = null)
    {
        $this->id = (int) $id;
      
      
       
            $apagarUsuario = new \App\adm\Models\helper\ModelsDelete();
            $apagarUsuario->exeDelete("pessoa", "WHERE idPessoa =:id", "id={$this->id}");
            if ($apagarUsuario->getResult()) {
               
                $_SESSION['msg'] = "<div class='alert alert-success'>Usuário excluído com sucesso!</div>";
                $this->result = true;
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não foi apagado!</div>";
                $this->result = false;
            }
        } 
    


    public function cadUsuario(array $dados)
    {
        $this->dados = $dados;
        //var_dump($this->Dados);

        $valCampoVazio = new \App\adm\models\helper\ModelsCampoVazio();
        $valCampoVazio->validarDados($this->dados);

        if ($valCampoVazio->getResult()) {
            $this->valCampos();
        } else {
            $this->result = false;
        }
    }

    private function valCampos()
    {
        $valEmail = new \App\site\models\helper\ModelsEmail();
        $valEmail->valEmail($this->dados['email']);

        $valEmailUnico = new \App\adm\Models\helper\ModelsEmailUnico();
        $valEmailUnico->valEmailUnico($this->dados['email']);

        $valUsuario = new \App\adm\models\helper\ModelsValUsuario();
        $valUsuario->valUsuario($this->dados['nome']);

        $valSenha = new \App\adm\models\helper\ModelsValSenha();
        $valSenha->valSenha($this->dados['senha']);

        if (($valSenha->getResult()) AND ( $valUsuario->getResult()) AND ( $valEmailUnico->getResult()) AND ( $valEmail->getResult())) {
            $this->inserirUsuario();
        } else {
            $this->result = false;
        }
    }

    private function inserirUsuario()
    {
        $this->dados['senha'] = md5($this->dados['senha']);
        unset($this->dados['senhaConf']);
        $this->dados['acesso'] = 1;
        var_dump($this->dados);

        $cadUsuario = new \App\adm\models\helper\ModelsCreate();
        //var_dump($this->dados);
        //exit;
        $cadUsuario->exeCreate("pessoa", $this->dados);
        if ($cadUsuario->getResult()) {
            if (empty($this->foto['name'])) {
                $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
                $this->result = true;
            } else {
                $this->dados['idPessoa'] = $cadUsuario->getResult();
                $this->valFoto();
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O usuario não foi cadastrado!</div>";
            $this->result = false;
        }
    }

 
    public function listarCadastrar()
    {
        //$listar = new \App\adm\models\helper\ModelsRead();
       // $listar->exeReadEspecifico("SELECT id id_nivac, nome nome_nivac FROM adm_niveis_acesso WHERE ordem //>=:ordem ORDER BY nome ASC",
           // "ordem=" . $_SESSION['ordem_nivac']);
// $registro['nivac'] = $listar->getResult();

       // $listar->exeReadEspecifico("SELECT id id_sit, nome nome_sit FROM adm_situacao ORDER BY nome ASC");
       // $registro['sit'] = $listar->getResult();

       // $this->result = ['nivac' => $registro['nivac'], 'sit' => $registro['sit']];

     return $this->result;
    }

    public function verFormCadUsuario()
    {
        $verFormCadUsuario = new \App\adm\models\helper\ModelsRead();
        $verFormCadUsuario->exeReadEspecifico("SELECT * FROM user
                WHERE id =:id LIMIT :limit", "id=1&limit=1");
        $this->result = $verFormCadUsuario->getResult();
        return $this->result;
    }

    public function altUsuario(array $dados)
    {
        $this->dados = $dados;
        //var_dump($this->Dados);
        //$this->foto = $this->dados['imagem_nova'];
        //$this->imgAntiga = $this->dados['imagem_antiga'];
        //unset($this->dados['imagem_nova'], $this->dados['imagem_antiga']);

        $valCampoVazio = new \App\adm\models\helper\ModelsCampoVazio();
        $valCampoVazio->validarDados($this->dados);

        if ($valCampoVazio->getResult()) {
            $this->valCamposAlterar();
        } else {
            $this->result = false;
        }
    }

    private function valCamposAlterar()
    {
        $valEmail = new \App\adm\models\helper\ModelsEmail();
        $valEmail->valEmail($this->dados['email']);

        $valEmailUnico = new \App\adm\models\helper\ModelsEmailUnico();
        $editarUnico = true;
        $valEmailUnico->valEmailUnico($this->dados['email'], $editarUnico, $this->dados['idPessoa']);

       // $valUsuario = new \App\adm\models\helper\ModelsValUsuario();
        //$valUsuario->valUsuario($this->dados['pessoa'], $editarUnico, $this->dados['idPessoa']);

        $valSenha = new \App\adm\models\helper\ModelsValSenha();
        $valSenha->valSenha($this->dados['senha']);
            
      $this->updateEditUsuario();


        
       
    }

    private function valFotoAlterar()
    {
        if (empty($this->foto['name'])) {
            $this->updateEditUsuario();
        } else {
            $slugImg = new \App\adm\models\helper\ModelsSlug();
            $this->dados['imagem'] = $slugImg->nomeSlug($this->foto['name']);

            $uploadImg = new \App\adm\models\helper\ModelsUploadImgRed();
            $uploadImg->uploadImagem($this->foto, 'assets/img/usuario/' . $this->dados['id'] . '/', $this->dados['imagem'], 150, 150);
            if ($uploadImg->getResult()) {
                $apagarImg = new \App\adm\models\helper\ModelsApagarImg();
                $apagarImg->apagarImg('assets/img/usuario/' . $this->dados['id'] . '/' . $this->imgAntiga);
                $this->updateEditUsuario();
            } else {
                $this->result = false;
            }
        }
    }

    private function updateEditUsuario()
    {
        $upAltSenha = new \App\adm\Models\helper\ModelsUpdate();
        md5($this->dados['senha']); 
        unset($this->dados['senhaConf']);
        $upAltSenha->exeUpdate("pessoa", $this->dados, "WHERE idPessoa =:id", "id=" . $this->dados['idPessoa']);
        if ($upAltSenha->getResult()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Usuário atualizado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O usuario não foi atualizado!</div>";
            $this->result = false;
        }
    }


}
