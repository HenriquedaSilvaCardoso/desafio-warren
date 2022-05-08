<?
class ThirdExercise
{

    private $result = [];  # define um dos atributos da classe e suas instâncias

    function allSubsets($V, $N, $sum=0, $sumArray=[]) {  # função que gera os subsets que somam até o número informado
        if($sum > $N || $sum < 0) {  # se soma for maior que o número ou menor que zero retorna falso
            return false;
        }
        if($sum == $N) {  # se soma for igual ao número retorna o array de números que levou a essa soma
            return $sumArray;
        }

        foreach($V as $element) {  # passa pelo array de números informados na view
            array_push($sumArray, $element);  # coloca o elemento da vez no final do array que armazena as sequência de somas
            $array = $this->allSubsets($V, $N, $sum + $element, $sumArray);  # chama a própria função enviando a soma ($sum + $element) e o array contendo os dígitos que formam aquela soma ($sumArray) que ou retorna false ou retorna $sumArray;

            if($array) {  # Se a variável não conter false dentro dela, armazena o valor dentro do atributo
                array_push($this->result, $array);  
            }
            array_pop($sumArray);  # retira o último elemento do array para que outro possa ser adicionado no próximo loop 
        }
        if(!$sum && !$sumArray) {  # caso não exista soma ou sumArray após o loop, retorna o atributo com os arrays que somam até o número informado
            return $this->result;
        }
    }

    # essa função funciona para ordenar de forma ascendente os valores dentro dos arrays
    function sortArray($arr){ 
        for ($i=0; $i < count($arr) ; $i++) {  # passa pelos arrays dentro do array passado e os ordena
            sort($arr[$i]);
        }
        return $arr;  # retorna os arrays ordenados
    }
    
    # essa função funciona para remover elementos idênticos de arrays
    function removeArrayIdenticalElements($arr){  
        # essa estrutura é usada para não fazer comparações como arr[0] e arr[0], que resultariam em erro e para não repetir comparações, se arr[0] e arr[1] foram determinados como não sendo iguais eu não preciso comparar arr[1] e arr[0] 
        for ($i=0; $i < count($arr); $i++) {  
            for ($j = $i+1; $j < count($arr); $j++) {
                if($arr[$i] === $arr[$j]) { 
                    array_splice($arr, $j, 1);  # função remove o valor do array e atualiza automaticamente as chaves
                    $j--;  # por causa disso é necessário subtrair 1 de $j para que não pule nenhum elemento
                }
            }
        }
        return $arr;
    }

    # função utilizada para encontrar os arrays com menos elementos
    function findArrayWithLeastElements($arr) { 
        foreach($arr as $element) {  # passa pelo array informado e armazena o tamanho de cada um dentro de um array
            $sizes[] = count($element);
        }
        sort($sizes);  # ordena o array com os tamanhos de forma ascendente
        $smallest = $sizes[0];  # e define armazena o primeiro elemento desse array (o menor de todos) em uma variável
        foreach($arr as $element) {  # passa denovo pelo array informado
            if(count($element) == $smallest) {  # compara o tamanho de cada um com o menor tamanho e se forem iguais 
                $arraySmall[] = $element;  # o armazenam dentro de um array
            }
        }
        return $arraySmall;  # retorna o array com os menores conjuntos que somaram até o número
    }

    # retorna a estrutura de exibição dos menores arrays
    function returnSmallestArrayStructure($arr, $N) { 
        # A estrutura é separada em duas partes, o cabeçalho e o corpo
        if(count($arr) == 1){ # caso o array
            $estrutura[0] = "Do conjunto informado, a menor soma para chegar no número: {$N}, é: <br>";
        } else if (count($arr) > 1) {
            $estrutura[0] = "Do conjunto informado, as menores somas para chegar no número: {$N}, são: <br>";
        } else {
            $estrutura[0] = "Não foram achadas somas que equivalem a {$N} no conjunto.";
            return $estrutura;
        }
        $estrutura[1] = "";
        foreach($arr as $element) {
            $estrutura[1] .= "[";
            foreach($element as $value) {
                $estrutura[1] .= "{$value}, ";
            }
            $estrutura[1] = rtrim($estrutura[1], ", ");
            $estrutura[1] .= "] <br>";
        }
  
        return $estrutura;
    }

}
?>