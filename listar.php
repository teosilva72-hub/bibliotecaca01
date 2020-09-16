<?php
session_start();
include_once("conexao.php");

//receber o numero da pagina
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
            
//setar quantidade de itens por página
$qnt_pagina = 10;
//calcular inicio da visualização
$inicio = ($qnt_pagina * $pagina) - $qnt_pagina;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Listar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel="stylesheet" href="css/layout.css">
    <script src='js/all.js'></script>
</head>
<body>
    <!-- Modal pesquisar -->
    <div class="modal fade" id="exampleModalpesquisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesquisar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja prosseguir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                <a href="pesquisar.php" class="btn btn-danger">Sim</a>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal cadastrar -->
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
    <!-- Modal delete-->
    <?php
		$result_livros = "SELECT * FROM livros LIMIT $inicio, $qnt_pagina";
		$resultado_livros = mysqli_query($conn, $result_livros);
    while($row_livro = mysqli_fetch_assoc($resultado_livros)){
  ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Tem certeza que deseja excluir o item:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
        <h5 class="text-center"><?php echo $row_livro['categoria'];?>, '<?php echo $row_livro['nome'];?>', autor '<?php echo $row_livro['autor'];?>',
        Gênero '<?php echo $row_livro['genero'];?>', ano '<?php echo $row_livro['ano'];?>', Editora '<?php echo $row_livro['editora'];?>' ?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
          <a href="delete.php?id=<?php echo $row_livro['id'];?>" class="btn btn-danger">Excluir</a>
        </div>
      </div>
    </div>
  </div>
    <?php } ?>

    <nav class="fixed-top"><!--Menu superior-->
        <div class="btn-group menuSuperior" role="group" aria-label="Basic example">
            <a href="cadastrar.php" class="btn btn-cadastro2"  data-toggle="modal" data-target="#exampleModalcadastrar"><i class="fas fa-folder-plus"></i> Cadastrar</a>
            <a href="pesquisar.php" class="btn btn-cadastro1" data-toggle="modal" data-target="#exampleModalpesquisar"><i class="fas fa-search"></i> Pesquisar</a>
          </div>
    </nav><!--Final do menu superior-->
    <div class="jumbotron jumbotron-fluid confJumListar">
    <div class="alert alert-dark" role="alert">
      <h1 class="display-4 text-center"><i class="fas fa-list"></i> Lista</h1><hr>
    </div>
    <?php 
    $result_pg = "SELECT COUNT(id) AS num_result FROM livros";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    echo "<h3 class='text-center alert alert-secondary' role='alert'>Total " . $row_pg['num_result']."  <i class='fas fa-book-open'></i>"."</h3>". "<hr>";
    ?> 
    <?php
            if(isset($_SESSION['msg'])){
              //echo "<p>".$_SESSION['msg']."</p>";
              echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['msg']."</div><hr>";
              unset($_SESSION['msg']);
            }
    ?>
    <table class="table table-sm table-dark">
  <thead class="thead-dark text-center">
    <tr>
    <th scope="col text-center">Ação</th>
      <th scope="col text-center">Categoria</th>
      <th scope="col text-center">Autor</th>
      <th scope="col text-center">Nome</th>
      <th scope="col text-center">Genero</th>
      <th scope="col text-center">Local de Guarda</th>
    </tr>
  </thead>
  <?php //listar
		$result_livros = "SELECT * FROM livros LIMIT $inicio, $qnt_pagina";
		$resultado_livros = mysqli_query($conn, $result_livros);
    while($row_livro = mysqli_fetch_assoc($resultado_livros)){
  ?>
  <tbody class="text-center table-striped">
    <tr>
      <td>
        <div class="btn-group padding">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-wrench"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="editar.php?id=<?php echo $row_livro['id'];?>"><i class="fas fa-edit"></i> Editar</a><hr>
            <a class="dropdown-item" href="visualizar.php?id=<?php echo $row_livro['id'];?>"><i class="far fa-eye"></i> Exibir</a><hr>
            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"
              href="delete.php?id=<?php echo $row_livro['id'];?>"><i class="fas fa-trash-alt"></i> Excluir
            </a>
        </div>
      </td>
      <th scope="row"><?php echo $row_livro['categoria'];?></th>
      <td><?php echo $row_livro['autor'];?></td>
      <td><?php echo $row_livro['nome'];?></td>
      <td class='modMobile'><?php echo $row_livro['genero'];?></td>
      <td class='modMobile'><?php echo $row_livro['localizacao'];?></td>

      
    </tr>
  </tbody>
  <?php } ?>
</table>
<div class="confPag">
  <div class="confPag1">
    <?php //paginação do site
      //somar a quantidade de livros cadastrados
      $result_pg = "SELECT COUNT(id) AS num_result FROM livros";
      $resultado_pg = mysqli_query($conn, $result_pg);
      $row_pg = mysqli_fetch_assoc($resultado_pg);
      //echo $row_pg['num_result'];
      //quantidade de paginas
      $quantidade_pg = ceil($row_pg['num_result'] / $qnt_pagina);
      //limitar os links antes depois
      $max_links = 2;
      echo "<a class='btn btn-warning confBtnPag' href='listar.php?pagina=1'>Primeira</a>";
      for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
        if($pag_ant >=1){
          echo "<a class='btn btn-warning confBtnPag' href='listar.php?pagina=$pag_ant'>$pag_ant</a>";
        }
      }
      echo "  <a href='#' class='btn btn-warning'>"."$pagina"."</a>";
      for($pag_dep  = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
        if($pag_dep <= $quantidade_pg){
          echo "<a class='btn btn-danger confBtnPag' href='listar.php?pagina=$pag_dep'>$pag_dep</a>";
        }
      }
      echo "<a class='btn btn-danger confBtnPag' href='listar.php?pagina=$quantidade_pg'>Última</a>";    
    ?>
  </div>
</div>

    </div>
    <footer class="navbar fixed-bottom navbar-light corRodape"><!--Inicio do Rodape-->
        <a class="navbar-brand" href="#"><i class="fas fa-bookmark"></i> Biblioteca</a>
    </footer><!--final do rodape-->


    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>