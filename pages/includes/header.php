<!DOCTYPE html>
<html>
<head >
  <title>Loja Virtual</title>
  <meta charset="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/style1.css">

</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
   <div class="sucesso">Formulário enviado com sucesso</div>
   <div class="overlay-loading">
     <img src="<?php echo INCLUDE_PATH?>img/ajax-loader.gif"/>
   </div>
  <header class="header1">
  <div class="container">
     <ul class="ul1">
     <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Quem  Somos</a></li>
       <li><a>|</a></li>
        <li><a href="<?php echo INCLUDE_PATH; ?>contato">Fale conosco</a></li>
     </ul>
     <ul class="num">
     <li><a><i class="material-icons">phone_in_talk</i>993031008</a></li>
       <li><a><i class="material-icons">phone_in_talk</i>Recado:991367732</a></li>
     </ul>
  </div>
  </header>
<header   class="header2">
  <div class="container">
  <div class="form-group">
      <label><img src="images/logoloja.png" alt="loja" />Fique por Dentro das Novidades</label>
      <div>   
      <input type="text" name="busca" placeholder="E-mail">
    </div>
		</div><!--form-group-->
    <div class="form-group">
			<input type="submit" name="busca" value="Buscar">
		</div><!--form-group-->
    <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>"><img  src="images/logoloja.png" alt="loja" /></a></div>
    <nav class="desktop">
      <ul>
        <li><a href="<?php echo INCLUDE_PATH; ?>curso"><i class="material-icons">store</i>Shop</a></li>
        <li><a href="<?php echo INCLUDE_PATH; ?>sobre"><i class="material-icons">add_shopping_cart</i>Carrinho</a></li>
        <li><a href="<?php echo INCLUDE_PATH; ?>shop">Finalizar Pedido</a></li>    
      </ul>
    </nav><!--desktop-->
    <div class="clear"></div>
     <nav class="mobile">
      <div class="botao-menu-mobile"><i class="fa fa-bars" aria-hidden="true" style="color:black;"></i></div>
      <ul>
      <li><a href="<?php echo INCLUDE_PATH; ?>curso"><i class="material-icons">store</i>Shop</a></li>
        <li><a href="<?php echo INCLUDE_PATH; ?>sobre"><i class="material-icons">add_shopping_cart</i>Carrinho</a></li>
        <li><a href="<?php echo INCLUDE_PATH; ?>shop">Finalizar Pedido</a></li>
      </ul>
    </nav><!--mobile-->
  </div><!--container-->
</header>
<div class="clear"></div>


