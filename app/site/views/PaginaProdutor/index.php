<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?> 

<?php 

foreach ($this->dados['pagina'] as $pagina) {

  extract($pagina);
}


?>
<script src="//unpkg.com/fast-average-color/dist/index.min.js"></script>


<style>
    .img {
     width: 25rem;
    height: 25rem;
     background-position: 50% 50%;
     background-repeat: no-repeat;
     background-size: cover;
  }
    
    .cor-fundo{
    background-color: #f2f2f2 ;
        
        
    }
 
    
   /* Opacity #1 */
.hover11 figure img {
	opacity: 1;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover11 figure:hover img {
	opacity: .5;
}

</style>
<div class="row py-5 cor-fundo">
    <div class="container mb-5">

        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div id="capa" class="px-4 pt-0 pb-4 " style="background-color: #969081;">
                <div class="media align-items-end profile-header">
                    <div class="profile mr-3">
                        <img id="imagem" src="<?=URL;?>assets/img/pagina/<?=$idPagina;?>\<?=$imagem;?>" alt="..." width="300" class="rounded mb-2 img-thumbnail"></div>
                    <div style="background-color:#404040;border-radius: 15px; padding-left:3rem; " class="media-body mb-5 text-white">
                        <h4 class="mt-2"><?=$nomePagina;?></h4>
                        <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i><?=$cidade;?></p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item" style="margin-right: 1rem;">
                        <h5 class="font-weight-bold mb-0 d-block"><?php $count = count($this->dados['listaItem']); echo $count;  ?></h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Itens</small>
                    </li>
                 
                   
  
                </ul>
                
            </div>
            

            
            <div class="py-4 px-4"> 
              <h3>Sobre</h3>

              <p><?=$descricaoPagina;?></p>
            </div>

            <div class="py-4 px-4">
              <h5>Categorias</h5>
              <ul class="list-group text-center list-group-horizontal-sm ">
               <?php
                  foreach ($this->dados['categorias'] as $cat) {
                      extract($cat);
                     
                      ?>
                <a href="<?=URL;?>home/categoria?idCategoria=<?=$idCategoria;?>&nome=<?=$nomeCategoria;?>" class="list-group-item btn   " style ="color: white; background-color:<?=$cat['Cor'];?> "><?=$cat['nomeCategoria'];?> </a>
                  <?php 
                  }
                  ?>
                              </ul>

            </div>




            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Itens</h5>
                </div>
                 <div class="row hover11">
                   
                 <?php 
                    foreach ($this->dados['itensPagina'] as $itens) {
                              extract($itens); 
                                                ?>
                    <div class="col-lg-6 mb-2 pr-lg-1">
                        <a href="<?=URL?>item/index?id=<?=$idItem;?>" > <figure><img class="img" src="<?=URL;?>assets/img/item/<?=$imagemItem?>" alt="" class="img-fluid rounded shadow-sm" style="position: relaive; "> </figure></a></div>
                    

                <?php 

                      } 
                   ?> 
                             
                </div>
             
                       <a href="<?=URL?>ItensPagina/index?id=<?=$idPagina;?>"class="btn btn-primary ml-3" style="color: white; float: left;"  >Ver mais</a>    
            </div>

     <div class="col-md-12 text-center mt-5"><h3><a class="btn btn-primary btn-lg" href="<?=URL;?>albuns/index?id=<?=$idPagina;?>" style="color: white; background-color: dodgerblue;">Álbuns</a></h3></div>
   



                <div class="pt-1 px-4 py-4 mt-5">
                  <h2>Contato</h2>
                  <div class="row">
                    <div class="col-sm">
                    <ul class="list-group  list-group-flush">
                        <li class="w-50 list-group-item ">Facebook </li>
                        <li class="w-50 list-group-item">Instagram </li>
                        <li class="w-50 list-group-item">Whatsapp </li>
                        <li class="w-50 list-group-item">Email</li>
                    </ul> 
                    </div>
                  <div class="col-sm">
                     <ul class="list-group list-group-flush">
                        <li class="w-50 list-group-item"><?=$facebook;?></li>
                        <li class="w-50 list-group-item"><?=$instagram;?></li>
                        <li class="w-50 list-group-item"><?=$telefone;?></li>
                        <li class="w-50 list-group-item"><?=$email?></li>
                    </ul>
                    </div> 
                </div>
              </div>
               
               <div class="top-content">
          <div class="container-fluid pb-5">
              <h4 align="center">Mais itens</h4>
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner row w-100 mx-auto" role="listbox">
           
        
              <?php for($i=0;$i<8;$i++){ 
                $listaItem = $this->dados['itens']; 
                extract($listaItem[$i]); 

               ?>

         <div align="center" class="carousel-item img-thumbnail col-12 col-sm-6 col-md-4 col-lg-3 <?php if($i == 0){ echo "active";} ?>">
                <div  class="px-2" style="positin: absolute ; ">
                  <h5><?=$nomeItem;?></h5>
                </div> 
                <a href="<?=URL?>item/index?id=<?=$idItem;?>" > <img style=""src="<?=URL .'assets/img/item/'.$imagemItem;?>" class="carousel-img d-block" alt="img2"> </a>
                 <p class="text-center"><?=$nomePagina;?></p>
              </div> 
          <?php
        }
          ?>
              </div>
              <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
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

        </div><!-- End profile widget -->

    </div>



<script>
const demo = new FastAverageColor(); 
var imagem = document.getElementById("imagem");  
const cor = demo.getColor(imagem); 
var capa = document.getElementById("capa") 
capa.style.background = cor["hex"];
    
    


</script> 
