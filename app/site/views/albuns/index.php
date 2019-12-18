
<link rel="stylesheet" type="text/css" href="css/paginaProdutor.css">

<style type="text/css">
  .badge{
    color: white;
    padding-right: 12px;
    padding-left: 12px;
  }

</style>



  <?php 
    $pagina = $this->dados['pagina']; 
    extract($pagina[0]); 
    


   ?> 


<div class="container-fluid">
  <div class="px-lg-5">
    <div class="row py-5">
      <div class="col-sm-8 mx-auto">
        <div class=" bg-dark text-white p-5 shadow-sm rounded banner">
          <h1 class="display-4"><?=$nomePagina;?></h1>
          <p class="lead">Albuns da Página</p>
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
      <div class="col-sm-4" > 
          <div class="container" ><a href="<?=URL .'paginaProdutor/index?id='. $idPagina;?>">  <img src="<?=URL;?>assets/img/pagina/<?=$idPagina;?>\<?=$imagem;?>" alt="..." width="300" align="center" class="rounded mb-2 img-thumbnail">
          <h5 class="mt-2 bg-light border rounded p-1" style="text-align: center;"> <?=$nomePagina;?></h5></a>
          </div>
      </div> 
    </div>
    <div class="row">
      
         <?php 
         $cont = 0; 
         foreach ($this->dados['albuns'] as $albuns) {
                    extract($albuns);
                
                     ?>


      <!-- Gallery item -->
          <div class="col-xl-3 col-lg-4 col-md-6 mb-4"  >
            <div class="bg-white rounded shadow-sm"  > <a href="<?=URL?>album/index?id=<?=$idPagina;?>&idAlbum=<?=$idAlbum;?>" class="text-dark" >
              <div class="p-4" style="background-color: #e3dddc">
                  <h5> <?=$tituloAlbum;?></h5>
                <p href="descricaoItem" class="small text-muted mb-0"></p>
                 
                <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
               <ul class="list-inline mb-0">
                   <?php
                    foreach($this->dados['categoriasAlbuns'] as $cat){ 
                        extract($cat);                    
                       if(empty($cat))
                         unset($cat); 
                       else{ 
                      for($i=0; $i<count($cat); $i++){
                           if($cat[$i]['idAlbum'] == $albuns['idAlbum']){
                          $nomeCategoria = $cat[$i]['nomeCategoria'];
                           $cor = $cat[$i]['Cor']; 
                    echo "  <a href='". URL."home/categoria?idCategoria=". $cat[$i]['idCategoria']."&nome=$nomeCategoria" . "' class='badge badge-pill badge' style='background-color:". $cor . "'   >$nomeCategoria</a>";
                                } 
                           }
                        } 
                    }
                    ?>
                </ul>
                </div>
              </div>       
            </div>
           <?php 
             $url = URL; 
             $id = $_GET['id']; 
             $var = 0; 
           if(isset($_SESSION['idPessoa']))
                if( $pagina['idPessoa'] == $_SESSION['idPessoa'] ){ 
                echo "<a  class='btn btn-danger' href='$url/albuns/index?id=$id&excluir=$idAlbum'> Excluir Album</a>";
           } ?>
              
              </div>
              
              
  <?php  
  $cont++; 
         
} 

?> 
    </div> 
      <?php 
        $url = URL;
        if(isset($_SESSION['idPagina'])) echo"<div class='mb-5'>
        <a class='btn btn-primary mb-5' style='float: right; ' href='$url cadastroAlbum/index'>Criar Álbum</a>
        </div>"; ?> 
      </div> 
</div>

          
          
          
