<?php

if (!defined('URL')){
    header("location: /");
    exit();
}
?> 
<style type="text/css">
  .badge{
    color: white;
    padding-right: 12px;
    padding-left: 12px;
  }

    .btn-primary{ 
        background-color: #873799;
        border-color: blueviolet;
    
    }
    
       .animate{
        opacity: 1;
        -webkit-transition: opacity 1.5s linear;
    }
img{opacity: 0}
  

</style> 
 <h1 style="text-align: center;">Como o site funciona?</h1> 
<div class="container">
    
    <h2>Explore  </h2>
    <p> No Atêlie Virtual você irá encontrar produtos, ideias e histórias de pessoas, comunidades e organizações que encontraram aqui um espaço para expor aquilo do que melhor fazem. Do simples ao complexo, do retrô ao moderno, da pura utilidade à pura arte. Este ambiente traz para você aquilo que mais lhe interessa e, além disso, apresenta um mundo de oportunidades e novas ideias. 
    </p>
    
    <p> O cadastro no site é algo simples e intuitivo, assim como toda a sua navegação, com objetivo de garantir a nossos usuários a melhor experiência. Exponha o que você faz para que outras pessoas vejam, relaçoes sejam estabelecidas e oportunidades criadas. </p>
        <div align="center" style="positon: reltive; " > 
       
        <img onload="this.className='animate'" src="<?=URL .'assets/img/imagens/guia.png';?>" \>
             </div>
        
     <h3>Página</h3> 
    <p> Ao criar uma página, você poderá utiliza-lá para recomendar à outras pessoas suas produções, e desse modo facilitar a divulgação da sua proposta e dos seus trabalhos efetivamente. Além disso, suas criações estarão disponíveis para serem apresentadas a usuários regulares do site, aumentando ainda mais o potencial do seu reconhecimento.  
         </p>
   
    <p> Na sua página, você colocará as categorias as quais ela faz parte, a descrição da proposta do seu empreendimento e  como as pessoas poderão fazer contato com você ou a organização ao qual você representa. Assim, estará pronto para criar os albúns e itens que desejar expor, organizando-os da forma que achar melhor.   
         </p>
       
    <h3>Os Itens</h3>                                                     
                                                              
             
    <p> Os itens consistem em produtos que foram adicionados por uma página, eles aparecerão em toda a navegação do site e serão recomendados aos usuários continuamente. Assim, eles funcionam como uma forma de interessar quem está navegando às propostas dos empreendimentos, aumentando a chance de entrarem em contatos com seus produtores.    
         </p>
    <p>
        É interessante, portanto, que, ao cadastrar um item, o usuário escreva uma descrição apropriada para o produto, de forma a torna-lo atrativo para a potencial clientela. Além disso, uma imagem de qualidade e bem produzida pode ser uma aliada para uma melhor divulgação.  
        </p>
              <div align="center" style="positon: reltive; " > 
       
        <img onload="this.className='animate'" src="<?=URL .'assets/img/imagens/itemM.png';?>" \>
             </div> 
    
    <h3> Primeiro passo </h3>
    
    <p> Você agora conhece o nosso site e, com o seu talento e suas ideias, novas oportunidades e conquistas poderão ser adquiridas com a sua participação! Traga aqui o que faz de melhor e faça parte dessa iniciativa!  </p>
    
    <p>Dito isso, está na hora de começar... </p>
    
    
    <a href="<?php 
             
                 if( isset($_SESSION['idPessoa'])  )   
                        echo URL .'cadastroPagina/index';
                 else  
                        echo URL .'cadastroUsuario/index';
                 ?>" class=""><div align="center" style="positon: reltive; " >  <img onload="this.className='animate'" id="isso"  onmouseover="mudar()" onmouseout="mudar2()"  src="<?=URL .'assets/img/imagens/comeca1.png';?>" > </div></a>
    
    
       
       </div>
    </div>
<script> 
     var isso = document.getElementById("isso");
    function mudar(){ 
         isso.src="<?=URL .'assets/img/imagens/comeca2.png';?>" ; 
    }
     function mudar2(){ 
         isso.src="<?=URL .'assets/img/imagens/comeca1.png';?>";
     }   
    

</script>

<div class="mb-5"></div>
 
  
