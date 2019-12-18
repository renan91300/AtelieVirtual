function countProps(obj) {
    var count = 0;
    for (var p in obj) {
      obj.hasOwnProperty(p) && count++;
    }
    return count; 
}

$(function (){
    
    $("#ver").click(function (){ 
        $.ajax({
            
            url:"http://127.0.0.1/projetoAtelie/home/vermais", 
            //type:"post",
            dataType:"json",
            //data:$(this).value,
            
            success: function(batata){ 
                   console.log(batata["listaItem"]);
                    var lista = new Array(); 
                    lista = batata; 
                for (var i = 0; i<countProps(batata["listaItem"]); i++){ 
                        $("#div").append("<h1> vitor é boob </H1>");
                        console.log("ui"); 
                } 
                        
                            
                        }
        })
        
    })
    
    
})

 if($cont % 2 == 1 ){ echo "<div class='card-group' >";} 
    <div class="card border-0 <?php if($cont % 2 == 1){ echo "mr-5 mt-5";}else{echo "ml-5 mt-5";} ?>">
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
                  for( var i=0; $i<count(cat); i++){
                    if($cat[$i]['idItem'] == $itens['idItem']){
                      $nomeCategoria = $cat[$i]['nomeCategoria'];
                       $cor = $cat[$i]['Cor']; 
                echo "  <a href='". URL."home/categoria?idCategoria=". $cat[$i]['idCategoria']."&nome=$nomeCategoria" . "' class='badge badge-pill badge-artesanato' style='background-color:". $cor . "'   >$nomeCategoria</a>";
                       } 
                       }
                
                    } }
           
                
              
                   </ul>
            </div>
          </div>
            
        </div>
      </div>
    </div>