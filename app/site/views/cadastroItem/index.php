
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

   }
.formula{ 
        background: #504c52; 
    
    
    
    
    }
   label{
    color: white;
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



<div class="container pt-5 pb-5"  style="position: relative; padding-left: 10%; padding-right:10%;">
    <h1>Cadastro do Item</h1>     


     <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if (!isset($this->dados['formRetorno'])){
                $nomeItem = $imagemItem = $descricaoItem = "";
            }else {
                extract($this->dados['formRetorno']); 
            }
        ?>

    <div class= "back border rounded" > 
       
      <form enctype="multipart/form-data" class="p-4 formula" method="POST"> 
        <div class="form-group" style="position: relative;">
        <label for="inputNome">Nome do Item</label>
        <input type="text"  class="form-control" id="inputNome" name="nomeItem"aria-describedby="emailHelp" placeholder="Digite o nome do Item" value="<?= $nomeItem; ?>">
        </div>
        
      

        <div class="form-group " style="margin-top: 1rem">
        <label for="inputDesc">Descrição do Item</label>
        <textarea class="form-control" id="inputDesc" name="descricaoItem" rows="3" placeholder="Descreva o seu Item" value="<?= $descricaoItem; ?>"></textarea>
        </div>        
         
          <div class="form-group pt-1"> 
              <label for="inputDesc">Categoria(s) do Item</label>
              <br>
              <select class="selectpicker" name='categoriasArray[]'  multiple data-live-search="true" >
             <?php 
               foreach ($this->dados['listaCategorias'] as $categoria) {

                        extract($categoria);


                        ?>
                        <option value="<?=$idCategoria;?>"><?=$nomeCategoria;?></option> 
                        <?php } ?>
                **</select>

            </div>
         
           <div class="form-row">
                        <div class="form-group col-md-6">

                            <label><span class="text-danger">*</span> Foto (150x150)</label>
                            <input name="imagem_nova" type="file" onchange="previewImagem(); ">
                        </div>
                      
                    </div>          
        <!--  

        <div class="custom-file">
          <input type="file" class="custom-file-input p-4" id="inputItem" name="imagemItem" value="<?= $imagemItem; ?>">
          <label class="custom-file-label " for="inputItem">Escolher arquivo</label>
        </div>
--> 

        <button type="submit" name="formAddItem" value="Enviar" class="btn btn-primary mt-2" >Enviar</button>

        </form>
  </div>
</div>

