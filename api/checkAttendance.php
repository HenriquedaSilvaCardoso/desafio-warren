<? # esse arquivo é chamado pelo javascript, mais especificamente o arquivo js/app.js
require "../uteis.php";  # importa uteis porque não é incluída no index, que o importa normalmente

$secondExercise = new SecondExercise();  # instancia a classe SecondExercise

if($_POST["lateLimit"] <= 0) {
    $response = [
        "state" => "É preciso ao menos de um aluno para se dar aula, reescreva o número de alunos presentes com um valor acima de 0",
        "type" => "danger"
    ];
    echo json_encode($response);
} else {
    $classState = $secondExercise->checkAttendance($_POST['arrivalTimes'], $_POST['lateLimit']); # envia os tempos de chegada e o limite de atrasos para a função que retorna ou Aula Normal ou Aula Cancelada
    
    # armazena o texto e o tipo que mudará a cor do alerta chamado pelo javascript
    $response = array(
        "state" => $classState, 
        "type" => ($classState == "Aula Normal" ? "success" : "danger")
    );
    
    # os envia
    echo json_encode($response);
}

?>