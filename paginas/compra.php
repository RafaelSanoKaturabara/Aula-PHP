<script type="text/javascript" src="js/compraController.js"></script>
<script>
	$(document).ready(function(){
		var parametrosConstrutor = { 
			compraContainer: "#compraContainer",
			compraItemLine: "#compraItemLine"
		}
		var compraController = new CompraController(parametrosConstrutor);
		compraController.AddEventListeners();
		compraController.PrintAllCompra();
	});
</script>
<h3>Compras</h3>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped">
			<thead>
				<tr>				
					<th>Qtd.</th>
					<th>Imagem</th>
					<th>Nome Produto</th>
					<th>Valor unitário</th>
					<th>Total unitário</th>
					<th>Status</th>
				</tr>
			</thead>			
			<tbody id="compraContainer">
				<tr id="compraItemLine" style="display: none">
					<td><span class="compraQtd"></span></td>
					<td><img class="compraImagem" src="img/3.jpg"  height="40"/></td>
					<td><span class="compraNome"></span></td>
					<td>R$ <span class="compraValUni"></span></td>
					<td>R$ <span class="compraTotUni"></span></td>
					<td><span class="compraStatus"></span></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="container-fluid">            
    <div class="col-xs-12 col-md-4" style=" visibility:hidden;">
        <p> <span>Rafael Sano Katurabara - 4º ADS</a></span></p>
        <p>FATEC - Mogi das Cruzes - 2017</p >                          
    </div>
</div>