<?php
	namespace Site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
	Class Contato{
	
		public function index(){
			echo "<br/>Carregando o controller da página Contato";
			$carregarView = new \Config\ConfigView("home/index");
			$carregarView->renderizar();
		}
	}