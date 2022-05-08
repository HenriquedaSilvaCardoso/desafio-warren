<h1 class="text-center">Software de Presença</h1> <!-- Título -->
<hr>
<form action="" method="post" id="formAttendance">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="lateLimit">Limite de Alunos Presentes</label>
                <input type="number" class="form-control" name="lateLimit" required>  <!-- Envia o limite de alunos que precisam estar na aula -->
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="qtyStudents">Quantidade de Estudantes</label>
                <input type="number" id="qtyStudents" class="form-control"> <!-- Usado para mostrar os inputs de tempo de chegada -->
            </div>
        </div>
    </div>
    <div class="form-group" id="arrivalTimesParent">
        <div class="row" id="arrivalTimes"> <!-- Envia os tempos de chegada -->

        </div>
    </div>
    <button id="secondExerciseButton" type="submit" class="btn primarypalette" disabled >ENVIAR</button>
</form>