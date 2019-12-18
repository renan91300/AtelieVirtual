<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?> 
<style type="text/css">
  .badge{
    color: white;
    padding-right: 12px;
    padding-left: 12px;
  }

    .btn-primary{ 
        background-color: grey;
        border-color: ghostwhite;
    
    }
    .h5u{ 
        color:dimgray;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  

 <?php 
   foreach ($this->dados['item'] as $dadosItem) {
      extract($dadosItem);}
   ?>   

  
  <div class="row"> 
    <div class="col-sm-3 mt-5">
        <div class="ml-4">       <div class=" card" style=" max-width: 15rem;">
      <img class="card-img-top" src="<?=URL;?>assets/img/pagina/<?=$idPagina;?>\<?=$imagem;?>" alt="Imagem de capa do card">
          <div class="card-body">
              <div class="card-title h5u" href="#"><h5  style="text-weight: 700; color:gray"><a href="<?=URL;?>paginaProdutor/index?id=<?=$idPagina;?>"><?=$nomePagina?></a></h5>
            </div> 
          </div>
       </div>
       <div style=" margin-top: 1rem;">
        <p>
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Interessado?
          </a>
        </p>
        <div class="collapse "  id="collapseExample" >
          <div class="card card-body">
           Contato com o produtor:
           <ul class="list-group list-group-flush"> 
            <li class="list-group-item w-100"> 
              Número: <?=$telefone;?>
            </li> 
              <li class="list-group-item w-100"> 
              Email: <?=$email;?>
              </li> 


            </ul>
              </div>

          </div>
        </div>
        </div>
</div>
      
  <div class="col-sm-6"> 
    <div class="card mb-3 mt-5" style="position: relative;  max-width: 28rem;" >
      <h2 class="card-title ml-3"><?=$dadosItem['nomeItem'];?></h2> 
      <img class="card-img-top" src="<?=URL .'assets/img/item/'.$imagemItem;?> "alt="Imagem de capa do card" style=" ">
      <div class="card-body">
        <p class="card-text"><?=$descricaoItem;?></p>
          <form method="get"> 

         <?php
           $albunsListados = $this->dados['albuns']; 
              extract($albunsListados); 
              
              $varas = "albuns[]";
              $var = 0; 
              $_SESSION['id'] = $dadosItem['idItem']; 
              if(isset($_SESSION['idPessoa']) && isset($_SESSION['idPagina']) ) { 
              if( $dadosItem['idPessoa'] == $_SESSION['idPessoa'] && $_SESSION['idPagina'] == $dadosItem['idPagina'] ){ 
                echo" <p class='card-text' >             </p>
          <p class='card-text'><strong>Adicionar à Álbum: </strong>
          <select class='selectpicker' name=$varas  multiple data-live-search='true' >";
              $var = 1;
               var_dump($this->dados['albunsPagina']);
              foreach ($this->dados['albunsPagina'] as $album){
                  extract($album);
                      $id = $album['idAlbum'];
                      $tituloAlbum = $album['tituloAlbum']; 
                       echo "<option value='$id'>  $tituloAlbum <ption>";
                }
              echo "</select>";   
              } } 
          ?>
         
             <?php 
           foreach ($this->dados['albuns'] as $album) {

                        extract($album);


                        ?>
                        <a href="<?=URL?>album/index?id=<?=$idPagina;?>&idAlbum=<?=$idAlbum;?>" value="<?=$idAlbum;?>"><?=$tituloAlbum;?></a> <br> <br>
                        <?php } ?>
        <?php 
            if($var ==1)
                echo"<button type='submit' name='albunsArray' class='btn btn-primary' style='float: right; '> Atualizar</button>
         ";
        ?> 
           </form >

      </div>
    </div>
    </div> 
      
    <div class="col-sm-3 mt-5"> 
         <a href="<?php 
             
                 if( isset($_SESSION['idPessoa'])  )   
                        echo URL .'cadastroPagina/index';
                 else  
                        echo URL .'cadastroUsuario/index';
                 ?>" > <img src="<?=URL.'assets/img/imagens/bannervertical.png';?>" style="float:right" ></a>
        

</div>
  </div>



<div class="container-fluid mb-5 mt-2" style="background-color: #f2f2f2; "> 
        <div class="py-4 px-4">
              <h5>Categorias</h5>
              <ul class=" mt-5 list-group text-center list-group-horizontal-sm ">
                <?php
                  
                   $cont = 0; 
                  
                  $cat = $this->dados['categorias'];  
                  foreach ($cat[0] as $t) {
                      
                      extract($t);
                     
                      ?>
                <a href="<?=URL;?>home/categoria?idCategoria=<?=$idCategoria;?>&nome=<?=$nomeCategoria;?>" class="list-group-item btn ml-5   " style ="color: white; background-color:<?=$t['Cor'];?> "><?=$t['nomeCategoria'];?> </a>
                  <?php 
                  $cont++; 
                  }
                  ?>
              </ul>

        </div>

            <div class="col-md-12 ml-3 mt-5 text-left"><h3>Itens parecidos</h3></div>

<div class="top-content">
          <div class="container-fluid">
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner row w-100 mx-auto" role="listbox">
           
        
              <?php for($i=0;$i<8;$i++){ 
                $listaItem = $this->dados['itens']; 
                extract($listaItem[$i]); 

               ?>

           <div align="center" class="carousel-item img-thumbnail col-12 col-sm-6 col-md-4 col-lg-3 mb-5 <?php if($i == 0){ echo "active";} ?>">
                <div class="px-2" style="positin: absolute ; ">
                  <h5><?=$nomeItem;?></h5>
                </div> 
                <a href="<?=URL?>item/index?id=<?=$idItem;?>" > <img style=""src="<?=URL .'assets/img/item/'.$imagemItem;?>" class="carousel-img d-block" alt="img2"> </a>
                 <p class="text-center"><?=$nomePagina;?></p>
              </div> 
          <?php
        }
          ?>
              </div>
              <a class="carousel-control-prev " href="#carousel-example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
          </a>
            </div>
          </div>
        </div>
</div>
