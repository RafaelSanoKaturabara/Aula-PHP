function ProdutoLojaController(parametrosConstrutor){
	var $containerProdutos = $(parametrosConstrutor.containerProdutos);
	var $produtosLineItem = $(parametrosConstrutor.produtosLineItem).show();
	var $opMenu = $(parametrosConstrutor.opMenu);
	var $btPesquisar = $(parametrosConstrutor.btPesquiar);
	var $produtosLoja = $(parametrosConstrutor.produtosLoja);
	var $cadastroProduto = $(parametrosConstrutor.cadastroProduto);
	var $login = $(parametrosConstrutor.login);
	var $btnAdCarrinho = $(parametrosConstrutor.btnAdCarrinho);

	function fillProductItem(produto, produtosLineItemClone){	
		produtosLineItemClone.data("produto", produto);
		produtosLineItemClone.find(".nomeproduto").html(produto.produto);
		produtosLineItemClone.find(".precoproduto").html((produto.preco).replace(".",","));
		produtosLineItemClone.find(".categoriaproduto").html(produto.categoriadescricao);
		produtosLineItemClone.find(".imgproduto").attr("src", produto.nomeimagem);
	}

	function fillProdutosContainer(produtoArray){
		$containerProdutos.data("produtoArray", produtoArray);
		$containerProdutos.html("");
		$.each(produtoArray, function(i, produto){
			var $produtosLineItemClone = $produtosLineItem.clone();
			fillProductItem.call(this, produto, $produtosLineItemClone);
			$containerProdutos.append($produtosLineItemClone);
		});
	}

	function addParaCarrinho(pessoaNome, produto){
		var item = {
			action: "adicionaraocarrinho",
			produto: produto,
			pessoaNome: pessoaNome
		}
		$.ajax({
			type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "webService/lojaService.php",
            async: false,
            dataType: "json",
            data: item,
            success: function (objResposta) {
        	 	if(objResposta.success){
                	$.gritter.add({
                		title: objResposta.message,
                		text: "Produto adicionado à compra!",
                		time: 2000
                	});
                } else {
                	$.gritter.add({
                		title: objResposta.message,
                		text: objResposta.dados,
                		time: 4000
                	});
                }
            },
            error: function (ex) {
            	$.gritter.add({
                		title: "Erro",
                		text: ex.responseText,
                		time: 4000
                	});
                console.log(ex);
            }
		});
	}

	function searchProducts(){
		var data = { 
			action: "consultarproduto",
			nomeproduto: $("#txtPesquisar").val()
		};
		$.ajax({
			type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "webService/lojaService.php",
            async: false,
            dataType: "json",
            data: data,
            success: function (objResposta) {
            	if(objResposta.success){
                	fillProdutosContainer(objResposta.dados);
                } else {
                	$.gritter.add({
                		title: objResposta.message,
                		text: objResposta.dados,
                		time: 4000
                	});
                }
            },
            error: function (ex) {
            	console.log("Error");
                console.log(ex);
            }//,
            // complete: function (e) {
            //     console.log(e);
            // }
		});
	}

	function getAllProductsAndFill(){
		var item = {
			action: "consultarproduto"
		};
		$.ajax({
			type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "webService/lojaService.php",
            async: false,
            dataType: "json",
            data: item,
            success: function (objResposta) {
                if(objResposta.success){
                	fillProdutosContainer(objResposta.dados);
                } else {
                	$.gritter.add({
                		title: objResposta.message,
                		text: objResposta.dados,
                		time: 4000
                	});
                }
            },
            error: function (ex) {
            	$.gritter.add({
                		title: "Erro",
                		text: ex.responseText,
                		time: 4000
                	});
                console.log(ex);
            }
		});
	}

	function addEventListeners(){		
		// botão de pesquisar no canto superior da página
		$btPesquisar.click(function(e){
			e.preventDefault();
			searchProducts();
		});
		// botão de pesquisar no canto superior da página
		$btPesquisar.click(function(e){
			e.preventDefault();
			searchProducts();
		});

		$("#linkProdutoHeader").click(function(){
			getAllProductsAndFill();
		});

		$(document).on("click", parametrosConstrutor.btnAdCarrinho, function(e){
			var produto = $(this).parent().parent().parent().data("produto");
			var pessoaNome = $("#nomeLogado").html();
			if( pessoaNome !== "" && pessoaNome != null )
				addParaCarrinho(pessoaNome, produto);
			else
				alert("precisa se logar primeiro!");
			e.preventDefault();
		});
	}

	this.PrintAllProducts = function(){
		getAllProductsAndFill();
	}
	this.AddEventListeners = function(){
		addEventListeners();
	}
}