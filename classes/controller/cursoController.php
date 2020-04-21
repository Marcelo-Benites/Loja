<?php
	namespace controller;
 use \views\mainView;
	class cursoController
	{
		
		public function index(){
			mainView::render('curso.php');
		}
	}
?>