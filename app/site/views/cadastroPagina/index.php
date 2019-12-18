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




  <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if (!isset($this->dados['formRetorno'])){
                $nomePagina = $descricaoPagina = $endereco = $estado = $cidade = $cep = $email = $telefone = $instagram = $facebook = "";
            }else {
                extract($this->dados['formRetorno']); 
            }
        ?>
 

<div class="container  pt-5 mb-5"  style="position: relative; padding-left: 10%; padding-right:10%;">
   
    <h1>Cadastro da Página do Produtor</h1>     

    <div class= "border rounded"> 
        <form class="p-4 formula" enctype="multipart/form-data" onSubmit="return verificar()" method="post" >


        <div class="form-group" style="font-weight: 700" >
        <label for="nome">Nome da Página</label>
        <input type="nome" class="form-control" id="asd" name="nomePagina" value="<?=$nomePagina;?>" aria-describedby="emailHelp" placeholder="Digite o nome da página">
        </div>
        

        <div class="form-group">
        <label for="inputDesc">Descrição da Página</label>
        <textarea class="form-control" id="inputDesc" name="descricaoPagina" value="<?=$descricaoPagina;?>" rows="3" placeholder="Descreva a sua página"></textarea>
        </div>        


          <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="endereco" name="endereco" value="<?=$endereco;?>" class="form-control" id="endereco" placeholder="Rua dos Gados, nº 0">
          </div>



          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Cidade</label>
              <input type="text" name="cidade" class="form-control"  value="<?=$cidade;?>" id="inputCity">
            </div>
              
               <div class="form-group col-md-4">
              <label for="inputEstado">Estado</label>
              <select id="inputEstado" name="estado" class="form-control">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
              
       
      
                  
            <div class="form-group col-md-5">
              <label for="inputCEP">CEP</label>
              <input type="text" name="cep" value="<?=$cep;?>" class="form-control" id="inputCEP">
            </div>
          </div>

        

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>    

       <div class="form-group "> 
           <p> Categorias da página</p>

              <select class="selectpicker" name='categoriasArray[]'  multiple data-live-search="true" >
             <?php 
               foreach ($this->dados['listaCategorias'] as $categoria) {

                        extract($categoria);


                        ?>
                        <option value="<?=$idCategoria;?>"><?=$nomeCategoria;?></option> 
                        <?php } ?>
            </select>

        </div>
               
              <p>Imagem da Página</p>
            
               <div class="form-row">
                        <div class="form-group col-md-6">

                            <label><span class="text-danger">*</span > Foto (150x150)</label>
                            <input  name="imagem_nova" style="color: white;" type="file" onchange="previewImagem();">
                        </div>
                      
                    </div>          


        <h5 style="margin-top: 1rem; margin-bottom: 1rem">Opções de Contato</h5>
            

            <div class="form-group">
              <label for="exampleInputEmail1">Endereço de email</label>
              <input type="email" value="<?=$email;?>" name="email" class="form-control" id="emailContato" aria-describedby="emailHelp" placeholder="Email de contato">
            </div>
            
            
            

            <div class="form-group">
              <label for="exampleInputEmail1">Telefone</label>
              <input type="telefone" value="<?=$telefone;?>" name="telefone" class="form-control" id="telefonelContato" placeholder="Telefone de Contato">
            </div>


            <div class="form-row align-items-center">
            <div class="col-auto">
              <label class="inputInsta"> Instagram </label>
             
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input type="text" value="<?=$instagram;?>" name="instagram" class="form-control" id="inlineFormInputGroup" placeholder="Usuário">
              </div>
            </div>
            </div>


            <div class="form-row align-items-center">
            <div class="col-auto">
              <label class="inputInsta"> Facebook </label>
              
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"> /</div>
                </div>
                <input type="text" class="form-control " value="<?=$facebook;?>" name="facebook" id="inlineFormInputGroup" placeholder="Usuário">
              </div>
            </div>
            </div>


            <button type="submit" value="enviar" name="formAddPagina" class="btn btn-primary mt-3 mb-2" >Enviar</button>


        </form>
               

        
      </div>
    </div>
  </div>
  
  </form>
  </div>

  </div> 
</div> 








