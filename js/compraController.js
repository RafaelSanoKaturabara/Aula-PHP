function CompraController(parametrosConstrutor){
	var $compraContainer = $(parametrosConstrutor.compraContainer);
	var $compraItemLine = $(parametrosConstrutor.compraItemLine).show().remove();

	function fillCompraItemLine(itemCompra, $compraItemLineClone){
		$compraItemLineClone.find(".compraQtd").html(itemCompra.quantidade);
		$compraItemLineClone.find(".compraNome").html(itemCompra.pnome);
		$compraItemLineClone.find(".compraValUni").html(itemCompra.ppreco);
		$compraItemLineClone.find(".compraTotUni").html(itemCompra.ppreco * itemCompra.quantidade);
		$compraItemLineClone.find(".compraStatus").html((itemCompra.status == 1) ? "Carrinho" : "Pago");
		$compraItemLineClone.find(".compraImagem").attr("src", itemCompra.pnomeimagem);
	}

	function fillCompraContainer(objCompra){
		$compraContainer.html("");
		$.each(objCompra.itemCompraArray, function(i, itemCompra){
			var $compraItemLineClone = $compraItemLine.clone();
			fillCompraItemLine.call(this, itemCompra, $compraItemLineClone);			
			$compraContainer.append($compraItemLineClone);
		});
	}

	function printAllCompra(){
		var nomecomprador = $("#nomeLogado").html();
		if(nomecomprador == null || nomecomprador == "")
			return;
		var item = {
			action: "getAllCompra",
			nomecomprador: nomecomprador
		}
		$.ajax({
			type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "webService/lojaService.php",
            async: false,
            dataType: "json",
            data: item,
            success: function (objResposta) {
            	console.log(objResposta);
        	 	if(objResposta.success){
                	fillCompraContainer(objResposta.dados);
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
		$("#linkCompraHeader").click(function(){
			printAllCompra();
		});
	}

	this.AddEventListeners = function(){
		addEventListeners();
	}
	this.PrintAllCompra = function(){
		printAllCompra();
	}
}