<?php
    session_start();
    include_once("conexao.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_livro = "DELETE FROM livros WHERE id='$id'";
    $resultado_livro = mysqli_query($conn, $result_livro);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<span style='color:green;'> Livro excluído com sucesso!</span>";
        header("Location: listar.php");
    }else{
        $_SESSION['msg'] = "<span style='color:red;'> Não foi possível excluir o livro, tente novamente!</span>";
        header("Location: listar.php");
    }
?>