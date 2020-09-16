<?php
session_start();
include_once("conexao.php");

//$nome = $_POST['nome'];
//$email = $_POST['email'];
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);

$result_livros = "UPDATE livros SET
categoria='$categoria',
autor='$autor',
nome='$nome',
genero='$genero',
editora='$editora',
cidade='$cidade',
ano='$ano',
isbn='$isbn',
localizacao='$local',
descricao='$descricao',
observacao='$observacao'
WHERE id='$id'";

$resultado_livros = mysqli_query($conn, $result_livros);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<span style='color:green;'> (Cod: '$id') $categoria, '$nome', do autor '$autor', gênero '$genero', editora '$editora' foi atualizado com sucesso!</span>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<span style='color:red;'> Nenhuma alteração foi realizada: '$categoria', '$autor', '$nome', '$genero', '$local' tente novamente.</span>";
	header("Location: listar.php");
}