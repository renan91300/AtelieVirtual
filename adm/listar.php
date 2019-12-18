<?php   
  include("includes/header.php"); 
  include("includes/menu.php"); 

  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lista </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
                        <a class="btn btn-success" href="#" role="button">Inserir</a>

          </div>
        
            
            
         
                
        </div>
        </div>

<div> 
<table class="table table-striped table-info">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Acoes</th>
    </tr>
  </thead>
  <tbody>
    
      <?php 
        for($i=1; $i<=10; $i++){ ?>
      <tr>
      <th scope="row"><?= $i; ?></th>
      <td>Mark</td>
      <td>Otto</td>
      <td>
          <a class="btn btn-warning" href="<?= $i; ?>" role="button">Editar</a>
          <a class="btn btn-danger" href="<?= $i; ?>" role="button">Apagar</a>
          


            
          
      </td>
    </tr>
      <?php } ?>
    
  </tbody>
</table>
</div>
      
      
    </main>

    <?php   
  include("includes/footer.php"); 
 

  ?>

