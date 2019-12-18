<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar usuário</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <div>Bem vindo!</div>
    </div>
    <div class="table-responsive"><?php
        if (isset($this->dados['form'])) {
            $valorForm = $this->dados['form'];
                $valorForm['senha']="";

        }
        if (isset($this->dados['form'][0])) {
            $valorForm = $this->dados['form'][0];
                $valorForm['senha']="";

        }
        //var_dump($this->dados['select']);
?>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar Usuário</h2>
            </div>

            <?php
            if ($this->dados['botao']['vis_usuario']) {
                ?>
                <div class="p-2">
                    <a href="<?php echo URL . 'adm-user/moreUser/' . $valorForm['idPessoa']; ?>" class="btn btn-outline-primary btn-sm">Visualizar</a>
                </div>
                <?php
            }
            ?>

     

                </div><hr>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form method="POST" action="" >

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Nome</label>
                            <input type="nome" class="form-control" id="idnome" name="nome" aria-describedby="emailHelp" placeholder="Digite o seu nome completo" value="<?php
                            if (isset($valorForm['nome'])) {
                                echo $valorForm['nome'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span>Data de Nascimento</label>
                            <label for="date">Data de nascimento</label>
                            <input type="date" class="form-control" id="date" name="dataNascimento" aria-describedby="emailHelp" value="<?php
                            if (isset($valorForm['dataNascimento'])) {
                                echo $valorForm['dataNascimento'];
                            }
                            ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label><span class="text-danger">*</span> E-mail</label>
                            <input type="email" class="form-control" name="email" id="idemail" aria-describedby="emailHelp" placeholder="Digite o seu e-mail" value="<?php
                            if (isset($valorForm['email'])) {
                                echo $valorForm['email'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label><span class="text-danger">*</span> Senha</label>
                            <input type="password" class="form-control" onkeyup="validarSenha(this.value);" name="senha" id="iDsenha" aria-describedby="emailHelp" placeholder="Digite uma senha forte" value="<?php
                            if (isset($valorForm['senha'])) {
                                echo $valorForm['senha'];
                            }
                            ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label><span class="text-danger">*</span>Confirmar Senha</label>
                            <input type="password" class="form-control" name="senhaConf" id="iDsenhaConf" placeholder="Confirme sua senha" value="<?php
                            if (isset($valorForm['senhaConf'])) {
                                echo $valorForm['senhaConf'];
                            }
                            ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Sexo</label>
                            <select class="form-control" id="iDsexo" name="sexo" class="required" >
                              <option value="">Selecione seu sexo</option>
                              <option value="M">Masculino</option>
                              <option value="F">Feminino</option>
                              <option value="P">Prefiro não dizer</option>
                            </select>
                        </div>
                    </div>


                    <p>
                        <span class="text-danger">* </span>Campo obrigatório
                    </p>
                    <input name="editUsuario" type="submit" class="btn btn-warning" value="Salvar">
                </form>
            </div>
        </div>
    </div>
</main>