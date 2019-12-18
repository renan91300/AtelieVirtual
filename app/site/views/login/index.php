<?php

if (!defined('URL')){
    header("location: /");
    exit();
}


?> 


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/estilo.css">




<style> 
  .nav{ 
    background-color: #666699;
} 

.nav-link{ 
      color: red;

    }
    
    
    :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
  background-color: gray; 
}
    
    
.btn-login:hover {
  background-color:  #666699;
 color:white; 
}
.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  cursor: text;
  /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
    </style>

 

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 " style="background-image: linear-gradient(to right top, #908a94, #8d7993, #8d6790, #8f5389, #923b7f)">
       <div style="positon: relative; color:white;" > 
    <h1><a href="Home.html" style="color: white;">Atêlie Virtual</a></h1> 
    <img src="<?=URL .'assets/img/imagens/login.png';?>" style="width:90%">
  </div>

    </div>
   
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Bem vindo de volta!</h3>
                <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if (!isset($this->dados['formRetorno'])){
                $email = $senha =  "";
            }else {
                extract($this->dados['formRetorno']);
                unset($this->dados['senha']); 
                
            }
        ?>
              <form method="post">
                <div class="form-group">
                    <label for="email ">Endereço de e-mail</label>
                    <input type="email" class="form-control " name="email" id="idemail" aria-describedby="emailHelp" placeholder="Digite o seu e-mail" value="<?= $email; ?>">
                  </div> 
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" onkeyup="validarSenha(this.value);" name="senha" id="iDsenha" aria-describedby="emailHelp" placeholder="Digite sua senha" value=""/>
                    <span id="msg2"></span>
                  </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Mantenha-me contectado</label>
                </div>
                <button class="btn btn-lg  btn-block btn-login text-uppercase font-weight-bold mb-2"  name="login" type="submit">Entrar</button>
                <div class="text-center">
                  <a class="small" href="#">Esqueceu sua senha?</a>
                  <a class="small" href="<?=URL;?>cadastroUsuario/index">Não possui cadastro? Cadastre-se aqui!</a></div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

