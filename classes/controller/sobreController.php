<?php
	namespace controller;
 use \views\mainView;
	class sobreController
	{
		
		public function index(){
			mainView::render('sobre.php');
		}
	}
?>