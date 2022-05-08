<? if (isset($_GET["result"])) { ?>  <!-- Se result estiver presente carrega essa estrutura senão carrega a outra -->
    <div class="jumbotron"> 
        <h2 class="display-4"><?= $_SESSION["smallArray"][0];?></h2> <!-- Mostra o texto inicial -->
        <hr class="my-4">
        <p class=""style="font-size:40px"><?=$_SESSION["smallArray"][1]?></p> <!-- Mostra quais são as menores somas que chegam no número indicado -->
    </div>
    <a href="<?= $url_site ?>thirdExercise" class="btn primarypalette">Voltar</a> <!-- Botão utilizado para voltar para a estrutura sem result -->
<? } else { ?>
    <h1 class="text-center">Algoritmo para descobrir os Subsets</h1> <!-- Título -->
    <hr>
    <form action="" method="post" id="formChangeMaking">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="numberToSum">Número para Somar</label>
                    <input type="number" class="form-control" name="numberToSum" required> <!-- Envia o número que o conjunto tentará somar até -->
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="arrayValues">Quantidade de Valores</label>
                    <input type="number" id="arrayValues" class="form-control" name="arrayValues"> <!-- Usado para mostrar os inputs do conjunto de números que serão somados -->
                </div>
            </div>
        </div>
        <div class="form-group" id="digitsParent">
            <div class="row" id="digits"> <!-- Envia o conjunto de números -->

            </div>
        </div>
        <button type="submit" id="thirdExerciseButton" class="btn primarypalette" disabled>ENVIAR</button>
    </form>
<? } ?>