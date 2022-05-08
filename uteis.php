<?
session_start(); # inicia a sessão

error_reporting(0); # desabilita notificações de erros que não param o funcionamento do programa

# essa sessão é utilizada para definir os padrões de caminho absoluto do projeto
$localDir = 'desafio-warren/';  # define o diretório local
$base_url = "http://" . $_SERVER['HTTP_HOST'] . '/';  # define a url base que está sendo utilizada, pegando o host http armazenado na constante SERVER

$url_site = $base_url . $localDir;  # define o caminho absoluto a ser utilizado

$fullPath = $_SERVER['DOCUMENT_ROOT'] . '/';  # recupera o caminho completo até o diretório do arquivo do site
$fullPath .= $localDir; # adiciona o nome do arquivo no final

$models = $fullPath . 'models/';  # define o caminho de referência para models
$controllers = $fullPath . 'controllers/';  # define o caminho de referência para controllers
$views = $fullPath . 'views/';  # define o caminho de referência para views

# essa sessão faz o requerimento das classes, o que permite ao programa as utilizar 
require $models . "firstExercise.Class.php"; 
require $models . "secondExercise.Class.php";
require $models . "thirdExercise.Class.php";

# uma função de conveniência que imprime na tela uma váriavel ou array já formatada para debug
function legivel($var, $width = '250', $height = '400')
{
    echo "<pre>";
    if (is_array($var)) {
        print_r($var);
    } else {
        print($var);
    }
    echo "</pre>";
}
