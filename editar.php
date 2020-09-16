<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result_livros = "SELECT * FROM livros WHERE id='$id' LIMIT 1";
    $resultado_livros = mysqli_query($conn, $result_livros);
    $row_livros = mysqli_fetch_assoc($resultado_livros);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/layout.css">
    <script src='js/all.js'></script>
</head>
<body>
    <!-- Modal listar -->
    <div class="modal fade" id="exampleModalindex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja sair?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                <a href="listar.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
    
    <nav class="fixed-top"><!--Menu superior-->
        <div class="btn-group menuSuperior" role="group" aria-label="Basic example">
            <a href="#" class="btn btn-cadastro1" data-toggle="modal" data-target="#exampleModalindex"><i class="fas fa-undo"></i> Voltar</a>
        </div>
    </nav><!--final do menu supeior-->
    <div class="jumbotron confJumCadastrar jumbotron-fluid">
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <h1 class="display-4 text-center"><i class="fas fa-edit"></i> Editar</h1><hr>
            </div>
            <form method="POST" action="update.php"><!--Inicio do formulario-->
                <div class="form-row inputConf">
                    <input type="hidden" name="id" required class="form-control" value="<?php echo $row_livros['id'] ?>">
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Categoria</label>
                        <input type="text" name="categoria" readonly required class="form-control" value="<?php echo $row_livros['categoria'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Autor</label>
                        <input type="text" name="autor" required class="form-control" value="<?php echo $row_livros['autor'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Nome</label>
                        <input type="text" name="nome" required class="form-control" value="<?php echo $row_livros['nome'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Gênero</label>
                        <input type="text" name="genero" required class="form-control" value="<?php echo $row_livros['genero'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Editora</label>
                        <input type="text" name="editora" required class="form-control" value="<?php echo $row_livros['editora'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Cidade</label>
                        <input type="text" name="cidade" required class="form-control" value="<?php echo $row_livros['cidade'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="textInputConf">Ano</label>
                        <input type="text" name="ano" maxlength="4" required class="form-control" value="<?php echo $row_livros['ano'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="textInputConf">ISBN</label>
                        <input type="text" name="isbn" required class="form-control" value="<?php echo $row_livros['isbn'] ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="textInputConf">Local de Guarda</label>
                        <input type="text" name="localizacao" required class="form-control" value="<?php echo $row_livros['localizacao'] ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="textInputConf">Descrição</label>
                        <textarea class="form-control" name="descricao" required maxlength="300" rows="5" value=""><?php echo $row_livros['descricao'] ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="textInputConf">Observação</label>
                        <textarea class="form-control" name="observacao" maxlength="300" rows="5" value=""><?php echo $row_livros['observacao'] ?></textarea>
                    </div>
                    <div class="form-group confBtnMsg col-md-12">
                        <button type="submit" class="btn confBtnMsg btn-danger">Confirmar</button>
                        <label class="textInputConf"></label>
                        <a href="visualizar.php?id=<?php echo $row_livros['id'];?>" class="btn confBtnMsg btn-warning">Visualizar</a>

                    </div>
                </div>
            </form><!--Final do formulario-->
        </div>
    </div>
    <footer class="navbar fixed-bottom navbar-light corRodape"><!--Inicio do Rodape-->
        <a class="navbar-brand" href="#"><i class="fas fa-bookmark"></i> Biblioteca</a>
    </footer><!--final do rodape-->

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>