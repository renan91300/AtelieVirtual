<?php

if (!defined('URL')){
    header("location: /");
    exit();
}


?> 


<style type="text/css">
  

   label{
    color: white;
   }

   h5{
    color: white;
   }

   p{
    color: white
   }
</style>



<script  src="<?= URL; ?>assets/js/validarSenha.js"></script>

<div class="container pt-5 mb-5"  style="position: relative; padding-left: 10%; padding-right:10%;">

<h1>Cadastro de usuário</h1>



<div class="border rounded">
 
<form class="p-4 back" method="post" >
     <?php
            
            if (isset($_SESSION['msg'])){
                
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if (!isset($this->dados['formRetorno'])){
                $nome = $email = $senha = $dataNascimento = $sexo = "";
            }else {
                extract($this->dados['formRetorno']);
                unset($this->dados['senha']); 
                unset($this->dados['senhaConf']); 
             
            }
        ?>
   
  <div class="form-group">
    <label for="email">Endereço de e-mail</label>
    <input type="email" class="form-control" name="email" id="idemail" aria-describedby="emailHelp" placeholder="Digite o seu e-mail" value="<?= $email; ?>">
    <small id="emailHelp" class="form-text" style="color: white">Nunca compartilhe seu e-mail com ninguém.</small>
  </div>


  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="nome" class="form-control" id="idnome" name="nome" aria-describedby="emailHelp" placeholder="Digite o seu nome completo" value="<?= $nome; ?>">
  </div>

  
   <div class="form-group">
    <label for="date">Data de nascimento</label>
    <input type="date" class="form-control" id="date" name="dataNascimento" aria-describedby="emailHelp" value="<?= $dataNascimento; ?>" >
  </div>
  

  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" onkeyup="validarSenha(this.value);" name="senha" id="iDsenha" aria-describedby="emailHelp" placeholder="Digite uma senha forte" value="<?= $senha; ?>"/>
    <span id="msg2"></span>
  </div>


  <div class="form-group">
    <label for="senhaConf">Confirmar senha</label>
    <input type="password" class="form-control" name="senhaConf" id="iDsenhaConf" placeholder="Confirme sua senha" value="<?= $senha; ?>">
  </div>


  <div class="form-group" >
    <label for="sexo">Sexo</label>
    <select class="form-control" id="iDsexo" name="sexo" class="required" >
      <option value="">Selecione seu sexo</option>
      <option value="M">Masculino</option>
      <option value="F">Feminino</option>
      <option value="P">Prefiro não dizer</option>
    </select>
  </div>
  

  <button type="submit" name="formAddPessoa" value="Enviar" class="btn btn-primary"  >Enviar</button>



</form>
</div>
</div>


