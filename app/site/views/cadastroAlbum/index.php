<?php

if (!defined('URL')){
    header("location: /");
    exit();
}


?> 


<style type="text/css">
	
  .back{ 
    background: #654ea3;
    background: -webkit-linear-gradient(to left,  #948E99, #2E1437);
    background: linear-gradient(to left,  #948E99, #2E1437);*/
    min-height: 100vh;

	 }
    .formula{ 
        background: #504c52; 
    
    
    
    
    }
	 label{ 
	 	color:white;
	  }

   h5{
    color: white;
   }

   p{
    color: white
   }
  </style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




     <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if (!isset($this->dados['formRetorno'])){
                $tituloAlbum = $descricaoAlbum = "";
            }else {
                extract($this->dados['formRetorno']); 
            }
        ?>



<div class="container pt-5 pb-5"  style="position: relative; padding-left: 10%; padding-right:10%;">
    <h1>Cadastro do Álbum</h1>     

    <div class= "border rounded" style="margin-top: 2rem; border-radius: 25px;"> 
       
    	<form class="p-4 formula" method="post"> 
        <div class="form-group" style="position: relative;">
        <label for="inputNome">Nome do Álbum</label>
        <input type="text" class="form-control" id="inputNome" name="tituloAlbum" aria-describedby="emailHelp" placeholder="Digite o nome do álbum" value="<?= $tituloAlbum; ?>">
        </div>
        
        
        <div class="form-group " style="margin-top: 1rem">
        <label for="inputDesc">Descrição do Álbum</label>
        <textarea class="form-control" id="inputDesc" name="descricaoAlbum" rows="3" placeholder="Descreva o seu álbum" value="<?= $descricaoAlbum; ?>"></textarea>
        </div>        


	     <div class="form-group"> 
          <label>Categorias do Item</label>
          <br>
            <select name="categoriasArray[]" id="selectCategorias" class="selectpicker"  multiple data-live-search="true" >
               <?php 
           foreach ($this->dados['listaCategorias'] as $categoria) {
                    extract($categoria);
                    ?>
                    <option value="<?=$idCategoria;?>"><?=$nomeCategoria;?></option> 
                    <?php } ?>
          </select >
        </div>

		<button type="submit" name="formAddAlbum" value="Enviar" class="btn btn-primary mt-2" >Enviar</button>


        </form>
</div>
</div>

