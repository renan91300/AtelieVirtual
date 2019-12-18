<?php
session_start(); //inicializando a sessão
ob_start(); //limpa o buffer de redirecionamento

//url padrão do site 
define('URL', 'http://127.0.0.1/projetoAtelie/');
define('URLADM', 'http://127.0.0.1/projetoAtelie/adm/');

//controller e métodos padrão
define('CONTROLLER', 'Home');
define('METHOD', 'index');

//dados de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'atelieVirtual');
define('ERROR404', 'Error404'); 
define('ERROR4044', 'home'); 