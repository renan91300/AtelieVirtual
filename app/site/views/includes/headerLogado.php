<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $_SESSION['nome'];?></title>
    <link rel="icon" href="<?= URL; ?>assets/img/icon/logo.png" />
 
<script src="<?= URL.'assets/js/jquery-3.3.1.min.js'; ?>"> </script>
    <script src="<?= URL.'assets/js/jquery-migrate-3.0.0.min.js'; ?>"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="<?= URL; ?>assets/js/jquery.backstretch.min.js"></script>
        <script src="<?= URL; ?>assets/js/wow.min.js"></script>
        <script src="<?= URL; ?>assets/js/scripts.js"></script>


    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
  <link href="<?= URL; ?>assets/css/carousel.css" rel="stylesheet">
	<link href="<?= URL; ?>assets/css/cssHeader.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
</head>
<body>
<header>
   <nav class="navbar navbar-expand-lg navbar-dark back">
   <a class="navbar-brand" href="<?=URL .'home/index';?>">
     <img src="<?=URL .'assets/img/icon/logo.png';?>" width="40" height="40" alt="">
  <a class="nav-item">
  <a class="navbar-brand" style="color: white" href="<?=URL .'home/index';?>">Ateliê Virtual</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="<?=URL;?>guia/index">Guia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#ancora">Contato</a>
      </li>
      
        </ul>
      </div>
      <div class="navbar-nav">
          <ul class="navbar-nav">
            <li class="navbar-item">
                <img src="<?=URL .'assets/img/icon/icone.png';?>">
                 </li>
             <li class="nav-item text-nowrap">
              <a class="nav-link" href="<?= URL ?>perfil/index">Perfil</a>
          </li>
            </li>
             <li class="nav-item text-nowrap">
              <a class="nav-link" href="<?= URL ?>login/logout">Logout</a>
          </li>
              </ul>
    </div>
     
    </ul>
  </div>

</nav>
</header>
