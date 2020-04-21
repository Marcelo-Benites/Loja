$(function(){
	
  $('.box-chat-online').scrollTop($('.box-chat-online')[0].scrollHeight);

$('textarea').keyup(function(e){
	 var code = e.keyCode || e.which;
		 if(code == 13) { //Enter keycode
		  	insertChat();
		 }
})	

$('form').submit(function(){
	insertChat();
	return false;
})
	function insertChat(){
		//funcao responsavel por inserir s mensagems
		var mensagem = $('textarea').val();
        $('textarea').val('');
        $.ajax({
        	url:include_path+'ajax/chat.php',
        	method:'post',
        	data:{'mensagem':mensagem,'acao':'inserir_mensagem'}
        }).done(function(data){
        	$('.box-chat-online').append(data);
        	$('.box-chat-online').scrollTop($('.box-chat-online')[0].scrollHeight);
        })
	}

	function recuperarMensagem(){
		//recuperar mensagens novas no banco de dados
		 $.ajax({
        	url:include_path+'ajax/chat.php',
        	method:'post',
        	data:{'acao':'pegarMensagens'}
        }).done(function(data){
        	$('.box-chat-online').append(data);
        	$('.box-chat-online').scrollTop($('.box-chat-online')[0].scrollHeight);
        })
          
	}

	setInterval(function(){
          recuperarMensagem();
	},3000);
})