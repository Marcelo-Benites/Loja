<?php 
include('config.php'); 
Site::updateUsuarioOnline(); 
Site::contador(); 

$homeController = new controller\homeController();
$contatoController = new controller\contatoController();
$cursoController = new controller\cursoController();
$sobreController = new controller\sobreController();

Router::get('/',function() use ($homeController){
	$homeController->index();
});

Router::get('/contato',function() use ($contatoController){
	$contatoController->index();
});

Router::get('/curso',function() use ($cursoController){
	$cursoController->index();
});

Router::get('/sobre',function() use ($sobreController){
	$sobreController->index();
});


?>
