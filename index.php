<?
require "uteis.php";  # arquivo com funções e arrays genéricos
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$url_site?>css/main.css">
    <title>Exercícios</title>
</head>
<nav class="navbar navbar-expand-lg primarypalette">
  <a class="navbar-brand" href="<?=$url_site?>home">Henrique</a>
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=$url_site?>firstExercise">Primeiro Exercício<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$url_site?>secondExercise">Segundo Exercício</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$url_site?>thirdExercise">Terceiro Exercício</a>
      </li>
    </ul>
  </div>
</nav>
<body>
    <main id="main" class="mt-3">
        <div class="container">
            <?
            switch ($_GET['page']) {  # verifica o atributo "page" informado na barra de pesquisa e requere o arquivo com o nome equivalente, tanto da view quanto do controller
                case true:
                    require "controllers/{$_GET['page']}.php";
                    require "views/{$_GET['page']}.php";
                    break;
                default:
                    require "controllers/home.php";
                    require "views/home.php";
                    break;
            }
            ?>
        </div>
    </main>
    <script>
        var url_site = '<?= $url_site ?>'; // envia para o javascript a variável $url_site, usada para o programa ter caminho absoluto
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="<?=$url_site?>js/app.js"></script>
</body>

</html>