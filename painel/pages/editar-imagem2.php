<?php
	$id = (int)$_GET['id'];
	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_text.outros` WHERE id = ?");
	$sql->execute(array($id));
	if($sql->rowCount() == 0){
		Painel::alert('erro','O produto que você quer editar não existe!');
		die();
	}

	$infoImagem = $sql->fetch();

	$pegaImagens = MySql::conectar()->prepare("SELECT * FROM `tb_site.outros` WHERE outros_id = $id");
	$pegaImagens->execute();
	$pegaImagens = $pegaImagens->fetchAll();

?>

<div class="box-content">
	<?php
	if(isset($_GET['deletarImagem'])){
		$idImagem = $_GET['deletarImagem'];
		@unlink(BASE_DIR_PAINEL.'/uploads/'.$idImagem);
		MySql::conectar()->exec("DELETE FROM `tb_site.outros` WHERE imagem = '$idImagem'");
		Painel::alert('sucesso','A imagem foi deletada com sucesso!');
		$pegaImagens = MySql::conectar()->prepare("SELECT * FROM `tb_site.outros` WHERE outros_id = $id");
		$pegaImagens->execute();
		$pegaImagens = $pegaImagens->fetchAll();
	}
	?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Galeria <?php echo $id; ?></h2>
	 
   <div class="card-title">Informações dos Outros Veículos</div>
	<form method="post" enctype="multipart/form-data">
		<?php
		if(isset($_POST['acao'])){
			$nome = $_POST['nome'];
			$descricao =  $_POST['descricao'];

			$Imagens = [];

			$sucesso = true;
            $amountFiles = count($_FILES['imagem']['name']);
			if($_FILES['imagem']['name'][0] != ''){
				//Nosso usuario quer adicionar mais imagens no produto!
				for($i =0; $i < $amountFiles; $i++){
					$imagemAtual = ['type'=>$_FILES['imagem']['type'][$i],
					'size'=>$_FILES['imagem']['size'][$i]];
					if(Painel::imagemValida($imagemAtual) == false){
						$sucesso = false;
						Painel::alert('erro','Uma das imagens selecionadas são inválidas!');
						break;
					}
			   }

	        }

			 if($sucesso){
			 	if($_FILES['imagem']['name'][0] != ''){
					for($i =0; $i < $amountFiles; $i++){
						$imagemAtual = ['tmp_name'=>$_FILES['imagem']['tmp_name'][$i],
							'name'=>$_FILES['imagem']['name'][$i]];
						$imagens[] = Painel::uploadFile($imagemAtual);
					}

						foreach ($imagens as $key => $value) {
							MySql::conectar()->exec("INSERT INTO `tb_site.outros` VALUES (null,$id,'$value')");
						}

			    }

			    $sql = MySql::conectar()->prepare("UPDATE `tb_text.outros` SET nome = ?, descricao = ? WHERE id = $id");
			    $sql->execute(array($nome,$descricao));
                Painel::alert('sucesso','Você atualizou sua foto com sucesso');
                	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_text.outros` WHERE id = ?");
	                $sql->execute(array($id));
	                $infoImagem = $sql->fetch();
	                $pegaImagens = MySql::conectar()->prepare("SELECT * FROM `tb_site.outros` WHERE outros_id = $id");
	                $pegaImagens->execute();
	                $pegaImagens = $pegaImagens->fetchAll();

			}
		}
		?>
<div class="form-group">
			<label>Marca do Veículo:</label>
			<input type="text" name="nome" value="<?php echo $infoImagem['nome']; ?>">
		</div><!--form-group-->	

<div class="form-group">
	<label>Descrição do Veículo:</label>
	<textarea name="descricao" ><?php echo $infoImagem['descricao']; ?></textarea>
</div>
<div class="form-group">
	<label>Selecione as Imagens:</label>
	<input multiple type="file" name="imagem[]">
</div><!--form-group-->
<input type="submit" name="acao" value="Atualizar Imagem">
</form>	
<div class="card-title">Imagens Dos Outros Veículos</div>
      <div class="boxes">
      	<?php
      	 foreach ($pegaImagens as $key => $value) {
      	 
      	?>
	<div class="box-single-wraper">
			<div style="border: 1px solid #ccc;padding:8px 15px;">
			<div style="width: 100%;float: left;" class="box-imgs">
				<img class="img-square" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem'] ?>" />
			</div><!--box-imgs-->
			<div class="clear"></div>
			<div style="text-align: center;" class="group-btn">
				<a class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-imagem2?id=<?php echo $id; ?>&deletarImagem=<?php echo $value['imagem'] ?>"><i class="fa fa-times"></i> Excluir</a>
			</div><!--group-btn-->
		</div>
	</div>		
   <?php } ?>
</div>