function LoginController(parametrosConstrutor){
	var $formLogin = $(parametrosConstrutor.formLogin);
	var	$btLogin = $(parametrosConstrutor.btLogin);	
	var $nomeLogado = $(parametrosConstrutor.nomeLogado);

	function addEventListeners(){
		$btLogin.click(function(){
			$("#opMenuLogin").hide();
			$nomeLogado.show();
			$nomeLogado.html($("#txtEmail").val());
			$("#login").hide();
			$("#produtosLoja").show();
			$("#opMenuCadProdutos").show();
		});
	}

	this.AddEventListeners = function(){
		addEventListeners()
	}
}