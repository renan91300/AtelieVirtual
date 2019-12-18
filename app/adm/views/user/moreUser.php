<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuário</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
        <div>Bem vindo!</div>
    </div>
    <div class="table-responsive"><?php
if (!empty($this->dados['dados_usuario'][0])) {
    extract($this->dados['dados_usuario'][0]);
    ?>
    <div class="content p-1">
        <div class="list-group-item">
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <h2 class="display-4 titulo">Ver Usuário</h2>
                </div>
                <div class="p-2">
                    <span class="d-none d-md-block">
                        <?php
                        if ($this->dados['botao']['list_usuario']) {
                            echo "<a href='" . URL . "adm-user/index' class='btn btn-outline-info btn-sm'>Listar</a> ";
                        }
                        if ($this->dados['botao']['edit_usuario']) {
                            echo "<a href='" . URL . "adm-user/upUser/$idPessoa' class='btn btn-outline-warning btn-sm'>Editar</a> ";
                        }
                        if ($this->dados['botao']['edit_senha']) {
                            echo "<a href='" . URL . "adm-user/upUserPass/$idPessoa' class='btn btn-outline-danger btn-sm'>Editar Senha</a> ";
                        }
                        if ($this->dados['botao']['del_usuario']) {
                            echo "<a href='" . URL . "adm-user/delUser/$idPessoa' class='btn btn-outline-danger btn-sm' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a> ";
                        }
                        ?>
                    </span>
                </div>
            </div><hr>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <dl class="row">
            
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><?php echo $idPessoa; ?></dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9"><?php echo $nome; ?></dd>

                <dt class="col-sm-3">E-mail</dt>
                <dd class="col-sm-9"><?php echo $email; ?></dd>

                <dt class="col-sm-3">Gênero</dt>
                <dd class="col-sm-9"><?php echo $sexo; ?></dd>

                <dt class="col-sm-3">Recuperar Senha</dt>
                <dd class="col-sm-9"><?php
                    if (!empty($recuperar_senha)) {
                        echo URL . "atual-senha/atual-senha?chave=" . $recuperar_senha;
                    }
                    ?></dd>

                <dt class="col-sm-3">Situação</dt>
                <dd class="col-sm-9">
                    <span class="badge badge-<?php 
                        $badge = ""; 
                    if(isset($acesso)){ $badge= "Adm"; echo"success";} else {$badge = "Usuario"; echo"dark";}?>"><?=$badge;?></span>                
                </dd>

            </dl>


        </div>
    </div>
    <?php
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
    $urlDestino = URL . 'adm-user/index';
    header("Location: $urlDestino");
}
?>
    </div>
    
    
    
   <!-- <div class="table-responsive"> 
            <table class="table table-striped table-hover table-bordered">
            <thead>
                         
             <tr>
                    <th>ID</th>
                    <th>Nome da Página</th>
                    <th class="d-none d-sm-table-cell">E-mail</th>
                    <th class="d-none d-lg-table-cell">Situação</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                     <?php
                
                    /* foreach ($this->dados['listUser'] as $usuario) {
                    extract($usuario);
                    ?>
                    <tr>
                        <th><?php echo $idPessoa; ?></th>
                        <td><?php echo $nome; ?></td>
                        <td class="d-none d-sm-table-cell"><?php echo $email; ?></td>
                         <td class="d-none d-lg-table-cell">
                            <span class="badge badge-<?php 
                        $badge = ""; 
                    if(isset($acesso)){ $badge= "Adm"; echo"success";} else {$badge = "Usuario"; echo"dark";}?>"><?=$badge;?></span>
                        </td>
                       
                        <td class="text-center">
                                <span class="d-none d-md-block">
                                    <?php
                                    if ($this->dados['botao']['vis_usuario']) {
                                        echo "<a href='". URL . "adm-user/moreUser/$idPessoa' class='btn btn-outline-primary btn-sm'>Visualizar</a> ";
                                    }
                                    if ($this->dados['botao']['edit_usuario']) {
                                        echo "<a href='". URL . "adm-user/upUser/$idPessoa' class='btn btn-outline-warning btn-sm'>Editar</a> ";
                                    }
                                    if ($this->dados['botao']['del_usuario']) {
                                        echo "<a href='". URL . "adm-user/delUser/$idPessoa' class='btn btn-outline-danger btn-sm' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a> ";
                                    }
                                    ?>
                                </span>
                        </td>
                    </tr>
                    <?php
                }
                */
                ?>
                                    
                                    
                </tbody>
    
    
        -->
    
    </div>
</main>