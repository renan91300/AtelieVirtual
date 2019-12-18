<?php

if (!defined('URL')){
    header("location: /");
    exit();
}

?> 
<style>   .btn-primary{ 
        background-color: #873799;
        border-color: #873799;
        border-radius: 0; 
    }
    
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    <div class="row mb-5"> 
        <div class="col-sm-8">
        
        
        <div class="pb-5"> 
        </div> 

<div class="container pt-5 border rounded"  style="position: relative; margin-left: 5rem;">
    <?php
     
      $pessoa = $this->dados['pessoa'] ; 
      extract($pessoa);
     ?> 

    <h2 class="pt-2">Meu Perfil</h2>
        <h5 class="p-4"><?=$pessoa[0]['nome'];?></h5>
    
    <div class="list-group mb-5 ">
        <div href="#" class="list-group-item list-group-item-action" style="background-color:black; color:white;">
        Minhas informações:
        </div>
        <?php
     
          $pessoa = $this->dados['pessoa'] ; 
          extract($pessoa);

         ?> 
        
        <a  class="list-group-item list-group-item-action">Nome: <?=$pessoa[0]['nome'];?></a>
        <a  class="list-group-item list-group-item-action">Email: <?=$pessoa[0]['email'];?></a>  
        <a  class="list-group-item list-group-item-action">Data de nascimento: <?=$pessoa[0]['dataNascimento'];?></a>
        <a  class="list-group-item list-group-item-action">Sexo: <?=$pessoa[0]['sexo'];?></a>
        
        
    </div>
        
    
    <div class="list-group ">
        <div href="#" class="list-group-item list-group-item-action" style="background-color:black; color:white;">
        Minhas páginas:
        </div>


         <?php foreach ($this->dados['paginas'] as $paginas) {
           extract($paginas); 

         ?>
          <a href="<?=URL .'paginaProdutor/logada?id='. $idPagina;?>" class="list-group-item list-group-item-action"><?=$nomePagina;?></a>
          <?php 
        } 
        ?>
  

    </div>
        
        
       <div class="list-group  pt-5">
  <div href="#" class="list-group-item list-group-item-action" style="background-color:black; color:white;">
   Categorias preferidas:
  </div>
           <ul class="list-group">
 <?php foreach ($this->dados['categoriasPerfil'] as $categorias) {
   extract($categorias); 

 ?>
  <li href="#" class="list-group-item "><a style="color:black;" href="<?=URL;?>home/categoria?idCategoria=<?=$idCategoria;?>&nome=<?=$nomeCategoria;?>"><?=$nomeCategoria?></a><a href="<?=URL;?>Perfil/index?remover=<?=$idCategoria;?>"> <small>remover</small></a></li>
 

            <?php 
                } 
                ?>
  

           </ul> 
</div> 

<script type="text/javascript">
$('select').selectpicker();
</script>

<form method="get"> 
         <div class="form-group pt-5"> 
	    	<label>Selecione categorias que você quer ver com mais frequência no site: </label>
	    	<br>
	    		<select class="selectpicker" name = 'categoriasArray[]'  multiple data-live-search="true" >
			   <?php 
           foreach ($this->dados['categorias'] as $categoria) {
                    extract($categoria);
                    ?>
                    <option value="<?=$idCategoria;?>"><?=$nomeCategoria;?></option> 
                    <?php } ?>
		    </select>
               <a href=""><button type="submit" name="addCategorias" class="btn btn-primary ml-2">Atualizar</button></a>
		</div>
      </form >
</div>           
        </div>
        
        
    <div class="col-sm-4 mt-3 ">
<div class="card" style="width: 18rem; margin-left: 5rem " >
  <img src="<?=URL .'assets/img/imagens/card.jpg';?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title text-center">Crie sua página!</h5>
    <p class="card-text  ">Aqui no Ateliê Virtual qualquer um pode ter espaço para expor os seus trabalhos!</p>
    <a href="<?php 
             
                 if( isset($_SESSION['idPessoa'])  )   
                        echo URL .'cadastroPagina/index';
                 else  
                        echo URL .'cadastroUsuario/index';
                 ?>" class="btn btn-primary">Começar</a>
  </div>
</div>

        </div>
</div>