<?php
include_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pesquisar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/layout.css">
    <script src='js/all.js'></script>
</head>
<body>
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
                <a href="index.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal listar -->
    <div class="modal fade" id="exampleModallistar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Listar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja prosseguir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                <a href="listar.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
        <!-- Modal listar -->
        <div class="modal fade" id="exampleModalcadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja prosseguir?
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
            <a href="index.php" class="btn btn-cadastro1" data-toggle="modal" data-target="#exampleModalindex"><i class="fas fa-home"></i> Home</a>
            <a href="listar.php" class="btn btn-cadastro2" data-toggle="modal" data-target="#exampleModallistar"><i class="fas fa-list"></i> Listar</a>
            <a href="cadastrar.php" class="btn btn-cadastro1" data-toggle="modal" data-target="#exampleModalcadastrar"><i class="fas fa-folder-plus"></i> Cadastrar</a>
        </div>
    </nav><!--final do menu supeior-->
    <div class="jumbotron confJumCadastrar jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 text-center"><i class="fas fa-search"></i> Pesquisar</h1><hr>
        <nav class="navbar navbar-light corRodape">
          <form class="form-inline" method="POST" action="">
            <input class="form-control mr-sm-2" type="text" name="nome" placeholder="Nome ou Autor..." aria-label="Search">
            <input name="sendPesquisar" class="btn btn-outline-danger my-2 my-sm-0" value="Pesquisar" type="submit">
          </form>
        </nav>
        <?php 
          $sendPesquisa = filter_input(INPUT_POST, 'sendPesquisar', FILTER_SANITIZE_STRING);
            if($sendPesquisa){
              $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
              $result_pesq = "SELECT * FROM livros WHERE nome LIKE '%$nome%'";
              
              $resultado_pesq = mysqli_query($conn, $result_pesq);
              while($row_livro = mysqli_fetch_assoc($resultado_pesq)){ ?>
               <!-- //echo "<br>" ."Categoria: ". $row_livro['categoria'] ."<br>";
                //echo "autor: ". $row_livro['autor'] ."<br>";
                //echo "nome: ". $row_livro['nome'] ."<br>";
                //echo "genero : ". $row_livro['genero'] ."<br>";
                //echo "Editora: ". $row_livro['editora'] ."<br>";
                //echo "Cidade: ". $row_livro['cidade'] ."<br>";
                //echo "Ano: ". $row_livro['ano'] ."<br>";
                //echo "ISBN: ". $row_livro['isbn'] ."<br>";
                //echo "Local de guarda: ". $row_livro['localizacao'] ."<br>";
                //echo "Descricao: ". $row_livro['descricao'] ."<br>";
                //echo "Observacao: ". $row_livro['observacao'] ."<br>";
                //echo "<a href='visualizar.php?id=$row_livro[id]'>Ver</a><hr>";-->
                <br><div class="alert alert-dark" role="alert">
                    <h4 class="alert-heading"><?php echo "<br>" ."Categoria: ". $row_livro['categoria'] ?></h4><hr>
                    <p><?php echo "Autor (a): ". $row_livro['autor'] ?><?php  ?></p>
                    <hr>
                    <p class="mb-0"><?php echo "Nome: ". $row_livro['nome'] ?></p><hr>
                    <?php echo "Observação: ". $row_livro['observacao'] ?><?php  ?></p>
                    <a class="fa-eye1" href="visualizar.php?id=<?php echo $row_livro['id'];?>"><i class="fas fa-2x fa-eye"></i></a>
                </div>
            <?php  }
            } ?>
            <?php
            $sendPesquisa = filter_input(INPUT_POST, 'sendPesquisar', FILTER_SANITIZE_STRING);
            if($sendPesquisa){
              $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
              $result_pesq = "SELECT * FROM livros WHERE autor LIKE '%$nome%'";
              
              $resultado_pesq = mysqli_query($conn, $result_pesq);
              while($row_livro = mysqli_fetch_assoc($resultado_pesq)){ ?>
               <!-- echo "<br>" ."Categoria: ". $row_livro['categoria'] ."<br>";
                echo "autor: ". $row_livro['autor'] ."<br>";
                echo "nome: ". $row_livro['nome'] ."<br>";
                echo "genero : ". $row_livro['genero'] ."<br>";
                echo "Editora: ". $row_livro['editora'] ."<br>";
                echo "Cidade: ". $row_livro['cidade'] ."<br>";
                echo "Ano: ". $row_livro['ano'] ."<br>";
                echo "ISBN: ". $row_livro['isbn'] ."<br>";
                echo "Local de guarda: ". $row_livro['localizacao'] ."<br>";
                echo "Descricao: ". $row_livro['descricao'] ."<br>";
                echo "Observacao: ". $row_livro['observacao'] ."<br>";
                echo "<a href='visualizar.php?id=$row_livro[id]'>Ver</a><hr>"; -->
                <br><div class="alert alert-dark" role="alert">
                    <h4 class="alert-heading"><?php echo "<br>" ."Categoria: ". $row_livro['categoria'] ?></h4><hr>
                    <p><?php echo "Autor (a): ". $row_livro['autor'] ?><?php  ?></p>
                    <hr>
                    <p class="mb-0"><?php echo "Nome: ". $row_livro['nome'] ?></p><hr>
                    <?php echo "Observação: ". $row_livro['observacao'] ?><?php  ?></p>
                    <a class="fa-eye1" href="visualizar.php?id=<?php echo $row_livro['id'];?>"><i class="fas fa-2x fa-eye"></i></a>
                </div>
                
            <?php  }
            }
          ?>
      </div>
    </div>
    <footer class="navbar fixed-bottom navbar-light corRodape"><!--Inicio do Rodape-->
        <a class="navbar-brand" href="#"><i class="fas fa-bookmark"></i> Biblioteca</a>
    </footer><!--final do rodape-->

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>