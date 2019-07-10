<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro Produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/conteudo.css">
</head>
<body>
<div class="menu">
	<ul>
		<li><a href="index.php">Lista de Produtos</a></li>
		<li><a href="CadastroProdutos.php">Cadastro Produtos</a></li>
	</ul>
</div>

<div class="conteudo">
	<div class="titulo">
		<h2>Cadastro Produtos</h2>
	</div>
	<form action="" method="POST">		
		<input type="text" name="produto" placeholder="NOME DO PRODUTO"><br><br>	
		<input type="text" name="quantidade" placeholder="QUANTIDADE"><br><br>		
		<input type="text" name="validade" placeholder="VALIDADE"><br><br>		
		<input type="text" name="preco" placeholder="PREÇO"><br><br>
		<input type="submit" name="btn" value="SALVAR">
	</form>
	
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	//variaveis
	$produto = isset($_POST['produto'])?$_POST['produto']:"";
	$quantidade = isset($_POST['quantidade'])?$_POST['quantidade']:"";
	$preco = isset($_POST['preco'])?$_POST['preco']:"";
	$validade = isset($_POST['validade'])?$_POST['validade']:"";
	//tratamento de erro
	if (empty($produto) or empty($quantidade) or empty($preco) or empty($validade)) {
		?>
		<div class="erro">
            <p>PREENCHAR TODOS OS CAMPOS</p>
        </div>
        <?php
	}
	else {
		// mensagem de armazenamento concluido
		?>		
		<div class="sucesso">
            <p>PRODUTO SALVO COM SUCESSO</p>
        </div>
        <?php
        //conecxao ao banco de dados
        require("conn.php");
        // PDO, INSERINDO NO BANCO DE DADOS
        $insert=$conn->prepare("INSERT INTO produtos(produto,quantidade,preco,validade)VALUES(:produto,:quantidade,:preco,:validade)");
        $insert->bindParam(':produto',$produto);
        $insert->bindParam(':quantidade',$quantidade);
        $insert->bindParam(':preco',$preco);
        $insert->bindParam(':validade',$validade);
        $insert->execute();
	}
}
?>
</div>
</body>
</html>