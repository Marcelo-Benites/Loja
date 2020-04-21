<?php
	namespace controller;
 use \views\mainView;
	class contatoController
	{
		
		public function index(){
			mainView::render('contato.php');
		}
	}
?>