<?php
	namespace site\controllers;
	
	if(!defined('URL')){
		header("location: /");
		exit();
	}
	
class Guia{
    
    public function index(){
        $carregarView = new \Config\ConfigView("guia/index");
			$carregarView->renderizar();
    }
}