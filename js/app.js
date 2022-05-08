$(function () {
    $('#formAttendance').submit(function () {  // quando o botão do form do exercício dois é pressionado isso acontece
        $.ajax({  // faz uma requisição ajax
            url: url_site + 'api/checkAttendance.php', // para esse url, o que executa o código dentro dele
            dataType: 'json',  // resgatando data em tipo json
            type: 'POST',  // por método POST
            data: $(this).serialize(),  // serializa os dados
            success: function (data) {  // em caso da requisição ser um sucesso, um alert é impresso na tela com o resultado
                myAlert(data.type, data.state, 'main') 
            }
        })
        return false;
    })

    $(document).on('blur', '#qtyStudents', function () {  // quando clicarem/tocarem fora do campo de quantidade de estudantes isso acontece
        var qty = $(this).val();  // resgata o valor de dentro do input
        $('#arrivalTimes').remove();  // remove a div que contém os inputs de tempo de chegada, impendindo duplicatas
        $("#secondExerciseButton").removeAttr('disabled'); // habilita o botão de envio do formulário
        
        if (!qty) { // se o valor resgatado seja zero ou menor desabilita o botão do formulário
            $("#secondExerciseButton").attr('disabled','disabled');  
            return false;
        }
        
        $('#arrivalTimesParent').append('<div class="row" id="arrivalTimes"> </div>');  // insere a div que contém os inputs de tempo de chegada sob outra div

        // adiciona um título para essa sessão do forms
        var estrutura = `
            <h3 class="ml-3 mb-3" style="width: 100%">Horário de chegada dos estudantes</h3>
        `;

        // monta o resto da estrutura inserindo os inputs
        for (let i = 0; i < qty; i++) {
            estrutura += `
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label for="arrivalTimes[${i}]">Aluno ${i + 1}</label>
                    <input type="number" class="form-control" name="arrivalTimes[${i}]" required>
                </div>
            </div>`
        }
        
        $('#arrivalTimes').append(estrutura) // insere a estrura dentro da div 
    })

    $('#formChangeMaking').submit(function () {  // essa função é praticamente a mesma do exercício dois, as únicas coisas que mudam são:
        $.ajax({ 
            url: url_site + 'api/changeMaking.php',  // o url que tem o código executado
            dataType: 'json',
            type: 'POST',
            data: $(this).serialize(),
            success: function (data) {  // e que nesse, no caso de sucesso o site é redirecionado para outra tela normalmente, porém se um data.type foi passado quer dizer que alguma coisa foi enviada errada então aparecerá o alert avisando
                if(data.type){
                    myAlert(data.type, data.msg, 'main');
                } else {
                    window.location.href = url_site +"thirdExercise/result/"
                }
            }
        })
        return false;
    })

    $(document).on('blur', '#arrayValues', function () {  // essa função tem função igual a anterior de gerar campos que serão usados para montar arrays, apenas possui nomes diferentes para as referências, já que são usadas em arquivos diferentes
        var qty = $(this).val();
        $('#digits').remove();
        $("#thirdExerciseButton").removeAttr('disabled');
        if (qty <= 0) {
            $("#thirdExerciseButton").attr('disabled', 'disabled');
            return false;
        }
        $('#digitsParent').append('<div class="row" id="digits"> </div>');
        var estrutura = `
            <h3 class="ml-3 mb-3" style="width: 100%">Valores a serem somados:</h3>
        `;
        $('#digits').append(estrutura);

        for (let i = 0; i < qty; i++) {
            estrutura = `
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label for="digits[${i}]">Valor ${i + 1}</label>
                    <input type="number" class="form-control" name="digits[${i}]" required>
                </div>
            </div>`
            $('#digits').append(estrutura)
        }

    })
})

// função para gerar um alert do bootstrap mostrando alguma mensagem
function myAlert(tipo, mensagem, pai, url) {  // a função recebe o tipo (que define a cor do alert), a mensagem, o pai (que é onde o alert será inserido) e uma url (caso deseja redirecionar o site após mostrar o alert)
    url = (url == undefined ? url == '' : url);  // se url não for inserido, é definido como uma string vazia
    componente = '<div class="alert alert-' + tipo + '" role="alert">' + mensagem + '</div>'; // monta o componente alert

    $(pai).append(componente);  // adiciona o alert dentro do pai do pai

    setTimeout(function () {  // alert dá timeout depois de 1 segundo
        $(pai).find('div.alert').remove();  // remove o alert da tela
        
        // se url for informada será a página será redirecionada para a url
        if (url) {
            setTimeout(function () {
                window.location.href = url;
            }, 500);
        } 
    }, 2000);
}