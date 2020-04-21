
<div class="box-content">
	<h2><i class="fa fa-pencil"></i>Cadastrar Veículo Carro</h2>
<form method="post" enctype="multipart/form-data">
<?php
  if(isset($_POST['acao'])){
   $nome = $_POST['nome'];
   $descricao = $_POST['descricao'];
   $imagens = array();
   $amountFiles = count($_FILES['imagem']['name']);

   $sucesso = true;

   if($_FILES['imagem']['name'][0] != ' '){

   for ($i = 0;$i < $amountFiles; $i++){
   $imagemAtual = ['type'=>$_FILES['imagem']['type'][$i],
				'size'=>$_FILES['imagem']['size'][$i]];
   	if(Painel::imagemValida($imagemAtual) == false){
   		$sucesso = false;
      Painel::alert('erro','Uma das imagens selecionadas são invalidas!');
   		break;
   	}
   }
   
   }else{
   	$sucesso = false;
   	Painel::alert('erro','Voce precisa selecionar pelo menos uma imagem');
   }

if($sucesso){
				//TODO: Cadastrar informacoes e imagens e realizar upload.
				for($i =0; $i < $amountFiles; $i++){
					$imagemAtual = ['tmp_name'=>$_FILES['imagem']['tmp_name'][$i],
						'name'=>$_FILES['imagem']['name'][$i]];
					$imagens[] = Painel::uploadFile($imagemAtual);
				}

				$sql = MySql::conectar()->prepare("INSERT INTO `tb_text.carro` VALUES (null,?,?)");
				$sql->execute(array($nome,$descricao));
				$lastId = MySql::conectar()->lastInsertId();
				foreach ($imagens as $key => $value) {
					MySql::conectar()->exec("INSERT INTO `tb_site.carro` VALUES (null,$lastId,'$value')");
				}
				Painel::alert('sucesso','O produto foi cadastrado com sucesso!');
			}


}
?>
<div class="form-group">
			<label>Marca do Veículo:</label>
			<input type="text" name="nome">
		</div><!--form-group-->	

<div class="form-group">
	<label>Descrição do Veículo:</label>
	<textarea name="descricao"></textarea>
</div>
<div class="form-group">
	<label>Selecione as Imagens:</label>
	<input multiple type="file" name="imagem[]">
</div><!--form-group-->
<input type="submit" name="acao" value="Cadastrar">
</form>	

</div>