
<link rel="stylesheet" type="text/css" href="css/paginaProdutor.css">

<style type="text/css">
  .badge{
    color: white;
    padding-right: 12px;
    padding-left: 12px;
  }
  .badge-arte{ 
    background-color: #ffd61f; 
   }
  .badge-artesanato{ 
    background-color: #ff7112; 
   }
  .badge-brinquedos{
    background-color: #13ccd6;
  }
  .badge-decoracao{
    background-color: #b012c4;
  }
  .badge-madeira{ 
    background-color: #8f511e; 
   }
  .badge-rustico{ 
    background-color: #db955c; 
   }
   .perfil-albuns{
    max-width: 14rem;
    border-radius: 0.5rem;
    }
</style>



  <?php 
    $album = $this->dados['Album']; 
    extract($album); 
    


   ?> 


<div class="container-fluid">
  <div class="px-lg-5">

    <!-- For demo purpose -->
    <div class="row py-5">
      <div class="col-sm-8 mx-auto">
        <div class=" bg-dark text-white p-5 shadow-sm rounded banner">
          <h1 class="display-4"><?=$album[0]['tituloAlbum'];?></h1>
          <p class="lead"><?=$album[0]['descricaoAlbum'];?></p>
        </div>
      </div>
      <?php 
    //  $this->dados['pagina'] = $pagina;
     // var_dump($this->dados['pagina']) ;
     // extract($pagina); 
      foreach ($this->dados['pagina'] as $pagina) {
                    extract($pagina);
        } 
      ?> 
      <div class="col-sm-4"> 
          <div class="container" ><a href="<?=URL .'paginaProdutor/index?id='. $idPagina;?>"> <img src="<?=URL;?>assets/img/pagina/<?=$idPagina;?>\<?=$imagem;?>" alt="..." width="300" align="center" class="rounded mb-2 img-thumbnail">
          <h5 class="mt-2 bg-light border rounded p-1" style="text-align: center;"> <?=$nomePagina;?></h5></a>
          </div>
      </div> 
    </div>

    <!-- For demo purpose -->
    <div class="row">
      
         <?php 
         $cont = 0; 
         foreach ($this->dados['listaItem'] as $itens) {
                    extract($itens);

                     ?>


      <!-- Gallery item -->
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm" > <a href="<?=URL?>item/index?id=<?=$idItem;?>" class="text-dark" > 
        <img src="<?=URL .'assets/img/item/'.$imagemItem;?>" width="200" class="img-fluid card-img-top">
          <div class="p-4">
              <h5> <?=$nomeItem; ?></h5></a>
            <p href="descricaoItem" class="small text-muted mb-0">Descrição do Item</p>
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
           <ul class="list-inline mb-0">
               <?php
                foreach($this->dados['categoriasItens'] as $cat){ 
                    extract($cat); 
                    
                   if(empty($cat))
                     unset($cat); 
                   else{ 
                  for($i=0; $i<count($cat); $i++){
                       if($cat[$i]['idItem'] == $itens['idItem']){
                      $nomeCategoria = $cat[$i]['nomeCategoria'];
                       $cor = $cat[$i]['Cor']; 
                echo "  <a href='". URL."home/categoria?idCategoria=". $cat[$i]['idCategoria']."&nome=$nomeCategoria" . "' class='badge badge-pill badge-artesanato' style='background-color:". $cor . "'   >$nomeCategoria</a>";
                       } 
                       }
                
                    } }
           ?>
                
              
                   </ul>
            </div>
          </div>
            
       
         </div>
    </div>
  <?php //if($cont % 2 == 0 ){ echo "</div>";} ?>
        
  <?php  
  $cont++; 
         
} 
// if(!($cont % 2 != 0) ){ echo "</div>";}
?> 
</div> 
        
        
    </div>

</div>

          
          
          
