<!DOCTYPE html>
	<head >
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/loja.css"/>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/headerController.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.gritter.css" />
		<script type="text/javascript" src="js/jquery.gritter.js"></script>
		<script type="text/javascript" src="js/jquery.maskMoney.js"></script>
		<script type="text/javascript" src="js/headerController.js"></script>
		<title>Aula PHP</title>
	</head>
	<body>
		<script>
			$(document).ready(function(){
				var parametrosConstrutor = { 
					opMenu: ".opMenu",
					btPesquiar: "#btPesquiar",
					produtosLoja: "#produtosLoja",
					compra: "#compra",
					cadastroProduto: "#cadastroProduto",
					login: "#login"
				}
				var headerController = new HeaderController(parametrosConstrutor);
				headerController.AddEventListeners();
			});
		</script>
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <span class="navbar-brand" href="#">FATEC - MC</span>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active opMenu">
		        <a class="nav-link" id="linkProdutoHeader" href="#">Produtos</a>
		      </li>
		      <li class="nav-item opMenu">
		        <a class="nav-link" id="linkCompraHeader" href="#">Compra</a>
		      </li>
		      <li class="nav-item opMenu" id="opMenuCadProdutos" >
		        <a class="nav-link" href="#">Cadastrar Produtos</a>
		      </li>
		      <li class="nav-item opMenu" id="opMenuLogin">
		        <a class="nav-link" href="#">Login</a>
		      </li>
		    </ul>
		    <span id="nomeLogado" class="nav-link" style="color: #808080" href="#"></span>
		    <form class="form-inline my-2 my-lg-0">
		      <input id="txtPesquisar" class="form-control mr-sm-2" type="text" placeholder="Digite o nome do produto">
		      <button id="btPesquiar" class="btn btn-outline-success">Pesquisar</button>
		    </form>
		  </div>
		</nav>