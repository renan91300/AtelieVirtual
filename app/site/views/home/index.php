<?php

if (!defined('URL')){
    header("location: /");
    exit();
}


//var_dump($this->dados['noticias']); 
//echo "<br />View HOME <br />";
//var_dump($this->dados['carousel']);?>

<style>
  /* Style the input field */
  #myInput, #menu {
    padding: 12px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }
    
    .scrollable-menu {
    height: auto;
    max-height: 35rem;
    overflow-x: hidden;
}
  </style>

<main role="main">
 <div class="pos-f-t" id="funciona">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="row p-4" style="background-color:#EFF0F0">
      


  <script type="text/javascript">
  window.onscroll = function() {posicaoMenu()}; 
  window.onload = function(){ 
       var funciona = document.getElementById("funciona"); 
       funciona.classList.add("back"); 

  }
 var funciona = document.getElementById("funciona"); 
    
    var sticky = funciona.offsetTop;
    function posicaoMenu(){

      if(window.pageYOffset >= sticky) {
    funciona.classList.add("sticky"); 
    funciona.classList.remove("back");
    console.log("batat"); 
  } else {
   funciona.classList.remove("sticky");
   funciona.classList.add("back"); 

  }


   } 

  </script>
    </div>
  </div>
  <nav class="navbar navbar-dark ">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" id="menu" style="background-color: white; color: black;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Categorias  </button>
    <button class="dropdown-menu scrollable-menu" role="menu" aria-labelledby="navbarDropdown">
         <input class="form-control" id="myInput" type="text" placeholder="Procurar..">
<?php 
           
          foreach ($this->dados['listaCategorias'] as $categoria) {
            
                extract($categoria);
             
                   
     ?>
      <a href="<?=URL;?>home/categoria?idCategoria=<?=$idCategoria;?>&nome=<?=$nomeCategoria;?>" class="list-group-item rounded-0 list-group-item-action w-100"><?=$nomeCategoria;?></a>
     <?php 
        
           }
         
          
    ?>     </button>
    </div>
  </nav>
</div>

    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu a").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="row"> 
    <div class="col-sm-10"> 
    <div id="cartas"  style="background-color:white ;"> 
    <div class="container" style="position: relative; margin-left: 20% ; width:58%; " >

     <div class="card" style="width: 100%; position: relative; " >
      <div class="card-body">
        <h2 class="card-title text-center">Itens mais visualizados</h2>
      </div>
</div>

   

 
   
    
    


    
