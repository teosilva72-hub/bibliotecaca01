<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastrar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/layout.css">
    <script src='js/all.js'></script>
</head>
<body>
    <!-- Modal cancelar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja cancelar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Se desejar sair da tela de cadastro, clique em cancelar.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                <a href="listar.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal listar -->
    <div class="modal fade" id="exampleModalpesquisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voltar para o pesquisar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja sair?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                <a href="pesquisar.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
    <nav class="fixed-top"><!--Menu superior-->
        <div class="btn-group menuSuperior" role="group" aria-label="Basic example">
            <a href="index.php" class="btn btn-cadastro1" data-toggle="modal" data-target="#exampleModalpesquisar"><i class="fas fa-undo"></i> Voltar</a>
        </div>
    </nav><!--final do menu supeior-->
    <div class="jumbotron confJumCadastrar jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center"><i class="fas fa-folder-plus"></i> Cadastrar</h1><hr>
            <?php
            if(isset($_SESSION['msg'])){
              //echo "<p>".$_SESSION['msg']."</p>";
              echo "<div class='alert alert-dark text-center' role='alert'>".$_SESSION['msg']."</div>";
              unset($_SESSION['msg']);
            }
            ?>
            <form method="POST" action="msgcadastro.php"><!--Inicio do formulario-->
                <div class="form-row inputConf">
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Categoria</label>
                        <select name="categoria" class="form-control" required>
                            <option></option>
                            <option value="apostila">Apostila</option>
                            <option value="ebook">E-Book</option>
                            <option value="livro">Livro</option>
                            <option value="revista">Revista</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Autor</label>
                        <input type="text" name="autor" required class="form-control" placeholder="Nome do Autor">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Nome</label>
                        <input type="text" name="nome" required class="form-control" placeholder="Nome do Livro">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Gênero</label>
                        <input type="text" name="genero" required class="form-control" placeholder="Qual o gênero do livro?">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Editora</label>
                        <input type="text" name="editora" required class="form-control" placeholder="Nome da editora">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="textInputConf">Cidade</label>
                        <input type="text" name="cidade" required class="form-control" placeholder="Cidade">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="textInputConf">Ano</label>
                        <input type="number" name="ano" maxlength="4" required class="form-control" placeholder="1999">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="textInputConf">ISBN</label>
                        <input type="text" name="isbn" required class="form-control" placeholder="10002566556">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="textInputConf">Local de Guarda</label>
                        <input type="text" name="localizacao" required class="form-control" placeholder="Localização">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="textInputConf">Descrição</label>
                        <textarea class="form-control" name="descricao" required maxlength="300" rows="5" placeholder="Máximo de 300 caracteres"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="textInputConf">Observação</label>
                        <textarea class="form-control" name="observacao" maxlength="300" rows="5" placeholder="Máximo de 300 caracteres"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn confBtnMsg btn-danger">Cadastrar</button>
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