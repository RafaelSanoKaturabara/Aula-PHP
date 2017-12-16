function CadastroProdutoController(parametrosConstrutor){
	var $formProduto = $(parametrosConstrutor.formProduto);
	var $btSalProduto = $(parametrosConstrutor.btSalProduto);
	var $btCadProduto = $(parametrosConstrutor.btCadProduto);	
	var $btLimparFormProduto = $(parametrosConstrutor.btLimparFormProduto);

	function fillFormCadProdutos(produto){
		$formProduto.find("#txtCodProduto").val(produto.idproduto);
		$formProduto.find("#txtNomeProduto").val(produto.nome);
		$formProduto.find("#txtPreco").val((produto.preco).replace(".",","));
		$formProduto.find("#txtEndImg").val(produto.nomeimagem);
		$formProduto.find("#txtCategoria").val(produto.categoriadescricao);
	}

	function getAtributosProdutoJSON(){
		var item = {
			action: "salvarproduto",
			produto: {
				idproduto: $formProduto.find("#txtCodProduto").val(),
				nome: $formProduto.find("#txtNomeProduto").val(),
				preco: ($formProduto.find("#txtPreco").val()).replace(".","").replace(",","."),
				nomeImagem: $formProduto.find("#txtEndImg").val(),
				Categoria: $formProduto.find("#txtCategoria").val()
			}
		};
		return item;
	}

	function apagarFormularioCadProduto(){		
		$formProduto.find("#txtCodProduto").val("");
		$formProduto.find("#txtNomeProduto").val("");
		$formProduto.find("#txtPreco").val("");
		$formProduto.find("#txtEndImg").val("");
		$formProduto.find("#txtCategoria").val("");
	}

	function cadastrarProduto(){
		$.ajax({
			type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "webService/lojaService.php",
            async: false,
            dataType: "json",
            data: getAtributosProdutoJSON(),
            success: function (objResposta) {
                if(objResposta.success){
                	fillFormCadProdutos(objResposta.dados);
                	$.gritter.add({
                		title: objResposta.message,
                		text: "Produto inserido com sucesso!",
                		time: 2000
                	});
                }
            },
            error: function (ex) {
            	console.log("Error");
                console.log(ex);
            }
		});
	}

	function buscarProdutoById(idproduto){
		var data = {
			action: "buscarproduto",
			idproduto: idproduto
		}
		$.ajax({
			type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "webService/lojaService.php",
            async: false,
            dataType: "json",
            data: data,
            success: function (objResposta) {
                if(objResposta.success){
                	fillFormCadProdutos(objResposta.dados);
                	$.gritter.add({
                		title: objResposta.message,
                		text: "Produto Existente",
                		time: 2000
                	});
                }
            },
            error: function (ex) {
            	console.log("Error");
                console.log(ex);
            }
		});
	}

	function addEventListeners(){
		$btSalProduto.click(function(e){
			console.log("salv PRodut");
			e.preventDefault();

		});
		$btCadProduto.click(function(e){
			cadastrarProduto();
			e.preventDefault();
		});
		$btLimparFormProduto.click(function(e){
			$.gritter.add({
				title: "Testanto o gritter",
				text: "Dê uma olhada direito e apague",
				time: 2000
			});
			apagarFormularioCadProduto();
			e.preventDefault();
		});

		$("#txtCodProduto").on("blur", function(){
			var idproduto = $("#txtCodProduto").val();
			if(idproduto != null & idproduto > 0)
				buscarProdutoById(idproduto);
		})
		$("#txtPreco").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
	}

	this.AddEventListeners = function(){
		addEventListeners();
	}
}