
<script type="text/javascript" src="js/produtoLojaController.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var parametrosConstrutor = { 
			containerProdutos: "#containerProdutos",
			produtosLineItem: "#produtosLineItem",
			btnAdCarrinho: ".btnAdCarrinho",
			btPesquiar: "#btPesquiar"
		}
		var produtoLojaController = new ProdutoLojaController(parametrosConstrutor);
		produtoLojaController.AddEventListeners();
		produtoLojaController.PrintAllProducts();
		
	});
</script>
<div class="row">
	<div class="col-sm-1">
		<h5>Categoria</h5>
		<ul>
			<li> Todos </li> <br/>
			<li> Destaque </li> <br/>
		</ul>
	</div>
	<div class="col-sm-11" id="menuCategoria">
		<h5>Produtos</h5>
		<div class="row" id="containerProdutos">			
			<div id="produtosLineItem" class="produtos col-sm-2">
				<img class="imgproduto" src="http://www.leitecamponesa.com.br/wp-content/uploads/2015/08/produtos-leite-condensado-350x263.png" /><br/>
				<b><span class="nomeproduto"> Nome do Produto</span></br>
				<small>Categoria: </small><small class="categoriaproduto"></small><br/>
				<small><button class="btn btn-success btn-sm btnAdCarrinho" style="cursor:pointer;">Adicionar</button><small>
				<h5>R$: <span class="precoproduto">R$ 53,00</span> </h5><br/>
			</div>				
		</div>	
	</div>	
</div>
 <div class="container-fluid">            
    <div class="col-xs-12 col-md-4" style=" visibility:hidden;">
        <p> <span>Rafael Sano Katurabara - 4º ADS</a></span></p>
        <p>FATEC - Mogi das Cruzes - 2017</p >                          
    </div>
</div>