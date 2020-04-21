<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Aluno</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
			$nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if($nome == '' || $email == '' || $senha == ''){
                 Painel::alert('erro','Você preciza preencher todos os campos!');
            }else{
            	$sql = \MySql::conectar()->prepare("INSERT INTO `tb_admin.alunos` VALUES (null,?,?,?)");
            	$sql->execute(array($nome,$email,$senha));
            	Painel::alert('sucesso','o aluno foi cadastrado com sucesso!');
            }

			}
		?>

		<div class="form-group">
			<label>Nome do Aluno:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="senha">
		</div><!--form-group-->

		<div class="form-group">
			<label>E-mail</label>
			<input type="email" name="email">
		</div><!--form-group-->
            <input type="submit" name="acao" value="cadastrar alunos">
		<div class="form-group">
		</div>	


	</form>



</div><!--box-content-->