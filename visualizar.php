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
<?php
		$result_livros = "SELECT * FROM livros";
		$resultado_livros = mysqli_query($conn, $result_livros);
    while($row_livro = mysqli_fetch_assoc($resultado_livros)){
  ?>
    <!-- Modal Delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Tem certeza que deseja excluir o item:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="text-center"><?php echo $row_livro['categoria'];?>, '<?php echo $row_livro['nome'];?>', autor '<?php echo $row_livro['autor'];?>',
        Gênero '<?php echo $row_livro['genero'];?>', ano '<?php echo $row_livro['ano'];?>', Editora '<?php echo $row_livro['editora'];?>' ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <a href="delete.php?id=<?php echo $row_livros['id'];?>" class="btn btn-danger">Excluir</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal index -->
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
    <?php } ?>
    <nav class="fixed-top"><!--Menu superior-->
        <div class="btn-group menuSuperior" role="group" aria-label="Basic example">
            <a href="listar.php" class="btn btn-cadastro2"data-toggle="modal" data-target="#exampleModalindex"><i class="fas fa-undo"></i> Voltar</a>
        </div>
    </nav><!--final do menu supeior-->
        <div class="jumbotron confJumVisualizar jumbotron-fluid">
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <h1 class="display-4 text-center"><i class="fas fa-eye"></i> Visualizar</h1><hr>
                </div>
                    <div class="form-row inputConf">
                        <input type="hidden" name="id" required class="form-control" value="<?php echo $row_livros['id'] ?>" readonly>
                        <div class="form-group col-md-6">
                            <label class="textInputConf">Categoria</label>
                            <input type="text" name="categoria" required class="form-control" value="<?php echo $row_livros['categoria'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="textInputConf">Autor</label>
                            <input type="text" name="autor" required class="form-control" value="<?php echo $row_livros['autor'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="textInputConf">Nome</label>
                            <input type="text" name="nome" required class="form-control" value="<?php echo $row_livros['nome'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="textInputConf">Gênero</label>
                            <input type="text" name="genero" required class="form-control" value="<?php echo $row_livros['genero'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="textInputConf">Editora</label>
                            <input type="text" name="editora" required class="form-control" value="<?php echo $row_livros['editora'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="textInputConf">Cidade</label>
                            <input type="text" name="cidade" required class="form-control" value="<?php echo $row_livros['cidade'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="textInputConf">Ano</label>
                            <input type="text" name="ano" maxlength="4" required class="form-control" value="<?php echo $row_livros['ano'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="textInputConf">ISBN</label>
                            <input type="text" name="isbn" required class="form-control" value="<?php echo $row_livros['isbn'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="textInputConf">Local de Guarda</label>
                            <input type="text" name="localizacao" required class="form-control" value="<?php echo $row_livros['localizacao'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="textInputConf">Descrição</label>
                            <textarea class="form-control" name="descricao" required maxlength="300" rows="5" value="" readonly><?php echo $row_livros['descricao'] ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="textInputConf">Observação</label>
                            <textarea class="form-control" name="observacao" maxlength="300" rows="5" value="" readonly><?php echo $row_livros['observacao'] ?></textarea>
                        </div>
                        <div class="form-group confBtnMsg col-md-12">
                            <a href="editar.php?id=<?php echo $row_livros['id'];?>" class="btn confBtnMsg btn-danger">Editar</a>
                            <label class="textInputConf"></label>
                            <a data-toggle="modal" data-target="#exampleModal" href="delete.php?id=<?php echo $row_livros['id'];?>" class="btn confBtnMsg btn-warning">Excluir</a>
                        </div>
                    </div>
            </div>
        </div>
    <footer class="navbar fixed-bottom navbar-light corRodape"><!--Inicio do Rodape-->
        <a class="navbar-brand" href="#"><i class="fas fa-bookmark"></i> Biblioteca</a>
    </footer><!--final do rodape-->

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>