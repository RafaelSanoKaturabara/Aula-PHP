function HeaderController(parametrosConstrutor){
	var $opMenu = $(parametrosConstrutor.opMenu);
	var $btPesquisar = $(parametrosConstrutor.btPesquiar);
	var $produtosLoja = $(parametrosConstrutor.produtosLoja);
	var $compraPage = $(parametrosConstrutor.compra);
	var $cadastroProduto = $(parametrosConstrutor.cadastroProduto);
	var $login = $(parametrosConstrutor.login);

	function addEventListeners(){
		// efetua a troca das imagens clicando no menu superior
		$opMenu.click(function(){
			$(".active").removeClass("active");
			$(this).addClass("active");
			switch($(this).find(".nav-link").html()){
				case "Produtos":				
					$produtosLoja.show();
					$cadastroProduto.hide();
					$login.hide();
					$compraPage.hide();
				break;
				case "Cadastrar Produtos":				
					$produtosLoja.hide();
					$cadastroProduto.show();
					$login.hide();
					$compraPage.hide();
				break;
				case "Compra":				
					$produtosLoja.hide();
					$cadastroProduto.hide();
					$login.hide();
					$compraPage.show();
				break;
				default:				
					$produtosLoja.hide();
					$cadastroProduto.hide();
					$login.show();
					$compraPage.hide();
			}
		});
	}
	this.AddEventListeners = function(){
		addEventListeners();
	}
}