<script type="text/javascript" src="js/cadastroProdutoController.js"></script>
<script>
	$(document).ready(function(){
		var parametrosConstrutor = { 
			formProduto: "#formProduto",
			btCadProduto: "#btCadProduto",			
			btSalProduto: "#btSalProduto",
			btLimparFormProduto: "#btLimparFormProduto"
		}
		var cadastroProdutoController = new CadastroProdutoController(parametrosConstrutor);
		cadastroProdutoController.AddEventListeners();
	});
</script>
<div class="row">
		<div class="col-sm-4">			
		</div>
		<div class="col-sm-4">
			<h3>Cadastro de Produtos</h3>
			<form class="form-group" data-toggle="validator" role="form" id="formProduto">
				<span><b>Cód. Produto: </b><small>(Opcional para editar)</small></span><br/>
				<input class="form-control" type="text" id="txtCodProduto"/><br/> 
				<span><b>Nome do produto:</b> </span><br/>
				<input class="form-control" type="text" id="txtNomeProduto" required="required"></span> <br/>
				<div class="row">
					<div class="col-sm-6">	
						<span ><b>Preço:</b> <br/>
						<input class="form-control" type="text" id="txtPreco" required="required" placeholder="R$ 0,00" /><br/>
					</div>
					<div class="col-sm-6">	
						<span><b>Categoria:</b></span> <br/>
						<input class="form-control" type="text" required="required" id="txtCategoria"/><br/>
					</div>
				</div>
				<span><b>Endereço da Imagem:</b></span> <br/>
				<input class="form-control" id="txtEndImg" required="required"/><br/>
				<button class="btn btn-success" id="btCadProduto" value="Cadastrar">Cadastrar</button>		
				<button class="btn btn-warning" id="btLimparFormProduto">Limpar</button>
			</form>
		</div>
		<div class="col-sm-4">
		</div>
</div>
