<?php

	include('../../includeConstants.php');
	/**/
	$data['sucesso'] = true;
	$data['mensagem'] = "";

	if(Painel::logado() == false){
		die("Você não está logado!");
	}
	if(isset($_POST['acao']) && $_POST['acao'] == 'inserir_mensagem'){
    $mensagem = $_POST['mensagem'];
    $nome = $_SESSION['nome'];
    $id_user = $_SESSION ['id_user'];
     
     $sql= MySql::conectar()->prepare("INSERT INTO `tb_admin.chat` VALUES (null,?,?)");
     $sql->execute(array($id_user,$mensagem));

     echo '<div class="mensagem-chat">
		<span  style="background-color:#00FF00;">'.$nome.'</span>
		<p>'.$mensagem.'</p>
   </div><!--Mensagem-chat-oline-->';

      $_SESSION['lastIdChat'] = MySql::conectar()->lastInsertId();

      echo $_SESSION['lastIdChat'];

    }else if(isset($_POST['acao']) && $_POST['acao'] == 'pegarMensagens'){
        //recuperar mensagem
        $lastId = $_SESSION['lastIdChat'];

        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.chat` WHERE id > $lastId");
		$sql->execute();
        $mensagens = $sql->fetchAll();
        $mensagens = array_reverse($mensagens);
        foreach ($mensagens as $key => $value) {
        	$nomeUsuario = MySql::conectar()->prepare("SELECT nome FROM `tb_admin.usuarios` WHERE id = $value[id_user]");
	 	    $nomeUsuario->execute();
	 	    $nomeUsuario = $nomeUsuario->fetch()['nome'];
	        echo '<div class="mensagem-chat">
			      <span>'.$nomeUsuario.'</span>
			      <p>'.$value['mensagem'].'</p>
	         </div><!--Mensagem-chat-oline-->';
        	
        	$_SESSION['lastIdChat'] = $value['id'];
        }
    }

	?>