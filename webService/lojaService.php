<?php 	 
	// função para padronização de respostas do webservice
    function outputService( $success = true, $message = null, $dados )
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(
            array(
                'success' => $success,
                'message' => $message,
                'dados'   => $dados
            )
        );
        exit;
    }

    if(!isset($_GET["action"])) // não enviaram o action?
		outputService(false, "Error", $_GET);

	switch ($_GET["action"]) {
		case 'salvarproduto':
			salvarproduto();
			break;
		case 'buscarproduto':
			getProductById();
			break;
		case 'consultarproduto':
			getProductList();
			break;
		case 'getAllCompra':
			getCompraList();
			# code...
			break;
		case 'salvarproduto':
			# code...
			break;
		case "adicionaraocarrinho":
			adicionarProdutoAoCarrinho();
			break;
		default:
			outputService(false, "Error", $_GET["action"]);
			break;
	}

	function getProductById(){
		if(!isset($_GET["idproduto"]))
			outputService(false, "Error", "Não foi enviado um código de produto existente");	


		$query = "select * FROM produto where idproduto = ".$_GET["idproduto"].";";
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		if(!mysqli_query($conexao, $query))
			outputService(false, "Erro", "Erro na hora de inserir!");
		$resultado = mysqli_query($conexao, $query);
		$produtoEncontrado = mysqli_fetch_assoc($resultado);
		outputService(true, "Encontrado", $produtoEncontrado);

	}

	function getCompraList(){
		if(!isset($_GET["nomecomprador"]))
			outputService(false, "Error", "Não foi enviado uma pessoa válida");	
		$pessoaNome = $_GET["nomecomprador"];
		$query = "select * from compra where nomecomprador = '".$pessoaNome."';";
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		$resultado = mysqli_query($conexao, $query);
		$resultadoWork = mysqli_fetch_assoc($resultado); 
		if($resultadoWork["idcompra"] < 1) // não encontrou uma compra?
			outputService(false, "Error", "Não foi encontrado a Compra!");
		$idCompra = $resultadoWork["idcompra"];
		$query = "select 
					 	ic.*
						, p.nome as 'pnome'
						, p.preco as 'ppreco'
						, p.nomeimagem as 'pnomeimagem'
						, p.categoriadescricao as 'pcategoriadescricao'
					from 
						itemcompra ic 
						join produto p on ic.idproduto = p.idproduto
					where
						ic.idcompra = ".$idCompra.";";
		$resultado = mysqli_query($conexao, $query);
		$itemCompraArray = array();		
		// montando o array de objeto
		while($itemcompra = mysqli_fetch_assoc($resultado)) {
		    $itemCompraArray[] = array (
		    	'iditemcompra' => $itemcompra['iditemcompra'],
		    	'quantidade' => $itemcompra['quantidade'],
		    	'idproduto' => $itemcompra['idproduto'],
		    	'idcompra' => $itemcompra['idcompra'],
		    	'status' => $itemcompra['status'],
		    	'pnome' => $itemcompra['pnome'],
		    	'ppreco' => $itemcompra['ppreco'],
		    	'pnomeimagem' => $itemcompra['pnomeimagem'],
		    	'pcategoriadescricao' => $itemcompra['pcategoriadescricao']
		    );
		}
		$resultadoWork["itemCompraArray"] = $itemCompraArray;
		outputService(true, "Success", $resultadoWork);
	}
	
	function adicionarProdutoAoCarrinho(){
		if(!isset($_GET["produto"]))
			outputService(false, "Error", "Não foi enviado um produto válido");		
		if(!isset($_GET["pessoaNome"]))
			outputService(false, "Error", "Não foi enviado uma pessoa válida");		
		$pessoaNome = $_GET["pessoaNome"];
		$produto = $_GET["produto"];
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		// verifica se a pessoa já comprou
		$query = "select idcompra from compra where nomecomprador = '".$pessoaNome."';";
		$resultado = mysqli_query($conexao, $query);
		$resultadoWork = mysqli_fetch_assoc($resultado);
		if( $resultadoWork["idcompra"] != null && $resultadoWork["idcompra"] > 0) { // cliente já tem uma compra?
			 $idCompra = $resultadoWork["idcompra"];
		} else {
			//insere uma nova compra/
			$query = "insert into compra ( nomecomprador) values ('".$pessoaNome."');"; // inserir
			if(!mysqli_query($conexao, $query))
				outputService(false, "Error", "Erro ao inserir o comprador");		
			$query = "select idcompra FROM compra ORDER BY idcompra DESC LIMIT 1";
			$resultado = mysqli_query($conexao, $query);
			$resultadoWork = mysqli_fetch_assoc($resultado);
			$idCompra = $resultadoWork["idcompra"];
		}
		// Verificar se o item já foi incluso

		// adiciona o item a compra
		$query = "insert into itemcompra (quantidade, idproduto, idCompra, status) values (1,".$produto["idproduto"].",".$idCompra.",1);";
		if(mysqli_query($conexao, $query))
			outputService(true, "Sucesso", "Item adicionado ao carrinho!");		 	
		else
		 	outputService(false, "Error", "Erro ao inserir o item da compra");
	}

	function salvarProduto(){
		if(!isset($_GET["produto"]))
			outputService(false, "Error", "Não foi enviado um produto válido");
		$produto = $_GET["produto"];
		if($produto["idproduto"] != null && $produto["idproduto"] > 0)
			updateProdutoAndReturn($produto);
		$query = "insert into produto (nome, preco, nomeimagem, categoriadescricao) values ('".$produto["nome"]."', ".$produto["preco"].", '".$produto["nomeImagem"]."', '".$produto["Categoria"]."' );";
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		if(!mysqli_query($conexao, $query))
			outputService(false, "Erro", "Erro na hora de inserir!");

		$query = "select * FROM produto ORDER BY idproduto DESC LIMIT 1";
		$resultado = mysqli_query($conexao, $query);
		$produtoInserido = mysqli_fetch_assoc($resultado);
		outputService(true, "Inserido", $produtoInserido);
	}

	function updateProdutoAndReturn($produto){
		$query = "update produto set nome = '".$produto["nome"]."', preco = '".$produto["preco"]."', nomeimagem = '". $produto["nomeImagem"]."', categoriadescricao = '".$produto["Categoria"]."' where idproduto = ".$produto["idproduto"].";";
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		if(!mysqli_query($conexao, $query))
			outputService(false, "Erro", "Erro na hora de inserir!");

		$query = "select * FROM produto where idproduto = ".$produto["idproduto"].";";
		$resultado = mysqli_query($conexao, $query);
		$produtoInserido = mysqli_fetch_assoc($resultado);
		outputService(true, "Inserido", $produtoInserido);
	}
    
    function getProductList(){
    	if(isset($_GET["nomeproduto"])){
    		$nomeproduto = $_GET["nomeproduto"];
    		//outputService(false, "Error", $nomeproduto);
    		$query = "select * from produto where nome is null or nome like '%".$nomeproduto."%';";
    	}
    	else{
    		$query = "select * from produto";
    	}		
		$conexao = mysqli_connect('localhost', 'root', '', 'loja');
		$resultado = mysqli_query($conexao, $query);
		$produtoArray = array();		
		// montando o array de objeto
		while($produto = mysqli_fetch_assoc($resultado)) {
		    $produtoArray[] = array (
		    	'idproduto' => $produto['idproduto'],
		    	'produto' => $produto['nome'],
		    	'preco' => $produto['preco'],
		    	'nomeimagem' => $produto['nomeimagem'],
		    	'idcategoria' => $produto['idcategoria'],
		    	'categoriadescricao' => $produto['categoriadescricao']
		    );
		}
		//mysql_close($conexao);
		outputService(true, "Success", $produtoArray);
    }
?>