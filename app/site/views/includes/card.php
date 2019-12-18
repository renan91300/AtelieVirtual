 
<div class="col-sm-2 pt-5">
<div class="card pt" style="width: 12rem;" >
  <img src="<?=URL .'assets/img/imagens/card.jpg';?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title text-center">Crie sua página!</h5>
    <p class="card-text  ">Aqui no Ateliê Virtual qualquer um pode ter o seu espaço para expor os seus trabalhos!</p>
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
    
