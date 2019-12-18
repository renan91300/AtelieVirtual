<style type="text/css">
  .badge{
    color: white;
    padding-right: 12px;
    padding-left: 12px;
  }

    .btn-primary{ 
        background-color: #873799;
        border-color: #873799;
        border-radius: 0; 
    }
    
    
    
    .carda:hover {
  transform: scale(1.05, 1.05);
         transition: 0.4s;
 
}

    
</style>
<?php 
      $cont = 1; 
      
      foreach ($this->dados['listaItem'] as $itens) {
      extract($itens); 
          $_SESSION['idItem'] = $itens['idItem']; 
        
      
?>

    <!-- Team Member 1 -->
    <?php if($cont % 2 == 1 ){ echo "<div class='card-group' >";} ?>
    <div class="card  carda border-0 <?php if($cont % 2 == 1){ echo "mr-5 mt-5";}else{echo "ml-5 mt-5";} ?>" >
      <div class="card-img-top" >
        <div class="card border-1 shadow">
        <a href="<?=URL?>item/index?id=<?=$idItem;?>" >
          <img src="<?=URL .'assets/img/item/'.$imagemItem;?>" class="card-img-top" alt="...">
          <div class="card-body ">
            <h5 class="card-title  mb-0"><?=$nomeItem?></h5>
            <div class="card-text text-black-50"><?=$nomePagina?></div>
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
    </div>
  <?php if($cont % 2 == 0 ){ echo "</div>";} ?>
        
  <?php  
  $cont++; 
         
} 
 if(!($cont % 2 != 0) ){ echo "</div>";}
?> 
</div> 
</div>
    
        <div class="float-right mt-2 ml-5"> <a href="<?=URL;?>home/vermais"> 
          <button   type="button" class="btn btn-primary  mb-5  mt-2 ml-5 " > Ver mais</button>
            </a>
         </div> 
   
</div>
   