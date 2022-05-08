<? # esse arquivo é chamado pelo javascript, mais especificamente o arquivo js/app.js

require "../uteis.php";  # importa uteis porque não é incluída no index, que o importa normalmente

$third = new ThirdExercise();  # instancia a classe ThirdExercise

foreach ($_POST['digits'] as $digit) { # checa caso alguns dos valores informados seja zero e retorna uma mensagem de erro para o usuário
    if(!$digit) {
        $response = [
            "msg" => "Não é possível somar com zero, por favor reescreva os valores a serem somados incorretos",
            "type" => "danger"
        ];
        echo json_encode($response);
    }
}

if($_POST["numberToSum"] <= 0) { # checa se o número para se somar até é zero ou negativo e retorna uma mensagem de erro para o usuário
    $response = [
        "msg" => "Não é possível somar até números negativos ou zero, por favor reescreva o número para somar",
        "type" => "danger"
    ];
    echo json_encode($response);
} else {
    $arraySubsets = $third->allSubsets($_POST["digits"], $_POST["numberToSum"]);  # retorna todos os subsets do conjunto que somarão até o número informado
    
    $arraySubsets = $third->sortArray($arraySubsets);  # ordena todo o conteúdo dos arrays de forma ascendente e os retorna ordenados
    
    $arraySubsets = $third->removeArrayIdenticalElements($arraySubsets);  # remove duplicatas do array e retorna somente valores únicos
    
    $smallestArray= $third->findArrayWithLeastElements($arraySubsets);   # retorna os arrays com menos elementos que somam até o número
    
    $smallestArray = $third->returnSmallestArrayStructure($smallestArray, $_POST["numberToSum"]);  # retorna a estrutura de exibição desse desses arrays com menos elementos
    
    $_SESSION["smallArray"] = $smallestArray;  # armazena essa estrutura em um sessão
    
    echo json_encode("ok");  #envia uma resposta para a requisição ajax
}

?>