<?
class SecondExercise {

    # função utilizada para determinar se a aula será normal ou foi cancelada
    function checkAttendance($arrivalTime, $lateLimit) { 
        $count = 0;  # contador de alunos
        foreach($arrivalTime as $student) { # passa pelo array de horários de chegada
            if($student <= 0) {  # se horário for maior que 0 adiciona um no contador 
                $count ++;
            }
        }

        # se no final o contador for maior que o limite então retornará Aula Cancelada senão Aula Normal
        if($count < $lateLimit) {  
            return "Aula Cancelada";
        } else {
            return "Aula Normal";
        }
    }

}
?>