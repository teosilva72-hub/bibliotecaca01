<?php
session_start();
include_once("conexao.php");

//$nome = $_POST['nome'];
//$email = $_POST['email'];
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

$result_livros = "INSERT INTO livros (categoria, autor, nome, genero, editora, cidade, ano, isbn, localizacao, descricao, observacao)
VALUES ('$categoria', '$autor', '$nome', '$genero', '$editora', '$cidade', '$ano', '$isbn', '$local', '$descricao', '$observacao')";

$resultado_usuarios = mysqli_query($conn, $result_livros);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<span style='color:green;'> O livro '$nome', do autor '$autor' foi cadastrado com sucesso!.</span>";
	header("Location: cadastrar.php");
}else{
	$_SESSION['msg'] = "<span style='color:red;'> Não foi possível cadastrar o livro '$nome', tente novamente.</span>";
	header("Location: cadastrar.php");
}