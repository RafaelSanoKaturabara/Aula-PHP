<script type="text/javascript" src="js/loginController.js"></script>
<script>
	$(document).ready(function(){
		var parametrosConstrutor = { 
			formLogin: "#formLogin",
			btLogin: "#btLogin",			
			nomeLogado: "#nomeLogado"
		}
		var loginController = new LoginController(parametrosConstrutor);
		loginController.AddEventListeners();
	});
</script>
<div class="row">
	<div class="col-sm-4">		
	</div>
	<div class="col-sm-4">		
		<h3>Login</h3>
		<form id="formLogin" class="form-group" >
			<span>E-mail:</span><input class="form-control" type="email" id="txtEmail"/><br/>
			<span>Senha: </span><input class="form-control" type="password" id="txtPassword"/><br/>
			<button class="btn btn-success" id="btLogin">Logar</button>
		</form>	
	</div>
	<div class="col-sm-4">		
	</div>
</div>