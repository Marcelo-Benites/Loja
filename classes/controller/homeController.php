<?php
	namespace controller;

 use \views\mainView;

	class homeController
	{
		public function index(){
			mainView::render('home.php');
	}
}
?>