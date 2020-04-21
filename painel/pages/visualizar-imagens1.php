
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Imagens Cadastradas</h2>
	<div class="busca">
		<h4><i class="fa fa-search"></i> Realizar uma busca</h4>
		<form method="post">
			<input placeholder="Procure pela imagem desejada" type="text" name="busca">
			<input type="submit" name="acao" value="Buscar!">
		</form>
	</div><!--busca-->
	<?php
	   if(isset($_GET['deletar'])){
	   	//queremos algum produto
	   	$id = (int)$_GET['deletar'];
	   	$imagens = MySql::conectar()->prepare("SELECT * FROM `tb_site.carro` WHERE carro_id = $id");
	   	$imagens->execute();
	   	$imagens = $imagens->fetchAll();
	   	foreach ($imagens as $key => $value) {
	   		@unlink(BASE_DIR_PAINEL.'/uploads/'.$value['imagem']);
	   	}
	   	MySql::conectar()->exec("DELETE FROM `tb_site.carro` WHERE carro_id = $id");
	   	MySql::conectar()->exec("DELETE FROM `tb_text.carro` WHERE id = $id");
	   	Painel::alert("sucesso","A imagem foi deletada da galeria com sucesso! ");
	   }
	?>
	<div class="boxes">
	<?php
	$query = "";
	if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar!'){
				$nome = $_POST['busca'];
				$query = "WHERE (nome LIKE '%$nome%' OR descricao LIKE '%$nome%')";
	 }
	 $sql = MySql::conectar()->prepare("SELECT * FROM `tb_text.carro` $query");
	 $sql->execute();
	 $fotos = $sql->fetchAll();
	 if($query != ''){
	   	 echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($fotos).'</b> resultado(s)</p></div>';
	   }

	 foreach ($fotos as $key => $value) {
	  $imagemSingle = MySql::conectar()->prepare("SELECT * FROM `tb_site.carro` WHERE carro_id = $value[id] LIMIT 1");
	   $imagemSingle->execute();
	   $imagemSingle = $imagemSingle->fetch()['imagem'];
	?>
		<div  class="box-single-wraper">
			<div style="border:1px solid #ccc;padding:8px 15px;height:100%;">
			<div style="width: 30%;float: left; " class="box-imgs">
				<?php
				if($imagemSingle == ''){

				?>
				<h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
			<?php }else{?>
				<img  style="width: 320%;"  class="img-square"  src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $imagemSingle ?>">
			<?php } ?>
                 </div><!--boxes-img-->

			<div style="width: 90%;float: left;border:0;" class="box-single">
			<div class="body-box" style="text-align: center ;" >
					<p ><b><i class="fa fa-pencil"></i> Nome da Imagem:</b></p><p ><?php echo $value['nome']?></p> 
					<p  style="border-top: 2px solid rgb(210,210,210);"><b><i class="fa fa-pencil"></i> Descrição da Imagem:</b></p><p><?php echo $value['descricao']?></p>	
					<div style="border-top: 2px solid rgb(210,210,210); padding: 10px;"class="group-btn">
						<a class="btn delete"  href="<?php echo INCLUDE_PATH_PAINEL ?>visualizar-imagens1?deletar=<?php echo $value['id'] ?>"; ?><i class="fa fa-times"></i> Excluir</a>
						<a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-imagem1?id=<?php echo $value['id'] ?>"><i class="fa fa-pencil"></i> Editar</a>
					</div><!--group-btn-->
				</div><!--body-box-->
			</div><!--box-single-->
			<div class="clear"></div>
		</div>
		</div><!--box-single-wraper-->

      <?php } ?>
	</div><!--boxes-->

</div><!--box-content-->