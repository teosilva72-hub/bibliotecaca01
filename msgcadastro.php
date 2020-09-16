<?php
session_start();

$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'created', FILTER_SANITIZE_STRING);
$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastrado!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/layout.css">
    <script src='js/all.js'></script>
</head>
<body>
    <!-- Modal index -->
    <div class="modal fade" id="exampleModalmsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancelar cadastro!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja cancelar esse cadastro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                <a href="cadastrar.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
    
    <nav class="fixed-top"><!--Menu superior-->
        <div class="btn-group menuSuperior" role="group" aria-label="Basic example">
            <a href="#" class="btn btn-cadastro2" data-toggle="modal" data-target="#exampleModalmsg"><i class="fas fa-window-close"></i> Cancelar</a>
        </div>
    </nav><!--final do menu supeior-->
    <div class="jumbotron confJumCadastrar jumbotron-fluid">
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <h1 class="display-4 text-center">
                    <i class="fas fa-clipboard-check"></i>
                     Confirmar
                </h1><hr>
            </div>
            <form method="POST" action="inserirlivro.php"><!--Inicio do formulario-->
                <div class="form-row inputConf">
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Categoria</label>
                        <input type="text" name="categoria" required class="form-control" value="<?php echo $categoria ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Autor</label>
                        <input type="text" name="autor" required class="form-control" value="<?php echo $autor ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Nome</label>
                        <input type="text" name="nome" required class="form-control" value="<?php echo $nome ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Gênero</label>
                        <input type="text" name="genero" required class="form-control" value="<?php echo $genero ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Editora</label>
                        <input type="text" name="editora" required class="form-control" value="<?php echo $editora ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Cidade</label>
                        <input type="text" name="cidade" required class="form-control" value="<?php echo $cidade ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="textInputConf">Ano</label>
                        <input type="text" name="ano" maxlength="4" required class="form-control" value="<?php echo $ano ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="textInputConf">ISBN</label>
                        <input type="text" name="isbn" required class="form-control" value="<?php echo $isbn ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="textInputConf">Local de Guarda</label>
                        <input type="text" name="localizacao" required class="form-control" value="<?php echo $local ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="textInputConf">Descrição</label>
                        <textarea class="form-control" name="descricao" required maxlength="300" rows="5" value=""><?php echo $descricao ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="textInputConf">Observação</label>
                        <textarea class="form-control" name="observacao" maxlength="300" rows="5" value=""><?php echo $observacao ?></textarea>
                    </div>
                    <div class="form-group confBtnMsg col-md-12">
                        <button type="submit" class="btn confBtnMsg btn-danger">Confirmar</button>
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