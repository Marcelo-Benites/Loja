<?php
	namespace controller;
    use \views\mainView;
    
	class aulaController
	{
		
		public function index($arg){
			//Validação de segurança
			if(isset($_SESSION['login_aluno']) == false){
				die('Não esta logado');
			}else if(\models\homeModel::hasCursoById($_SESSION['id_aluno']) == false){
                die('não tem o curso!');
			}

			$idAula = $arg[2];
			$aula = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.aulas` WHERE id = ?");
			$aula->execute(array($idAula));
			if($aula->rowCount() == 0){
				\Painel::alertJS("A aula não existe!");
				\Painel::redirect(INCLUDE_PATH);
			}else{
			$aula = $aula->fetch();	
			mainView::render('aula_single.php',$aula);
			  }
			}
	}
?>