<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Lista de Produtos</title>
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
		<h2>Listagem de Produtos</h2>
	</div>
	<?php
	//CONECXAO BANCO DE DADOS
	require("conn.php");
	//LISTAGEM DE PRODUTOS
	$select=$conn->prepare("SELECT * FROM produtos");
	$select->execute();
	$result = $select;
	echo '<table>';
	echo '<tr>';
	echo '<th>PRODUTO</th>';
	echo '<th>VALOR</th>';
	echo '<th>QUANTIDADE</th>';
	echo '<th>VALIDADE</th>';
	echo '</tr>';
	foreach ($result as $item) {
		echo '<tr>';		
		echo '<td>'.$item['produto'].'</td>';		
		echo '<td>'.$item['preco'].'</td>';
		echo '<td>'.$item['quantidade'].'</td>';
		echo '<td>'.$item['validade'].'</td>';		
		echo "<td><a class="."excluir"." href=index.php?excluir=".$item['id'].">EXCLUIR</a></td>";
		echo '</tr>';
	}
	echo '</table>';
	//EXCLUIR PRODUTO
	$id = isset($_GET['excluir'])?$_GET['excluir']:"";
	if ($id != "") {		
		$excluir = $conn->prepare("DELETE FROM produtos WHERE id=".$id."");		
		$excluir->execute();
		header('Location: index.php');
	}	
	?>
</div>	
</body>
</html>