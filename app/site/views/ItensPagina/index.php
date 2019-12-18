
<link rel="stylesheet" type="text/css" href="css/paginaProdutor.css">

<style type="text/css">
  .badge{
    color: white;
    padding-right: 12px;
    padding-left: 12px;
  }
    
      .carda:hover {
  transform: scale(1.05, 1.05);
         transition: 0.4s;
 
}

    .bot{ 
       background-color: gainsboro; /* Green */
      border: none;
      color: black;
      padding: 2rem; 1rem;;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    
    
    }
    
  .bot:hover {
  background-color: gray; /* Green */
  color: white;
}
</style>



  


<div class="container-fluid">
  <div class="px-lg-5">

    <!-- For demo purpose -->
    <div class="row py-5">
      <div class="col-sm-8 mx-auto">
        <div class=" bg-dark text-white p-5 shadow-sm rounded banner">
          <h1 class="display-4">Itens da página</h1>
        
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
          <a href="<?=URL .'paginaProdutor/index?id='. $idPagina;?>">  <div class="profile mr">
                        <img src="<?=URL;?>assets/img/pagina/<?=$idPagina;?>\<?=$imagem;?>" alt="..." width="300"  class="rounded mb-2 img-thumbnail"> <button class="bot mt-2  w-50  rounded p-1"  > <?=$nomePagina;?></button></div>
         </a>
          
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
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4 carda">
        <div class="bg-white rounded shadow-sm" > <a href="<?=URL?>item/index?id=<?=$idItem;?>" class="text-dark" >
        <img src="<?=URL .'assets/img/item/'.$imagemItem;?>" width="200" class="img-fluid card-img-top">
          <div class="p-4">
            <h5> <?=$nomeItem; ?>
            <p href="descricaoItem" class="small text-muted mb-0">Descrição do Item</p>
                </a> 
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4" >
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
            <?php if(isset($_SESSION['dono'])){
               $url = URL; 
                echo "<a href='$url itensPagina/index?excluir=$idItem &id=$idPagina'><button type='button' class='btn btn-danger' > Excluir Item </button></a>";
           } ?>
    </div>
  <?php //if($cont % 2 == 0 ){ echo "</div>";} ?>
        
  <?php  
  $cont++; 
         
} 
// if(!($cont % 2 != 0) ){ echo "</div>";}
?> 
</div> 

               

    </div>
     <?php 
        $url = URL;
        if(isset($_SESSION['idPagina'])) echo"<div class='mb-5'>
        <a class='btn btn-primary ' style='float: right; ' href='$url cadastroItem/index'>Adicionar Item</a>
        </div>"; ?> 
</div>

          
          
          
