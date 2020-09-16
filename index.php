<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Página Inicial</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/solid.css">
    <script src="js/all.js"></script>
</head>
<body class="index">
    <div class="jumbotron jumindex jumbotron-fluid">
        <div class="container">
          <h1 class="display-4 text-center">Bem-Vindo!</h1><hr>
          <h1 class="text-center"> <a class="corPata" href="pesquisar.php" ><i class="fas fa-2x fa-paw"></i> <br> Acessar</a> </h1><br>
            <p class="lead text-center"></p><hr>
            <p class="text-center">XP SOFTWARE - Analise e Desenvolvimento de sistemas. <br>
            Versão 1.2.1</p>
        </div>
      </div>

    <style type="text/css" >
        body{
            font-family: "arial black";
            color: black;
        }
        .corPata{
            color: white;
        }
        .corPata:hover{
            color: red;
        }
        a:hover{
            text-decoration: none;
        }
        .index{
            background-image: url("img/todos.jpeg");
            background-size: 100%;
            background-repeat: no-repeat;
            transition: 3s;
        }
        .index:hover{
            background-image: url("img/livros1.jpg");
            transition: 4s;
        }
        .jumindex:hover{
            background-color: rgba(0, 0, 0, 0.432);
            color: white;
            transition: 3s;
        }

        h1:hover{
            color: orange;
            transition: 1s;
        }
        p:hover{
            color: orange;
        }
        .jumindex{
        margin-top: 100px;
        background-color: rgba(255, 255, 255, 0.3);
        }   
    </style>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>